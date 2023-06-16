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
Route::resource('relatorios', Controllers\RelatoriosController::class);
Route::post(
    'busca-dados-cep', "App\Http\Controllers\EnderecoController@getEnderecoByCep"
)->name('busca-dados-cep');


/**
 * relatorios
 */
Route::get('/export-csv-clientes', 'App\Http\Controllers\RelatoriosController@exportCSVClientes');
Route::get('/export-csv-fornecedores', 'App\Http\Controllers\RelatoriosController@exportCSVFornecedores');
Route::get('/export-csv-categorias', 'App\Http\Controllers\RelatoriosController@exportCSVCategorias');
Route::get('/export-csv-regioes', 'App\Http\Controllers\RelatoriosController@exportCSVRegioes');
Route::get('/export-csv-fidelizacoes', 'App\Http\Controllers\RelatoriosController@exportCSVFidelizacoes');
Route::get('/export-csv-usuarios', 'App\Http\Controllers\RelatoriosController@exportCSVUsuarios');