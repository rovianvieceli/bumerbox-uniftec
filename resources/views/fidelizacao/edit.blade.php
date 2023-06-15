@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'edit','resource' => 'fidelizacoes','id' => $fidelizacao->id])
                @endcomponent
            </div>

            @component('componentes.avisos.avisos', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent

            <form action="{{ route('fidelizacoes.update', $fidelizacao->id) }}" method="post">
                @csrf
                @method('put')
                <div>
                    <label for="categoria" class="visually-hidden">Categoria</label>
                    <select name="categoria_id" id="categoria_id">
                    @foreach($fidelizacao->categorias as $categoria)
                   
                      @if($categoria->id == $fidelizacao->categoria_id )
                        <option value="{{$categoria->id}}" selected = "selected" >{{$categoria->nome}}</option>
                      @else 
                        <option value="{{$categoria->id}}" > {{$categoria->nome}}</option> 
                      @endif

                    @endforeach
                </select>   
                </div>
                <div>
                    <label for="regiao_interesse" class="visually-hidden">Região Interesse</label>
                    <select name="regioes_interesse_id" id="regioes_interesse_id">
                        @foreach($fidelizacao->regioes as $regiao)

                          @if($regiao->id == $fidelizacao->regioes_interesse_id )
                            <option value="{{$regiao->id}}" selected = "selected" >{{$regiao->nome}}</option>
                          @else 
                            <option value="{{$regiao->id}}" > {{$regiao->nome}}</option> 
                          @endif

                        @endforeach
                    </select>  
                </div>
                <div>
                    <label for="quantidade" class="visually-hidden">Quantidade</label>
                    <input type="text" name="valor_receber" id="valor_receber"  placeholder="Quantidade"
                           value="{{ $fidelizacao->valor_receber }}">
                </div>

                <div class="d-flex justify-content-center my-3">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection