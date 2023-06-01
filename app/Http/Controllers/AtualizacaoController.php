<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAtualizacaoRequest;
use App\Http\Requests\UpdateAtualizacaoRequest;
use App\Models\Atualizacao;
use App\Models\Perfil;
use App\Models\TipoPerfil;
use App\Models\Usuario;

class AtualizacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $atualizacoes = Atualizacao::with(TipoPerfil::class)->paginate(10);

        return view('atualizacao.index')
            ->withTitulo('Atualizações')
            ->withAtualizacoes($atualizacoes);
    }

    public function create()
    {

    }

    public function store(StoreAtualizacaoRequest $request)
    {
        //
    }

    public function show(Atualizacao $atualizacao)
    {
        //
    }

    public function edit(Atualizacao $atualizacao)
    {
        //
    }

    public function update(UpdateAtualizacaoRequest $request, Atualizacao $atualizacao)
    {
        //
    }

    public function destroy(Atualizacao $atualizacao)
    {
        //
    }
}
