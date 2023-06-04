@extends('layout.base')

@section('conteudo')
    @component('componentes.formulario.cadastro', ['acao' => 'create', 'recurso' => 'clientes', 'errors' => $errors])
        <form action="{{ route('clientes.store') }}" method="post">
            @csrf
            <div>
                <label for="nome" class="visually-hidden">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" placeholder="Nome"/>
            </div>

            <div>
                <label for="data_nascimento" class="visually-hidden">Data de Nascimento</label>
                <input type="text" name="data_nascimento" id="data_nascimento" value="{{ old('data_nascimento') }}"
                       data-type="date" placeholder="Data de Nascimento"/>
            </div>

            <div>
                <label for="cpfcnpj" class="visually-hidden">CPF/CNPJ</label>
                <input type="text" name="cpfcnpj" id="cpfcnpj" value="{{ old('cpfcnpj') }}" data-type="cpfcnpj"
                       placeholder="CPF/CNPJ"/>
            </div>

            <div>
                <label for="cep" class="visually-hidden">CEP</label>
                <input type="text" name="cep" id="cep" value="{{ old('cep') }}" onkeyup="buscaCep();" data-type="cep" placeholder="CEP"/>
            </div>

            <div>
                <label for="endereco" class="visually-hidden">Endereço</label>
                <input type="text" name="endereco" id="endereco" value="{{ old('endereco') }}" placeholder="Endereço"/>
            </div>

            
            <div>
                <label for="numero" class="visually-hidden">Número</label>
                <input type="text" name="numero" id="numero" value="{{ old('numero') }}" placeholder="Número"/>
            </div>

            <div>
                <label for="complemento" class="visually-hidden">Complemento</label>
                <input type="text" name="complemento" id="complemento" value="{{ old('complemento') }}" placeholder="Complemento"/>
            </div>

            <div>
                <label for="bairro" class="visually-hidden">Bairro</label>
                <input type="text" name="bairro" id="bairro" value="{{ old('bairro') }}" placeholder="Bairro"/>
            </div>

            <div>
                <label for="nomecidade" class="visually-hidden">Cidade</label>
                <input type="text" name="nomecidade" id="nomecidade" value="{{ old('nomecidade') }}" placeholder="Cidade"/>
            </div>            

            <div>
                <label for="nomeestado" class="visually-hidden">Estado</label>
                <input type="text" name="nomeestado" id="nomeestado" value="{{ old('nomeestado') }}" placeholder="Estado"/>
            </div>            


            <div>
                <label for="telefone" class="visually-hidden">Telefone</label>
                <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}" data-type="telefone"
                       placeholder="Telefone"/>
            </div>

            <div>
                <label for="senha" class="visually-hidden">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Senha"/>
            </div>

            <div>
                <label for="confirmar_senha" class="visually-hidden">Confirmar Senha</label>
                <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirmar senha"/>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <div class="form-check form-switch form-check-inline">
                    <input class="form-check-input" type="checkbox" role="switch" id="fidelizado" name="fidelizado">
                    <label class="form-check-label" for="fidelizado">Fidelizado</label>
                </div>

                <div class="form-check form-switch form-check-inline">
                    <input class="form-check-input" type="checkbox" role="switch" id="visivel" name="visivel"
                           checked>
                    <label class="form-check-label" for="visivel">Visível</label>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    @endcomponent
@endsection
