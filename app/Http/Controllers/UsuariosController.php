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
        $usuario-> matricula = $request->usuario;
        $usuario->capacidade = $request->capacidade; 
        $usuario->save();

        return redirect('/');
    }

    public function reservarSala(Request $request)
    {
        
    }
}

