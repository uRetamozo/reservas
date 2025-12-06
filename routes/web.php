<?php

use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('');
});

Route::get('/cadastar_usuario', [UsuariosController::class, 'cadastrarUsuarios'])->name('cadastrar.usuarios');

Route::get('/relatorio', [UsuariosController::class, ''])->name('relatorio');

Route::get('/cadastrar_sala', [UsuariosController::class, 'cadastrarSalas'])->name('cadastrar.salas');

Route::get('/reservar_salas', [UsuariosController::class, ''])->name('reservar');

Route::get('/', [UsuariosController::class,
