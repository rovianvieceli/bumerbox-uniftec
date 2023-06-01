<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegiaoInteresseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       
        return view('regiaointeresse.index')
            ->withTitulo('Listagem das Regiões de Interesse')
            ->withSubTitulo('Listagem com todas as Regiões de Interesse do sistema!');
    }

    public function create()
    {
        return view('regiaointeresse.create')
            ->withTitulo('Cadastro de Região de Interesse');
    }

    public function store()
    {

    }

    public function show()
    {
        return view('regiaointeresse.show')
            ->withTitulo ()
            ->withSubTitulo('Os dados da região selecionada serão exibidos abaixo!');
    }

    public function edit()
    {
        return view('regiaointeresse.edit')
            ->withTitulo()
            ->withSubTitulo('Altere os dados da região selecionada!')
    }

    public function update()
    {
       
    }

    public function destroy()
    {
        
    }
}
