@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'create', 'resource' => 'atualizacoes']) @endcomponent
            </div>

            @component('componentes.avisos.avisos', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent

            <form action="{{ route('atualizacoes.store') }}" method="post">
                @csrf
                <div>
                    <label for="autor" class="visually-hidden">Autor</label>
                    <select id="autor" name="autor">
                        <option selected>Selecione um Autor</option>
                        @foreach($tiposPerfis as $tipoPerfil)
                            <option value="{{ $tipoPerfil->codigo }}">
                                {{ $tipoPerfil->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="descricao" class="visually-hidden">Informe a mensage</label>
                    <textarea id="descricao" name="descricao" placeholder="Informe a mensagem" rows="5">{{ old('descricao') }}</textarea>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
