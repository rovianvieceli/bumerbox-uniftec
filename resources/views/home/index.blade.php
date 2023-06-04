@extends('layout.base')

@section('conteudo')
    <div class="row m-auto mb-5">
        <div class="col-9">
            <h6><strong>Últimas Atualizações</strong></h6>
            <div class="rounded shadow-sm bg-body list-group">
                @foreach($atualizacoes as $atualizacao)
                    <div class="d-flex border-bottom list-group-item-action">
                        <p class="small p-2 m-0">
                            <strong class="d-block text-gray-dark pb-2">@sistema</strong>
                            Na nossa última atualização, criamos o cadastro dos Fornecedores.
                            Agora você pode incluir qualquer fornecedor para a parceria entre Bumerbox e seu
                            estabelecimento. =D
                        </p>
                    </div>
                @endforeach
                <div class="d-grid justify-content-end">
                    <a href="{{ asset('/home') }}" class="btn btn-primary m-2">Todas as atualizações</a>
                </div>
            </div>
        </div>
        <div class="col-3">
            <h6><strong>Últimos commits</strong></h6>
            <div class="list-group">
                @foreach($closePullRequests as $pullRequest)
                    <div class="list-group-item list-group-item-action">
                        <div class="d-grid justify-content-between">
                            <strong class="small text-wrap">Sha: {{ substr($pullRequest->merge_commit_sha, 0, 18) }}</strong>
                            <small>{{ $pullRequest->title }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

{{--<span class="badge bg-primary rounded-pill">14</span>--}}
