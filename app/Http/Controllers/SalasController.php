<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salas;

class SalasController extends Controller
{
    public function salvarSalas(Request $request)
    {
        $Salas = new Salas();
        $Salas->nome = $request->nome;
        $Salas->status = $request->status;
        $Salas->capacidade = $request->capacidade; 
        $Salas->save();

        return redirect('/');
 

    }
}
