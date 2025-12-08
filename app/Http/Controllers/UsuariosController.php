<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
 
class UsuariosController extends Controller
{

    public function index(){
      return view('cadastrarusuario');

    }



    public function salvarUsuarios(Request $request)
    {
        $usuario = new Usuarios();
        $usuario->nome = $request->nome;
        $usuario->matricula = $request->matricula;
        $usuario->curso = $request->curso; 
        $usuario->save();

        return redirect('/cadastrarsala');
    }
}

