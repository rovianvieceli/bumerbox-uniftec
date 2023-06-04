@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'show', 'resource' => 'categorias', 'id' => $categoria->id])
                @endcomponent
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-sm table-striped table-hover">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <td>{{ $categoria->id }}</td>
                    </tr>
                    <tr>
                        <th>Nome</th>
                        <td>{{ $categoria->nome }}</td>
                    </tr>
                    <tr>
                        <th>Valor por unidade</th>
                        <td>{{ $categoria->valor_unitario }}</td>
                    </tr>
                    <tr>
                        <th>Criado em</th>
                        <td>{{ $categoria->criadoEm }}</td>
                    </tr>
                    <tr>
                        <th>Modifiado em</th>
                        <td>{{ $categoria->modificadoEm }}</td>
                    </tr>
                    <tr>
                        <th>Criado por</th>
                        <td>{{ $categoria->criadoPor }}</td>
                    </tr>
                    <tr>
                        <th>Modificado por</th>
                        <td>{{ $categoria->modificadoPor }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
