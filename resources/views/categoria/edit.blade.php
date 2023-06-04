@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'edit','resource' => 'categorias','id' => $categoria->id])
                @endcomponent
            </div>

            @component('componentes.avisos.avisos', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent

            <form action="{{ route('categorias.update', $categoria->id) }}" method="post">
                @csrf
                @method('put')
                <div>
                    <label for="nome" class="visually-hidden">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{ $categoria->nome }}" placeholder="Nome"/>
                </div>
                <div>
                    <label for="valor" class="visually-hidden">Valor por unidade</label>
                    <input type="text" name="valor_unitario" id="valor" value="{{ $categoria->valor_unitario }}"
                           placeholder="Valor por unidade"/>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
