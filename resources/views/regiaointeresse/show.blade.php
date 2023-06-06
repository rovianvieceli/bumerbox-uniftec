@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'show', 'resource' => 'regiaointeresse', 'id' => $regiaointeresse->id])
                @endcomponent
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-sm table-striped table-hover">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <td>{{ $regiaointeresse->id }}</td>
                    </tr>
                    <tr>
                        <th>Região</th>
                        <td>{{ $regiaointeresse->nome }}</td>
                    </tr>
                    <tr>
                        <th>Cidade</th>
                        <td>{{ $regiaointeresse->enderecos->first()->cidade?? '' }}</td>
                    </tr>

                    <tr>
                        <th>Criado em</th>
                        <td>{{ $regiaointeresse->criadoEm }}</td>
                    </tr>
                    <tr>
                        <th>Modifiado em</th>
                        <td>{{ $regiaointeresse->modificadoEm }}</td>
                    </tr>
                    <tr>
                        <th>Criado por</th>
                        <td>{{ $regiaointeresse->criadoPor }}</td>
                    </tr>
                    <tr>
                        <th>Modificado por</th>
                        <td>{{ $regiaointeresse->modificadoPor }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
