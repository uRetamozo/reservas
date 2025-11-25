<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
 
class UsuariosController extends Controller
{
    public function salvarUsuarios(Request $request)
    {
        $usuario = new Usuarios();
        $usuario->nome = $request->nome;
        $usuario->usuario = $request->usuario;
        $usuario->capacidade = $request->capacidade; 
        $usuario->save();

        return redirect('/');
 

    }
}


/**: nome, matrícula, curso. */