<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Usuario
Route::group(['prefix' => '/usuario'], function () {
    Route::get('/listar', [UsuarioController::class, 'Listar'])->name('usuario.listar');
    Route::get('/cadastrar', [UsuarioController::class, 'Cadastrar']);
    Route::get('/editar', [UsuarioController::class, 'Editar'])->name('usuario.editar');
    Route::post('/salvar', [UsuarioController::class, 'Salvar'])->name('usuario.salvar');
});

// Equipe
Route::group(['prefix' => '/equipe'], function () {
    Route::get('/listar', [EquipeController::class, 'Listar'])->name('equipes.listar');
    Route::get('/cadastrar', [EquipeController::class, 'Cadastrar']);
    Route::post('/salvar', [EquipeController::class, 'Salvar'])->name('equipes.salvar');
    Route::get('/editar/{id}', [EquipeController::class, 'Editar'])->name('equipes.editar');
});
