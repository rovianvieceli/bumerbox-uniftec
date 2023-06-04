@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', [
                    'acao' => 'show',
                    'resource' => 'atualizacoes',
                    'id' => $atualizacao->id
                ])
                @endcomponent
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-sm table-striped table-hover">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <td>{{ $atualizacao->id }}</td>
                    </tr>
                    <tr>
                        <th>Código autor</th>
                        <td>{{ $atualizacao->tipoPerfil->first()->codigo }}</td>
                    </tr>
                    <tr>
                        <th>Autor</th>
                        <td>{{ $atualizacao->tipoPerfil->first()->nome }}</td>
                    </tr>
                    <tr>
                        <th>Descrição</th>
                        <td>{{ $atualizacao->descricao }}</td>
                    </tr>
                    <tr>
                        <th>Criado em</th>
                        <td>{{ $atualizacao->criadoEm }}</td>
                    </tr>
                    <tr>
                        <th>Modifiado em</th>
                        <td>{{ $atualizacao->modificadoEm }}</td>
                    </tr>
                    <tr>
                        <th>Criado por</th>
                        <td>{{ $atualizacao->criadoPor }}</td>
                    </tr>
                    <tr>
                        <th>Modificado por</th>
                        <td>{{ $atualizacao->modificadoPor }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
