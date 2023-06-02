<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cliente\StoreClienteRequest;
use App\Http\Requests\Cliente\UpdateClienteRequest;
use App\Models\Endereco;
use App\Models\Telefone;
use App\Models\Usuario;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = Usuario::select('usuarios.*')
            ->leftJoin('perfis', 'usuarios.id', '=', 'perfis.usuario_id')
            ->orWhere('tipo_perfil_codigo', '=', 'CLT')
            ->where('visivel', true)
            ->paginate(10);

        return view('cliente.index')
            ->withTitulo('Listagem dos Clientes')
            ->withSubTitulo('Listagem com todos os Cliente do Sistema!')
            ->withClientes($clientes);
    }

    public function create()
    {
        return view('cliente.create')
            ->withTitulo('Cadastro de Clientes');
    }

    public function store(StoreClienteRequest $request, Usuario $cliente)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            $cliente = $cliente->create($request->all());
            $request->merge(['usuario_id', $cliente->id]);

            $request->merge(['cidade_id' => 1]);
            $cliente->enderecos()->create($request->all());

            $request->merge(['tipo_perfil_codigo' => 'CLT']);
            $cliente->perfis()->create($request->all());

            $request->merge(['numero' => $request->get('telefone')]);
            $cliente->telefones()->create($request->all());

            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não possível salvar o registro!");
        }

        return to_route('clientes.show', $cliente->id)->with('success', true)->with('menssagem', "Registro salvo com sucesso!");
    }

    public function show(Usuario $cliente)
    {
        return view('cliente.show')
            ->withTitulo($cliente->nome)
            ->withSubTitulo('Os dados do cliente estão sendo exibidos abaixo!')
            ->withCliente($cliente);
    }

    public function edit(Usuario $cliente)
    {
        return view('cliente.edit')
            ->withTitulo($cliente->nome)
            ->withSubTitulo('Altere os dados do cliente abaixo!')
            ->withCliente($cliente);
    }

    public function update(UpdateClienteRequest $request, Usuario $cliente)
    {
        $request->validated();

        try {
            DB::beginTransaction();
            $cliente->update($request->all());

            $request->merge(['usuario_id' => $cliente->id]);

            $request->merge(['cidade_id' => 1]);
            if ($cliente->enderecos()->count()) {
                $cliente->enderecos()->update($request->all(['usuario_id', 
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

            if ($cliente->telefones()->count()) {
                $cliente->telefones()->update(['numero' => $request->get('telefone')]);
            } else {
                Telefone::create($request->all());
            }
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não possível salvar o registro!");
        }

        return to_route('clientes.show', $cliente->id)->with('success', true)->with('menssagem', "Registro salvo com sucesso!");
    }

    public function destroy(Usuario $cliente)
    {
        try {
            DB::beginTransaction();
            $cliente->telefones()->delete();
            $cliente->enderecos()->delete();
            $cliente->delete();
            DB::commit();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();
            return back()->with('success', false)->with('menssagem', "Não possível remover o registro!");
        }

        return to_route('clientes.index')->with('success', false)->with('menssagem', "Registro removido com sucesso!");
    }
}
