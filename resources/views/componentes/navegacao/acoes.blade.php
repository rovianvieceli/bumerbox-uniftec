@if(!isset($acao) && isset($id))
    <form method="post" action="{{ route("$resource.destroy", $id) }}">
        @csrf
        @method('delete')
        <div class="justify-content-center">
            <a class="btn btn-info btn-sm" href="{{ route("$resource.show", $id) }}">Ver</a>
            <a class="btn btn-warning btn-sm" href="{{ route("$resource.edit", $id) }}">Editar</a>
            <button class="btn btn-danger btn-sm">Remover</button>
        </div>
    </form>
@else
    @if($acao === 'create')
        <a type="button" class="btn btn-sm btn-success" href="{{ route("$resource.index") }}">Listar</a>
    @elseif($acao === 'index')
        <div class="justify-content-center">
            <a type="button" class="btn btn-sm btn-success" href="{{ route("$resource.create") }}">Novo</a>
        </div>
    @elseif($acao === 'edit')
        <form method="post" action="{{ route("$resource.destroy", $id) }}">
            @csrf
            @method('delete')
            <div class="justify-content-center">
                <a type="button" class="btn btn-sm btn-success" href="{{ route("$resource.index") }}">Listar</a>
                <button class="btn btn-danger btn-sm">Remover</button>
            </div>
        </form>
    @elseif($acao === 'show')
        <form method="post" action="{{ route("$resource.destroy", $id) }}">
            @csrf
            @method('delete')
            <div class="justify-content-center">
                <a type="button" class="btn btn-sm btn-success" href="{{ route("$resource.index") }}">Listar</a>
                <a type="button" class="btn btn-sm btn-warning" href="{{ route("$resource.edit", $id) }}">Editar</a>
                <button class="btn btn-danger btn-sm">Remover</button>
            </div>
        </form>
    @endif
@endif
