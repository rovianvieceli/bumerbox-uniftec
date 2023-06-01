@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'show', 'resource' => 'usuarios', 'id' => $usuario->id])
                @endcomponent
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-sm table-striped table-hover">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <td>{{ $usuario->id }}</td>
                    </tr>
                    <tr>
                        <th>Nome</th>
                        <td>{{ $usuario->nome }}</td>
                    </tr>
                    <tr>
                        <th>Data de nascimento</th>
                        <td>{{ $usuario->dataNascimentoBr }}</td>
                    </tr>
                    <tr>
                        <th>CPF/CNPJ</th>
                        <td>{{ $usuario->isCpfOrCnpj }}</td>
                    </tr>
                    <tr>
                        <th>Fidelizado</th>
                        <td>{{ $usuario->isFidelizado }}</td>
                    </tr>
                    <tr>
                        <th>Criado em</th>
                        <td>{{ $usuario->criadoEm }}</td>
                    </tr>
                    <tr>
                        <th>Modifiado em</th>
                        <td>{{ $usuario->modificadoEm }}</td>
                    </tr>
                    <tr>
                        <th>Criado por</th>
                        <td>{{ $usuario->criadoPor }}</td>
                    </tr>
                    <tr>
                        <th>Modificado por</th>
                        <td>{{ $usuario->modificadoPor }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
