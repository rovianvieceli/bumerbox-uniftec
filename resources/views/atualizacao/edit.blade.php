@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'edit','resource' => 'usuarios','id' => $usuario->id])
                @endcomponent
            </div>

            @component('componentes.avisos.avisos', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent

            <form action="{{ route('usuarios.update', $usuario->id) }}" method="post">
                @csrf
                @method('put')
                <div>
                    <label for="nome" class="visually-hidden">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{ $usuario->nome }}" placeholder="Nome"/>
                </div>
                <div>
                    <label for="data_nascimento" class="visually-hidden">Data de Nascimento</label>
                    <input type="text" name="data_nascimento" id="data_nascimento"
                           data-type="date" value="{{ $usuario->data_nascimento }}" placeholder="Data de Nascimento"/>
                </div>
                <div>
                    <label for="cpfcnpj" class="visually-hidden">CPF/CNPJ</label>
                    <input type="text" name="cpfcnpj" id="cpfcnpj" data-type="cpfcnpj" placeholder="CPF/CNPJ"
                           value="{{ $usuario->isCpfOrCnpj }}">
                </div>
                <div class="d-flex justify-content-center my-3">
                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" role="switch" id="fidelizado"
                               name="fidelizado" {{ $usuario->fidelizado ? 'checked' : '' }}>
                        <label class="form-check-label" for="fidelizado">Fidelizado</label>
                    </div>

                    <div class="form-check form-switch form-check-inline">
                        <input class="form-check-input" type="checkbox" role="switch" id="visivel"
                               name="visivel" {{ $usuario->visivel ? 'checked' : '' }}>
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
