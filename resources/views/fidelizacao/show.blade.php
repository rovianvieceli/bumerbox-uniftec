@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'show', 'resource' => 'fidelizacoes', 'id' => $fidelizacao->id])
                @endcomponent
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-sm table-striped table-hover">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <td>{{ $fidelizacao->id }}</td>
                    </tr>
                    <tr>
                        <th>Categoria</th>
                        <td>{{ $fidelizacao->categoria->nome }}</td>
                    </tr>
                    <tr>
                        <th>Quantidade</th>
                        <td>{{ $fidelizacao->valor_receber  ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Regiao de Interesse</th>
                        <td>{{$fidelizacao->regiao_interesse->nome  ?? ''}}</td>
                    </tr>
                    <tr>
                        <th>Criado em</th>
                        <td>{{ $fidelizacao->criadoEm }}</td>
                    </tr>
                    <tr>
                        <th>Modifiado em</th>
                        <td>{{ $fidelizacao->modificadoEm }}</td>
                    </tr>
                    <tr>
                        <th>Criado por</th>
                        <td>{{ $fidelizacao->criadoPor }}</td>
                    </tr>
                    <tr>
                        <th>Modificado por</th>
                        <td>{{ $fidelizacao->modificadoPor }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
