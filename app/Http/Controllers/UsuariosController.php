<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
 
class UsuariosController extends Controller
{

    public function index(){
      return view('cadastrarusuario');

    }

    public function salvarUsuarios(Request $request){

      $request->validate([
        'nome'=>'required|min:6',
        'matricula'=>'required|unique:usuarios,matricula',
        'curso'=>'required'
      ],[
        'nome.required'=>'É necessário informar o nome',
        'nome.min'=>'O nome deve conter ao menos 6 letras',

        'matricula.required'=>'Necessário informar a matricula',
        'matricula.unique'=>'Já existe um usuario com essa matricula',

        'curso.required'=>'É necessário informar o nome do curso'
      ]);

      $usuario = new Usuarios();
      $usuario->nome = $request->nome;
      $usuario->matricula = $request->matricula;
      $usuario->curso = $request->curso; 
      $usuario->save();

      return redirect('/cadastrarsala');
}
}

