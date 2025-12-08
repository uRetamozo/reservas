<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservas;
use App\Models\Salas;
use App\Models\Usuarios;



class ReservasController extends Controller
{

  public function index(){
    $salas = Salas::where('status','disponivel')->get();
    $usuarios = Usuarios::all();

    return view('reservarsala', compact('salas', 'usuarios'));
  }

  public function reservarSala(Request $request)
  {
    $request->validate([
      'sala_id' => 'required|exists:salas,id',
      'usuario_id' => 'required|exists:usuarios,id',
      'data_hora_inicio' => 'required|date',
      'data_hora_fim' => 'required|date|after:data_hora_inicio',
    ]);

    // Verificando os horarios para ver se ja existe uma reserva nesse horário
    //a função busca o horario entre a data de inicia comparando com a data final e vice versa
    //se existir hora reservada entre o horario selecionado, o $conflito é atualizado como true
    $conflito = Reservas::where('sala_id', $request->sala_id)
      ->where(function ($query) use ($request) {
        $query->whereBetween('data_hora_inicio', [$request->data_hora_inicio, $request->data_hora_fim])
          ->orWhereBetween('data_hora_fim', [$request->data_hora_inicio, $request->data_hora_fim])
          ->orWhere(function ($q) use ($request) {
            $q->where('data_hora_inicio', '<=', $request->data_hora_inicio)
              ->where('data_hora_fim', '>=', $request->data_hora_fim);
          });
      })
      ->exists();
    //se existe um conflito de horario o laravel retorna um erro que é jogado na view de reserva de salas
    //informando que ja tem uma reserva
    if ($conflito) {
        return back()
            ->withErrors(['data_hora_inicio' => 'A sala já está reservada neste horário.'])
            ->withInput();
    }

    // Criar reserva
    Reservas::create([
      'sala_id'         => $request->sala_id,
      'usuario_id'      => $request->usuario_id,
      'data_hora_inicio' => $request->data_hora_inicio,
      'data_hora_fim'    => $request->data_hora_fim,
    ]);

    return redirect('/relatorios');
  }

  public function listarReservas(){
    $reservas = Reservas::with(['sala', 'usuario'])
        ->orderBy('data_hora_inicio', 'asc')
        ->get();
    return view('relatorios', compact('reservas'));
}
}
