<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PermissaoController;
use App\Http\Controllers\PremissaController;

Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Usuario
Route::group(['prefix' => '/usuario'], function () {
    Route::get('/listar',      [UsuarioController::class, 'Listar']      )->name('usuario.listar');
    Route::get('/cadastrar',   [UsuarioController::class, 'Cadastrar']   );
    Route::get('/editar/{id}', [UsuarioController::class, 'Editar']      )->name('usuario.editar');
    Route::post('/atualizar',  [UsuarioController::class, 'Atualizar']   )->name('usuario.atualizar');
    Route::post('/salvar',     [UsuarioController::class, 'Salvar']      )->name('usuario.salvar');
});

// Equipe
Route::group(['prefix' => '/equipe'], function () {
    Route::get('/listar',      [EquipeController::class, 'Listar']      )->name('equipes.listar');
    Route::get('/cadastrar',   [EquipeController::class, 'Cadastrar']   );
    Route::post('/salvar',     [EquipeController::class, 'Salvar']      )->name('equipes.salvar');
    Route::post('/atualizar',  [EquipeController::class, 'Atualizar']   )->name('equipes.atualizar');
    Route::get('/editar/{id}', [EquipeController::class, 'Editar']      )->name('equipes.editar');
});

// Permissao
Route::group(['prefix' => '/permissao'], function () {
    Route::get('/listar',       [PermissaoController::class, 'Listar']     )->name('permissao.listar');
    Route::get('/cadastrar',    [PermissaoController::class, 'Cadastrar']  );
    Route::post('/salvar',      [PermissaoController::class, 'Salvar']     )->name('permissao.salvar');
    Route::post('/atualizar',   [PermissaoController::class, 'Atualizar']  )->name('permissao.atualizar');
    Route::get('/editar/{id}',  [PermissaoController::class, 'Editar']     )->name('permissao.editar');
});

// Premissas
Route::group(['prefix' => '/premissa'], function () {
    Route::get('/listar',       [PremissaController::class, 'Listar']     )->name('premissa.listar');
    Route::get('/cadastrar',    [PremissaController::class, 'Cadastrar']  );
    Route::post('/salvar',      [PremissaController::class, 'Salvar']     )->name('premissa.salvar');
    Route::post('/atualizar',   [PremissaController::class, 'Atualizar']  )->name('premissa.atualizar');
    Route::get('/editar/{id}',  [PremissaController::class, 'Editar']     )->name('premissa.editar');
});
