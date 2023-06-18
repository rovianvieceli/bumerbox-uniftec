@extends('layout.base')

@section('conteudo')
        <form >
          @csrf
          <div  class="d-flex justify-content-center mt-3">
            <span style="width:190;" data-href="/export-csv-clientes" id="export" class="btn btn-success btn-sm" onclick ="exportTasks (event.target);">Clientes</span>
          </div>
          <div class="d-flex justify-content-center mt-3">
            <span style="width:190;" data-href="/export-csv-fornecedores" id="export" class="btn btn-success btn-sm" onclick ="exportTasks (event.target);">Fornecedores</span>
          </div>
          <div class="d-flex justify-content-center mt-3">
            <span style="width:190;" data-href="/export-csv-categorias" id="export" class="btn btn-success btn-sm" onclick ="exportTasks (event.target);">Categorias</span>
          </div>
          <div class="d-flex justify-content-center mt-3">
            <span style="width:190;" data-href="/export-csv-regioes" id="export" class="btn btn-success btn-sm" onclick ="exportTasks (event.target);">Regiões de Interesse</span>
          </div>
          <div class="d-flex justify-content-center mt-3">
            <span style="width:190;" data-href="/export-csv-fidelizacoes" id="export" class="btn btn-success btn-sm" onclick ="exportTasks (event.target);">Fidelizações</span>
          </div>
          <div class="d-flex justify-content-center mt-3">
            <span style="width:190;" data-href="/export-csv-usuarios" id="export" class="btn btn-success btn-sm" onclick ="exportTasks (event.target);">Usuários</span>
          </div>
        </form>
@endsection
<script>
   function exportTasks(_this) {
      let _url = $(_this).data('href');
      window.location.href = _url;
   }
</script>

