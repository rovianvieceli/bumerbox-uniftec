<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
    <title>{{ config('app.name') }} - @yield('titulo', 'Gestão de Recicláveis')</title>
</head>
<body>
<header class="navbar sticky-top flex-md-nowrap p-0 shadow">
    @include('includes.topo')
</header>
<div class="container-fluid">
    <div class="row">
        @include('includes.menu')
        <main class="{{ Auth::check() ? 'col-md-10 ms-md-auto' : 'col-md-12' }}">
            @component('componentes.autenticacao.identificacao') @endcomponent
            @include('includes.titulopagina')
            @yield('conteudo')
            @component('componentes.avisos.alertas') @endcomponent
            @include('includes.rodape')
        </main>
    </div>
</div>
@include('includes.footer')
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script>

function buscaCep(){

    var cep = $("#cep");
      if (cep.val().length < 9) {
        return;
      }

      $.ajax({

        type:'POST',
        url:"{{ route('busca-dados-cep') }}",
        dataType: 'JSON',
        data: {
            "cep": cep.val(),
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(response){
        
            var dados = response.dados;
            if (response.dados.erro) {
                
                $("#endereco").attr("value", "");
                $("#bairro").attr("value","");
                $("#nomecidade").attr("value", "");
                $("#nomeestado").attr("value", "");
            }

            $("#cep").attr("value", dados.cep);
            $("#endereco").attr("value", dados.logradouro);
            $("#bairro").attr("value", dados.bairro);
            $("#nomecidade").attr("value", dados.cidade);
            $("#nomeestado").attr("value", dados.uf);
        }
        });
}
</script>