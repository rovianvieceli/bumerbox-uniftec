@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'edit','resource' => 'atualizacoes','id' => $atualizacao->id])
                @endcomponent
            </div>

            @component('componentes.avisos.avisos', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent

            <form action="{{ route('atualizacoes.update', $atualizacao->id) }}" method="post">
                @csrf
                @method('put')
                <div>
                    <label for="descricao" class="visually-hidden">Informe a mensage</label>
                    <textarea id="descricao" name="descricao" placeholder="Informe a mensagem" rows="5">{{ $atualizacao->descricao }}</textarea>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
