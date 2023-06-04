@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'edit','resource' => 'clientes','id' => $cliente->id])
                @endcomponent
            </div>

            @component('componentes.avisos.avisos', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent

            <form action="{{ route('clientes.update', $cliente->id) }}" method="post">
                @csrf
                @method('put')
                <div>
                    <label for="nome" class="visually-hidden">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{ $cliente->nome }}" placeholder="Nome"/>
                </div>
                <div>
                    <label for="data_nascimento" class="visually-hidden">Data de Nascimento</label>
                    <input type="text" name="data_nascimento" id="data_nascimento"
                           data-type="date" value="{{ $cliente->data_nascimento }}" placeholder="Data de Nascimento"/>
                </div>
                <div>
                    <label for="cpfcnpj" class="visually-hidden">CPF/CNPJ</label>
                    <input type="text" name="cpfcnpj" id="cpfcnpj" data-type="cpfcnpj" placeholder="CPF/CNPJ"
                           value="{{ $cliente->isCpfOrCnpj }}">
                </div>
                <div>
                    <label for="cep" class="visually-hidden">CEP</label>
                    <input type="text" name="cep" id="cep" value="{{ $cliente->enderecos->first()->isCep }}"
                           data-type="cep" placeholder="CEP"
                           onkeyup="buscaCep();"/>
                </div>

                <div>
                    <label for="endereco" class="visually-hidden">Endereço</label>
                    <input type="text" name="endereco" id="endereco" value="{{ $cliente->enderecos->first()->rua }}"
                           placeholder="Endereço"/>
                </div>
                <div>
                    <label for="numero" class="visually-hidden">Número</label>
                    <input type="text" name="numero" id="numero" value="{{ $cliente->enderecos->first()->numero ?? '' }}" placeholder="Número"/>
                 </div>

                 <div>
                    <label for="complemento" class="visually-hidden">Complemento</label>
                    <input type="text" name="complemento" id="complemento" value="{{ $cliente->enderecos->first()->complemento ?? '' }}" placeholder="Complemento"/>
                </div>

                <div>
                    <label for="bairro" class="visually-hidden">Bairro</label>
                    <input type="text" name="bairro" id="bairro" value="{{ $cliente->enderecos->first()->bairro ?? '' }}" placeholder="Bairro"/>
                </div>

                <div>
                    <label for="nomecidade" class="visually-hidden">Cidade</label>
                    <input type="text" name="nomecidade" id="nomecidade" value="{{ $cliente->enderecos->first()->nomecidade ?? '' }}" placeholder="Cidade"/>
                </div>            

                <div>
                    <label for="nomeestado" class="visually-hidden">Estado</label>
                    <input type="text" name="nomeestado" id="nomeestado" value="{{ $cliente->enderecos->first()->nomeestado ?? '' }}" placeholder="Estado"/>
                </div>  

                <div>
                    <label for="telefone" class="visually-hidden">Telefone</label>
                    <input type="text" name="telefone" id="telefone" data-type="telefone" placeholder="Telefone"
                           value="{{ $cliente->telefones->first()->isNumero ?? '' }}"/>
                </div>
                <div class="d-flex justify-content-center my-3">
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" role="switch" id="fidelizado"
                               name="fidelizado" {{ $cliente->fidelizado ? 'checked' : '' }}>
                        <label class="form-check-label" for="fidelizado">Fidelizado</label>
                    </div>

                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" role="switch" id="visivel"
                               name="visivel" {{ $cliente->visivel ? 'checked' : '' }}>
                        <label class="form-check-label" for="visivel">Visível</label>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
