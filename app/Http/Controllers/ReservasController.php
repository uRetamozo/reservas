<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Reservas; 

class ReservasController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'sala_id' => 'required|exists:salas,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'inicio' => 'required|date',
            'fim' => 'required|date|after:inicio'
        ]);

        $sala = Sala::findOrFail($request->sala_id);

        if ($sala->status !== 'disponivel') {
            return response()->json(['erro' => 'Sala ocupada!'], 400);
        }

        $conflito = Reserva::where('sala_id', $sala->id)
            ->where(function ($q) use ($request) {
                $q->whereBetween('inicio', [$request->inicio, $request->fim])
                  ->orWhereBetween('fim', [$request->inicio, $request->fim])
                  ->orWhere(function ($q2) use ($request) {
                      $q2->where('inicio', '<=', $request->inicio)
                         ->where('fim', '>=', $request->fim);
                  });
            })
            ->exists();

        if ($conflito) {
            return response()->json(['erro' => 'Já existe uma reserva nesse horário'], 400);
        }

        $reserva = Reserva::create($request->all());

        $sala->update(['status' => 'ocupada']);

        return response()->json($reserva);
    }

    public function relatorios(){
        $reservas = Reservas::with('sala', 'usuario')->get();
        return view('relatorios', compact('reservas'));
    }




}
