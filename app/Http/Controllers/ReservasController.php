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

    // Verificar conflito de horário
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

    if ($conflito) {
      return back()->with('erro', 'A sala já está reservada neste horário.');
    }

    // Criar reserva
    Reservas::create([
      'sala_id'         => $request->sala_id,
      'usuario_id'      => $request->usuario_id,
      'data_hora_inicio' => $request->data_hora_inicio,
      'data_hora_fim'    => $request->data_hora_fim,
    ]);

    // Atualizar status da sala
    $sala = Salas::find($request->sala_id);
    $sala->status = 'ocupado';
    $sala->save();

    return redirect('/')->with('sucesso', 'Reserva criada com sucesso!');
  }
}
