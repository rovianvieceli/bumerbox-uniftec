@extends('layout.base')

@section('conteudo')
    @component('componentes.formulario.listagem',[
        'registros' => $categorias,
        'resource' => 'categorias',
        'titulos' => ['#', 'Nome', 'Valor'],
        'colunas' => ['id', 'nome', 'valor_unitario']
    ])
    @endcomponent
@endsection
