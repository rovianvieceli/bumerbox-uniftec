@extends('layout.base')

@section('conteudo')
    @component('componentes.formulario.cadastro', ['acao' => 'create', 'recurso' => 'fornecedores', 'errors' => $errors])
        <form action="{{ route('fornecedores.store') }}" method="post">
            @csrf

            <div>
                <label for="nomefantasia" class="visually-hidden">Nome Fantasia</label>
                <input type="text" name="nomefantasia" id="nomefantasia" value="{{ old('nomefantasia') }}"
                       placeholder="Nome Fantasia"/>
            </div>

            <div>
                <label for="cpfcnpj" class="visually-hidden">CNPJ</label>
                <input type="text" name="cpfcnpj" id="cpfcnpj" value="{{ old('cpfcnpj') }}" data-type="cpfcnpj"
                       placeholder="CNPJ"/>
            </div>

            <div>
                <label for="cep" class="visually-hidden">CEP</label>
                <input type="text" name="cep" onkeyup="buscaCep();" id="cep" value="{{ old('cep') }}" onkeyup="" data-type="cep" placeholder="CEP"/>
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
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    @endcomponent
@endsection