@extends('layout.base')

@section('conteudo')
    @component('componentes.formulario.cadastro', ['acao' => 'create', 'recurso' => 'fidelizacoes','dados' => 'dados' ,'errors' => $errors])
        <form action="{{ route('fidelizacoes.store') }}" method="post">
            @csrf

            <div>
            
                <label for="categoria_id" class="visually-hidden">Categorias</label>
                <select name="categoria_id" id="categoria_id">
                    <option value="">Selecione a Categoria</option>
                    @foreach($dados->categorias as $categoria)
                      <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                    @endforeach
                </select>    
            </div>
            <div>
                <label for="regioes_interesse" class="visually-hidden">Região Interesse</label>
                <select name="regioes_interesse_id" id="regioes_interesse_id">
                    <option value="">Selecione a Região de Interesse</option>
                    @foreach($dados->regiao_interesse as $regiao)
                      <option value="{{$regiao->id}}">{{$regiao->nome}}</option>
                    @endforeach
                </select>  
            </div>
            <div>
                <label for="valor_receber" class="visually-hidden">Valor Receber</label>
                <input type="text"  name="valor_receber" id="valor_receber" value="{{ old('valor_receber') }}" placeholder="Valor Receber"/>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    @endcomponent
@endsection