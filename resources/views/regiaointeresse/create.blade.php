@extends('layout.base')

@section('conteudo')
    @component('componentes.formulario.cadastro', ['acao' => 'create', 'recurso' => 'regiaointeresse', 'errors' => $errors])
        <form action="{{ route('regiaointeresse.store') }}" method="post">
            @csrf

            <div>
                <label for="nome" class="visually-hidden">Regiao</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}"
                       placeholder="Regiao"/>
            </div>

            <div>
                <label for="nomecidade" class="visually-hidden">Cidade</label>
                <input type="text" name="nome_cidade" id="nomecidade" value="{{ old('nome_cidade') }}"
                       placeholder="Cidade"/>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    @endcomponent
@endsection
