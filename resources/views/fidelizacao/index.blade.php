@extends('layout.base')
@section('conteudo')
@component('componentes.formulario.listagem',[
    'registros' => $fidelizacoes,
    'resource' => 'fidelizacoes',
    'titulos' => ['#','Categoria', 'Região de Interesse','Valor Receber'],
    'colunas' => ['id', 'nome' , 'regiao' , 'valor_receber']
    ])
    @endcomponent
   
@endsection
