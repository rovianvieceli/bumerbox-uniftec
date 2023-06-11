@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'edit','resource' => 'regiaointeresse','id' => $regiaoInteresse->id])
                @endcomponent
            </div>

            @component('componentes.avisos.avisos', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent

            <form action="{{ route('regiaointeresse.update', $regiaoInteresse->id) }}" method="post">
                @csrf
                @method('put')
                <div>
                    <label for="nome" class="visually-hidden">Regiao</label>
                    <input type="text" name="nome" id="nome" value="{{ $regiaoInteresse->nome }}" placeholder="Regiao"/>
                </div>

                <div>
                    <label for="nomecidade" class="visually-hidden">Cidade</label>
                    <input type="text" name="nome_cidade" id="nomecidade" value="{{ $regiaoInteresse->nome_cidade }}" placeholder="Cidade"/>
                </div>

                <div class="d-flex justify-content-center my-3">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
