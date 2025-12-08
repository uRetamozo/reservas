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
    $sala = new Salas();
    $sala->nome=$request->nome;
    $sala->capacidade = $request->capacidade;
    $sala->status;
    $sala->save();

    return redirect('/reservarsalas');
  }
}
