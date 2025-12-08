<?php

use App\Http\Controllers\ReservasController;
use App\Http\Controllers\SalasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

//usuarios
Route::get('/', [UsuariosController::class, 'index'])->name('cadastrar.usuario');
Route::post('/cadastrarusuario', [UsuariosController::class, 'salvarUsuarios'])->name('salvar.usuario');

//Salas
Route::get('/cadastrarsala', [SalasController::class, 'index'])->name('cadastrar.sala');
Route::post('salvar', [SalasController::class, 'cadastrarSala'])->name('salvarsala');

//Reservas
Route::get('/reservarsalas', [ReservasController::class, 'index'])->name('reservar.sala');
Route::post('/reservar/sala', [ReservasController::class, 'reservarSala'])->name('salvar.reserva');


//relatorios
Route::view('/relatorios', 'relatorios')->name('relatorios');

