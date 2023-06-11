<?php

use App\Http\Controllers as Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [Controllers\AutenticacaoController::class, 'index'])->name('login');
Route::get('/logout', [Controllers\AutenticacaoController::class, 'logout'])->name('logout');
Route::post('/autenticar', [Controllers\AutenticacaoController::class, 'autenticar'])->name('autenticar');

Route::resource('home', Controllers\HomeController::class);
Route::resource('clientes', Controllers\ClienteController::class);
Route::resource('usuarios', Controllers\UsuarioController::class);
Route::resource('conta', Controllers\ContaController::class);
Route::resource('registro', Controllers\RegistroController::class);
Route::resource('minhaconta', Controllers\MinhaContaController::class);
Route::resource('atualizacoes', Controllers\AtualizacaoController::class);
Route::resource('fornecedores', Controllers\FornecedorController::class);
Route::resource('categorias', Controllers\CategoriaController::class);
Route::resource('regiaointeresse', Controllers\RegiaoInteresseController::class);
Route::resource('fidelizacoes', Controllers\FidelizacaoController::class);

Route::post(
    'busca-dados-cep', "App\Http\Controllers\EnderecoController@getEnderecoByCep"
)->name('busca-dados-cep');
