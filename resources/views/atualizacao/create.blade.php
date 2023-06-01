@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'create', 'resource' => 'usuarios']) @endcomponent
            </div>

            @component('componentes.avisos.avisos', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent

            <form action="{{ route('usuarios.store') }}" method="post">
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
        </div>
    </div>
@endsection
