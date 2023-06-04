<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categoria\StoreCategoriaRequest;
use App\Http\Requests\Categoria\UpdateCategoriaRequest;
use App\Models\Categoria;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categorias = Categoria::paginate(10);

        return view('categoria.index')
            ->withTitulo('Listagem de categorias')
            ->withSubTitulo('Listagem com todos as categorias do sistema!')
            ->withCategorias($categorias);
    }

    public function create()
    {
        return view('categoria.create')
            ->withTitulo('Cadastro de categorias')
            ->withSubTitulo('Cadastre uma categoria para utilizar o sistema!');
    }

    public function store(StoreCategoriaRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            $categoria = Categoria::create($request->all());
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não possível salvar o registro!");
        }

        return to_route('categorias.show', $categoria->id)->with('success', true)->with('menssagem', "Registro salvo com sucesso!");
    }

    public function show(int $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return to_route('home.index')->with('success', false)->with('menssagem', "Registro não localizado!");
        }

        return view('categoria.show')
            ->withTitulo($categoria->nome)
            ->withSubTitulo('Os dados do categoria selecionado serão exibidos abaixo!')
            ->withCategoria($categoria);
    }

    public function edit(int $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return to_route('home.index')->with('success', false)->with('menssagem', "Registro não localizado!");
        }

        return view('categoria.edit')
            ->withTitulo($categoria->nome)
            ->withSubTitulo('Altere os dados da atualização selecionado!')
            ->withCategoria($categoria);
    }

    public function update(UpdateCategoriaRequest $request, int $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return to_route('home.index')->with('success', false)->with('menssagem', "Registro não localizado!");
        }

        $request->validated();

        try {
            DB::beginTransaction();
            $categoria->update($request->all());
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não possível atualizar o registro!");
        }

        return to_route('categorias.show', $categoria->id)->with('success', true)->with('menssagem', "Registro salvo com sucesso!");
    }

    public function destroy(int $id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return to_route('home.index')->with('success', false)->with('menssagem', "Registro não localizado!");
        }
        try {
            DB::beginTransaction();
            $categoria->delete();
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não remover o registro!");
        }

        return to_route('categorias.index')->with('success', true)->with('menssagem', "Registro removido com sucesso!");
    }
}
