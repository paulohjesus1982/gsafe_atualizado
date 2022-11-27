<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Usuario
Route::group(['prefix' => '/usuario'], function () {
    Route::get('/listar', [App\Http\Controllers\UsuarioController::class, 'Listar'])->name('usuario.listar');
    Route::get('/cadastrar', [App\Http\Controllers\UsuarioController::class, 'Cadastrar']);
    Route::get('/editar', [App\Http\Controllers\UsuarioController::class, 'Editar'])->name('usuario.editar');
    Route::post('/salvar', [App\Http\Controllers\UsuarioController::class, 'Salvar'])->name('usuario.salvar');
});
// Equipe
Route::group(['prefix' => '/equipe'], function () {
    Route::get('/listar', [App\Http\Controllers\EquipeController::class, 'Listar'])->name('equipes.listar');
    Route::get('/cadastrar', [App\Http\Controllers\EquipeController::class, 'Cadastrar']);
    Route::get('/editar', [App\Http\Controllers\EquipeController::class, 'Editar'])->name('equipes.editar');
    Route::post('/salvar', [App\Http\Controllers\EquipeController::class, 'Salvar'])->name('equipes.salvar');
});
