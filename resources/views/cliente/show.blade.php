@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'show', 'resource' => 'clientes', 'id' => $cliente->id])
                @endcomponent
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-sm table-striped table-hover">
                    <tbody>
                    <tr>
                        <th>#</th>
                        <td>{{ $cliente->id }}</td>
                    </tr>
                    <tr>
                        <th>Nome</th>
                        <td>{{ $cliente->nome }}</td>
                    </tr>
                    <tr>
                        <th>Data de nascimento</th>
                        <td>{{ $cliente->dataNascimentoBr }}</td>
                    </tr>
                    <tr>
                        <th>CPF/CNPJ</th>
                        <td>{{ $cliente->isCpfOrCnpj }}</td>
                    </tr>
                    <tr>
                        <th>CEP</th>
                        <td>{{ $cliente->enderecos->first()->isCep ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Endereço</th>
                        <td>{{ $cliente->enderecos->first()->rua ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Número</th>
                        <td>{{ $cliente->enderecos->first()->numero ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Complemento</th>
                        <td>{{ $cliente->enderecos->first()->complemento ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Bairro</th>
                        <td>{{ $cliente->enderecos->first()->bairro ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Cidade</th>
                        <td>{{ $cliente->enderecos->first()->nomecidade ?? '' }}</td>
                    </tr>  
                    <tr>   
                        <th>Estado</th>
                        <td>{{ $cliente->enderecos->first()->nomeestado ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Telefone</th>
                        <td>{{ $cliente->telefones->first()->isNumero ?? '' }}</td>
                    </tr>
                    <tr>
                        <th>Fidelizado</th>
                        <td>{{ $cliente->isFidelizado }}</td>
                    </tr>
                    <tr>
                        <th>Criado em</th>
                        <td>{{ $cliente->criadoEm }}</td>
                    </tr>
                    <tr>
                        <th>Modifiado em</th>
                        <td>{{ $cliente->modificadoEm }}</td>
                    </tr>
                    <tr>
                        <th>Criado por</th>
                        <td>{{ $cliente->criadoPor }}</td>
                    </tr>
                    <tr>
                        <th>Modificado por</th>
                        <td>{{ $cliente->modificadoPor }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
