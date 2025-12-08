<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salas;

class SalasController extends Controller
{
  public function index(){
    return view('cadastrarsalas');
  }

  public function cadastrarSala(Request $request){

    $request->validate([
      'nome'=>'required',
      'capacidade'=>'required|numeric|min:15'
    ],[
      'nome.required'=>'Obrigatório informar o nome da sala',
      'capacidade.required'=>'Obrigatório informar a capacidade da sala', 
      'capacidade.min'=>'Capacidade minima de 15'
    ]);

    $sala = new Salas();
    $sala->nome=$request->nome;
    $sala->capacidade = $request->capacidade;
    $sala->status;
    $sala->save();

    return redirect('/reservarsalas');
  }
}
