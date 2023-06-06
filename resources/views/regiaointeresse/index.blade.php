@extends('layout.base')

@section('conteudo')
    @component('componentes.formulario.listagem',[
        'registros' => $fornecedores,
        'resource' => 'fornecedores',
        'titulos' => ['#', 'Regiao','Cidade'],
        'colunas' => ['id', 'regiao', 'cidade']
    ])
    @endcomponent
@endsection
