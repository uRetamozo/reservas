<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'cadastrarusuario')->name('home');

Route::view('/cadastrar_usuario', 'cadastrarusuario')->name('cadastrar.usuario');

Route::view('/cadastrar_sala', 'cadastrarsalas')->name('cadastrar.sala');

Route::view('/reservar_salas', 'reservarsala')->name('reservar.sala');

Route::view('/relatorios', 'relatorios')->name('relatorios');

