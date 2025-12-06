<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salas;

class SalasController extends Controller
{
    public function salvarSalas(Request $request)
    {

        if ($sala->reservas()->count() > 0) {
            return response()->json(['erro' => 'Não é possível excluir sala com reservas.'], 400);
        }

        $sala->delete();

        return response()->json(['mensagem' => 'Sala excluída com sucesso.']);
 

    }
}
