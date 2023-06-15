<?php

namespace App\Http\Controllers;

use App\Http\Requests\Fidelizacao\StoreFidelizacaoRequest;
use App\Http\Requests\Fidelizacao\UpdateFidelizacaoRequest;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\Fidelizacao;
use App\Models\RegiaoInteresse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FidelizacaoController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $fidelizacao = Fidelizacao::select(["fidelizacoes.*", 
                                            "categorias.nome", 
                                            "regioes_interesse.nome as regiao"])
            ->join('categorias', 'categorias.id', '=', 'fidelizacoes.categoria_id')
            ->Join('regioes_interesse', 'regioes_interesse.id', '=', 'fidelizacoes.regioes_interesse_id')
            ->where('usuario_id', '=', auth()->user()->id)
            ->orderBy("fidelizacoes.id")
            ->paginate(10);

        return view('fidelizacao.index')
            ->withTitulo('Listagem de Fidelizações')
            ->withSubTitulo('Listagem com todas as fidelizações do usuário!')
            ->withFidelizacoes($fidelizacao);
    }
    
    public function create()
    {
        $dados = new \stdClass();
        $categorias = Categoria::all()->sortBy("nome");
        $regiao_interesse = RegiaoInteresse::all()->sortBy("nome");

        $dados->categorias = $categorias;
        $dados->regiao_interesse = $regiao_interesse;

        return view('fidelizacao.create')
            ->withTitulo('Cadastro de Fidelizações')
            ->withDados($dados);
    }

    public function show(int $id)
    {

        $fidelizacao = Fidelizacao::select(["fidelizacoes.*", 
                                            "categorias.nome as categoria", 
                                            "regioes_interesse.nome as regiao"])
            ->join('categorias', 'categorias.id', '=', 'fidelizacoes.categoria_id')
            ->Join('regioes_interesse', 'regioes_interesse.id', '=', 'fidelizacoes.regioes_interesse_id')
            ->where('fidelizacoes.id', '=', $id)
            ->first();

        if (!$fidelizacao) {
            return to_route('home.index')->with('success', false)->with('menssagem', "Registro não localizado!");
        }

        return view('fidelizacao.show')
            ->withTitulo("Fidelizacao: ". $fidelizacao->id )
            ->withSubTitulo('Os dados da fidelização selecionada serão exibidos abaixo!')
            ->withFidelizacao($fidelizacao);
    }

    public function edit(int $id)
    {
        $fidelizacao = Fidelizacao::find($id);

        if (!$fidelizacao) {
            return to_route('home.index')->with('success', false)->with('menssagem', "Registro não localizado!");
        }

        $fidelizacao->categorias = Categoria::all()->sortBy("nome");
        $fidelizacao->regioes = RegiaoInteresse::all()->sortBy("nome");
 
        return view('fidelizacao.edit')
            ->withTitulo("Fidelizacao " . $fidelizacao->id)
            ->withSubTitulo('Altere os dados da fidelização selecionada!')
            ->withFidelizacao($fidelizacao);
    }

    public function store(StoreFidelizacaoRequest $request)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            $request->merge(['usuario_id' => auth()->user()->id]);
            $fidelizacao = Fidelizacao::create($request->all());
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não foi possível salvar o registro!");
        }

        return to_route('fidelizacoes.show', $fidelizacao->id)->with('success', true)->with('menssagem', "Registro salvo com sucesso!");
    }

    public function update(UpdateFidelizacaoRequest $request, int $id)
    {
        $request->validated();
        $fidelizacao = Fidelizacao::find($id);

        if (!$fidelizacao) {
            return to_route('home.index')->with('success', false)->with('menssagem', "Registro não localizado!");
        }

        try {
            DB::beginTransaction();
            $request->merge(['usuario_id' => $fidelizacao->usuario_id]);
            $fidelizacao->update($request->all());
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não foi possível atualizar o registro!");
        }

        return to_route('fidelizacoes.show', $fidelizacao->id)->with('success', true)->with('menssagem', "Registro salvo com sucesso!");
    }

    public function destroy(int $id)
    {
        $fidelizacao = Fidelizacao::find($id);

        if (!$fidelizacao) {
            return to_route('home.index')->with('success', false)->with('menssagem', "Registro não localizado!");
        }
        try {
            DB::beginTransaction();
            $fidelizacao->delete();
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não remover o registro!");
        }

        return to_route('fidelizacoes.index')->with('success', true)->with('menssagem', "Registro removido com sucesso!");
    }
}
