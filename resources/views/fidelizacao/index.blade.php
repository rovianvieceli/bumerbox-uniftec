@extends('layout.base')

@section('conteudo')
    @component('componentes.formulario.listagem',[
        'registros' => $fidelizacoes,
        'resource' => 'fidelizacoes',
        'titulos' => ['#', 'Valor'],
        'colunas' => ['id', 'valor_receber']
    ])
    @endcomponent
@endsection
