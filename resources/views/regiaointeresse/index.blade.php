@extends('layout.base')

@section('conteudo')
    @component('componentes.formulario.listagem',[
        'registros' => $fornecedores,
        'resource' => 'fornecedores',
        'titulos' => ['#', 'Nome', 'Endereço', 'CEP','Numero','Bairro','Cidade','Estado'],
        'colunas' => ['id', 'nome', 'isCpfOrCnpj', 'isFidelizado']
    ])
    @endcomponent
@endsection
