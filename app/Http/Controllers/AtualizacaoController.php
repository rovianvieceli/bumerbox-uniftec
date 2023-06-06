<?php

namespace App\Http\Controllers;

use App\Http\Requests\Atualizacao\StoreAtualizacaoRequest;
use App\Http\Requests\Atualizacao\UpdateAtualizacaoRequest;
use App\Models\Atualizacao;
use App\Models\TipoPerfil;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AtualizacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $atualizacoes = Atualizacao::paginate(10);

        return view('atualizacao.index')
            ->withTitulo('Atualizações')
            ->withAtualizacoes($atualizacoes);
    }

    public function create()
    {
        $tiposPerfis = TipoPerfil::all();
        return view('atualizacao.create')
            ->withTitulo('Cadastro de Atualizações')
            ->withSubTitulo('Informações de atualizações do sistema!')
            ->withTiposPerfis($tiposPerfis);
    }

    public function store(StoreAtualizacaoRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            $usuario = Atualizacao::create($request->all());
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não possível salvar o registro!");
        }

        return to_route('atualizacoes.show', $usuario->id)->with('success', true)->with('menssagem', "Registro salvo com sucesso!");
    }

    public function show(int $id)
    {
        $atualizacao = Atualizacao::find($id);

        if (!$atualizacao) {
            return to_route('home.index')->with('success', false)->with('menssagem', "Registro não localizado!");
        }

        return view('atualizacao.show')
            ->withTitulo(substr($atualizacao->descricao, 0, 30) . '...')
            ->withSubTitulo('Os dados da atualização selecionado serão exibidos abaixo!')
            ->withAtualizacao($atualizacao);
    }

    public function edit(int $id)
    {
        $atualizacao = Atualizacao::find($id);

        if (!$atualizacao) {
            return to_route('home.index')->with('success', false)->with('menssagem', "Registro não localizado!");
        }

        return view('atualizacao.edit')
            ->withTitulo(substr($atualizacao->descricao, 0, 30) . '...')
            ->withSubTitulo('Altere os dados da atualização selecionado!')
            ->withAtualizacao($atualizacao);
    }

    public function update(UpdateAtualizacaoRequest $request, int $id)
    {
        $atualizacao = Atualizacao::find($id);

        if (!$atualizacao) {
            return to_route('home.index')->with('success', false)->with('menssagem', "Registro não localizado!");
        }

        $request->validated();

        try {
            DB::beginTransaction();
            $atualizacao->update($request->all());
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não possível atualizar o registro!");
        }

        return to_route('atualizacoes.show', $atualizacao->id)->with('success', true)->with('menssagem', "Registro salvo com sucesso!");
    }

    public function destroy(int $id)
    {
        $atualizacao = Atualizacao::find($id);

        if (!$atualizacao) {
            return to_route('home.index')->with('success', false)->with('menssagem', "Registro não localizado!");
        }

        try {
            DB::beginTransaction();
            $atualizacao->delete();
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não remover o registro!");
        }

        return to_route('atualizacoes.index')->with('success', true)->with('menssagem', "Registro removido com sucesso!");
    }
}
