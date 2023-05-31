<?php

namespace App\Http\Controllers;

use App\Http\Requests\Fornecedor\StoreFornecedorRequest;
use App\Http\Requests\Fornecedor\UpdateFornecedorRequest;
use App\Models\Endereco;
use App\Models\Telefone;
use App\Models\Usuario;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FornecedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $fornecedores = Usuario::select('usuarios.*')
            ->leftJoin('perfis', 'usuarios.id', '=', 'perfis.usuario_id')
            ->orWhere('tipo_perfil_codigo', '=', 'FRN')
            ->where('visivel', true)
            ->paginate(10);

        return view('fornecedor.index')
            ->withTitulo('Listagem de Fornecedores')
            ->withSubTitulo('Listagem com todos os Fornecedores do sistema!')
            ->withFornecedores($fornecedores);
    }

    public function create()
    {
        return view('fornecedor.create')
            ->withTitulo('Cadastro de Fornecedores');
    }

    public function store(StoreFornecedorRequest $request, Usuario $fornecedor)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $fornecedor = $fornecedor->create($request->all());
            $request->merge(['usuario_id', $fornecedor->id]);

            $request->merge(['tipo_perfil_codigo' => 'FRN']);
            $fornecedor->perfis()->create($request->all());

            $request->merge(['cidade_id' => 1]);
            $fornecedor->enderecos()->create($request->all());

            $request->merge(['numero' => $request->get('telefone')]);
            $fornecedor->telefones()->create($request->all());

            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não possível salvar o registro!");
        }

        return to_route('fornecedores.show', $fornecedor->id)->with('success', true)->with('menssagem', "Registro salvo com sucesso!");
    }

    public function show(Usuario $fornecedore)
    {
        return view('fornecedor.show')
            ->withTitulo($fornecedore->nome)
            ->withSubTitulo('Os dados do usuário selecionado serão exibidos abaixo!')
            ->withFornecedor($fornecedore);
    }

    public function edit(Usuario $fornecedore)
    {
        return view('fornecedor.edit')
            ->withTitulo($fornecedore->nome)
            ->withSubTitulo('Altere os dados do usuário selecionado!')
            ->withFornecedor($fornecedore);
    }

    public function update(UpdateFornecedorRequest $request, Usuario $fornecedore)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $fornecedore->update($request->all());
            $request->merge(['usuario_id' => $fornecedore->id]);

            $request->merge(['cidade_id' => 1]);
            if ($fornecedore->enderecos()->count()) {
                $fornecedore->enderecos()->update($request->all(['usuario_id', 
                                                                 'cidade_id', 
                                                                 'rua',
                                                                 'complemento',
                                                                 'bairro',
                                                                 'nomecidade',
                                                                 'nomeestado' ,
                                                                 'cep', 
                                                                 'numero']));
            } else {
                Endereco::create($request->all());
            }

            if ($fornecedore->telefones()->count()) {
                $fornecedore->telefones()->update(['numero' => $request->get('telefone')]);
            } else {
                Telefone::create($request->all());
            }

            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não possível atualizar o registro!");
        }

        return to_route('fornecedores.show', $fornecedore->id)->with('success', true)->with('menssagem', "Registro salvo com sucesso!");
    }

    public function destroy(Usuario $fornecedore)
    {
        try {
            DB::beginTransaction();

            $fornecedore->telefones()->delete();
            $fornecedore->enderecos()->delete();
            $fornecedore->update(['cpfcnpj'=>null]);
            $fornecedore->delete();

            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não remover o registro!");
        }

        return to_route('fornecedores.index')->with('success', true)->with('menssagem', "Registro removido com sucesso!");
    }
}
