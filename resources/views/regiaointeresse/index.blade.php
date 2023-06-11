@extends('layout.base')

@section('conteudo')
    @component('componentes.formulario.listagem',[
        'registros' => $regiaoInteresse,
        'resource' => 'regiaointeresse',
        'titulos' => ['#', 'Regiao','Cidade'],
        'colunas' => ['id', 'nome', 'nome_cidade']
    ])
    @endcomponent
@endsection
