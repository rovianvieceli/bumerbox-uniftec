@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', [
                    'acao' => 'show',
                    'resource' => 'regiaointeresse',
                    'id' => $regiaoInteresse->id
                ])
                @endcomponent
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-sm table-striped table-hover">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <td>{{ $regiaoInteresse->id }}</td>
                    </tr>
                    <tr>
                        <th>Região</th>
                        <td>{{ $regiaoInteresse->nome }}</td>
                    </tr>
                    <tr>
                        <th>Cidade</th>
                        <td>{{ $regiaoInteresse->nome_cidade }}</td>
                    </tr>
                    <tr>
                        <th>Criado em</th>
                        <td>{{ $regiaoInteresse->criadoEm }}</td>
                    </tr>
                    <tr>
                        <th>Modifiado em</th>
                        <td>{{ $regiaoInteresse->modificadoEm }}</td>
                    </tr>
                    <tr>
                        <th>Criado por</th>
                        <td>{{ $regiaoInteresse->criadoPor }}</td>
                    </tr>
                    <tr>
                        <th>Modificado por</th>
                        <td>{{ $regiaoInteresse->modificadoPor }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
