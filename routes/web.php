<?php

use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('cadastrarusuario');
});

Route::get('/cadastrar_usuario', [UsuariosController::class, ''])->name('cadastrar.usuarios');

Route::get('/relatorios', [UsuariosController::class, ''])->name('relatorios');

Route::get('/cadastrar_sala', [UsuariosController::class, ''])->name('cadastrar.salas');

Route::get('/reservar_salas', [UsuariosController::class, ''])->name('reservar');
