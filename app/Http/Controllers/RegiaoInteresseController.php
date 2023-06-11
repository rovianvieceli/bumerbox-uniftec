<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegiaoInteresse\StoreRegiaoInteressRequest;
use App\Http\Requests\RegiaoInteresse\UpdateRegiaoInteresseRequest;
use App\Models\RegiaoInteresse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegiaoInteresseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $regioasInteresse = RegiaoInteresse::paginate(10);

        return view('regiaointeresse.index')
            ->withTitulo('Listagem das Regiões de Interesse')
            ->withSubTitulo('Listagem com todas as Regiões de Interesse do sistema!')
            ->withRegiaoInteresse($regioasInteresse);
    }

    public function create()
    {
        return view('regiaointeresse.create')
            ->withTitulo('Cadastro de Região de Interesse')
            ->withSubTitulo('Informações da Região de Interesse para o sistema!');
    }

    public function store(StoreRegiaoInteressRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            $regiaoInteresse = RegiaoInteresse::create($request->all());
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não possível salvar o registro!");
        }

        return to_route('regiaointeresse.show', $regiaoInteresse->id)->with('success', true)->with('menssagem', "Registro salvo com sucesso!");
    }

    public function show(int $id)
    {
        $regiaoInteresse = RegiaoInteresse::find($id);

        if (!$regiaoInteresse) {
            return to_route('home.index')->with('success', false)->with('menssagem', "Registro não localizado!");
        }

        return view('atualizacao.show')
            ->withTitulo(substr($regiaoInteresse->nome, 0, 30) . '...')
            ->withSubTitulo('Os dados da região de interesse selecionado serão exibidos abaixo!')
            ->withRegiaoInteresse($regiaoInteresse);
    }

    public function edit(int $id)
    {
        $regiaoInteresse = RegiaoInteresse::find($id);

        if (!$regiaoInteresse) {
            return to_route('home.index')->with('success', false)->with('menssagem', "Registro não localizado!");
        }

        return view('regiaointeresse.edit')
            ->withTitulo(substr($regiaoInteresse->nome, 0, 30) . '...')
            ->withSubTitulo('Altere os dados da região selecionada!')
            ->withRegiaoInteresse($regiaoInteresse);
    }

    public function update(UpdateRegiaoInteresseRequest $request, int $id)
    {
        $regiaoInteresse = RegiaoInteresse::find($id);

        if (!$regiaoInteresse) {
            return to_route('home.index')->with('success', false)->with('menssagem', "Registro não localizado!");
        }

        $request->validated();

        try {
            DB::beginTransaction();
            $regiaoInteresse->update($request->all());
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não possível atualizar o registro!");
        }

        return to_route('regiaointeresse.show', $regiaoInteresse->id)->with('success', true)->with('menssagem', "Registro salvo com sucesso!");
    }

    public function destroy(int $id)
    {
        $regiaoInteresse = RegiaoInteresse::find($id);

        if (!$regiaoInteresse) {
            return to_route('home.index')->with('success', false)->with('menssagem', "Registro não localizado!");
        }

        try {
            DB::beginTransaction();
            $regiaoInteresse->delete();
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não remover o registro!");
        }

        return to_route('regiaointeresse.index')->with('success', true)->with('menssagem', "Registro removido com sucesso!");
    }
}
