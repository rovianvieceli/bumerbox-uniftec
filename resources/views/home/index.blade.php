@extends('layout.base')

@section('conteudo')
    <div class="row m-auto mb-5">
        <div class="col-9">
            <h6><strong>Últimas Atualizações</strong></h6>
            @if (!count($atualizacoes))
                <p>Assim que houver novidades irão ser listadas aqui... =D</p>
            @else
                <div class="rounded shadow-sm bg-body list-group">
                    @foreach($atualizacoes as $atualizacao)
                        <div class="d-flex border-bottom list-group-item-action">
                            <p class="small p-2 m-0">
                                <strong class="d-block text-gray-dark pb-2">
                                    {{ '@'. $atualizacao->tipoPerfil->first()->nome }}
                                </strong>
                                {{ $atualizacao->descricao }}
                            </p>
                        </div>

                    @endforeach
                </div>
            @endif
        </div>
        <div class="col-3">
            <h6><strong>Últimos commits</strong></h6>
            <div class="list-group">
                @foreach($closePullRequests as $pullRequest)
                    <div class="list-group-item list-group-item-action">
                        <div class="d-grid justify-content-between">
                            <strong
                                class="small text-wrap">Sha: {{ substr($pullRequest->merge_commit_sha, 0, 18) }}</strong>
                            <small>{{ $pullRequest->title }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
