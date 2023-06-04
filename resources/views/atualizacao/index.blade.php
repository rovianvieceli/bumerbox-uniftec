@extends('layout.base')

@section('conteudo')
    @component('componentes.formulario.listagem',[
        'registros' => $atualizacoes,
        'resource' => 'atualizacoes',
        'titulos' => ['#', 'Autor', 'Mensagem'],
        'colunas' => ['id', 'tipoPerfil@nome', 'mensagem']
    ])
    @endcomponent
@endsection
