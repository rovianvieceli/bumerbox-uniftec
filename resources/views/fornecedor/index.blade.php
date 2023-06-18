@extends('layout.base')

@section('conteudo')
    @component('componentes.formulario.listagem',[
        'registros' => $fornecedores,
        'resource' => 'fornecedores',
        'titulos' => ['#', 'Nome', 'CNPJ', 'Fidelizado'],
        'colunas' => ['id', 'nome', 'isCpfOrCnpj', 'isFidelizado']
    ])
        @component('fornecedor.parcial.filtros') @endcomponent
    @endcomponent
@endsection
