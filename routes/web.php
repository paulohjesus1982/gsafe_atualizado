<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
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

// Equipe
Route::group(['prefix' => '/equipe'], function () {
    Route::get('/listar', [App\Http\Controllers\EquipeController::class, 'Listar']);
    Route::get('/cadastrar', [App\Http\Controllers\EquipeController::class, 'Cadastrar']);
    Route::post('/salvar', [App\Http\Controllers\EquipeController::class, 'Salvar'])->name('equipes.salvar');
});

