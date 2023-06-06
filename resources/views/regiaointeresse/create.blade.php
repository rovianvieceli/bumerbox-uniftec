@extends('layout.base')

@section('conteudo')
    @component('componentes.formulario.cadastro', ['acao' => 'create', 'recurso' => 'fornecedores', 'errors' => $errors])
        <form action="{{ route('regiaointeresse.store') }}" method="post">
            @csrf

            <div>
                <label for="regiao" class="visually-hidden">Regiao</label>
                <input type="text" name="regiao" id="regiao" value="{{ old('regiao') }}"
                       placeholder="Regiao"/>
            </div>

            <div>
                <label for="nomecidade" class="visually-hidden">Cidade</label>
                <input type="text" name="nomecidade" id="nomecidade" value="{{ old('nomecidade') }}" placeholder="Cidade"/>
            </div>            

            <div class="d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
    @endcomponent
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script>

$(function(){
    
    cidade.addEventListener('keyup', () => {
        
      var cidade = $("#cidade");
      if (cidade.val().length < 9) {
        return;
      }

      $.ajax({

        type:'POST',
        url:"{{ route('busca-dados-cidade') }}",
        dataType: 'JSON',
        data: {
            "cidade": cidade.val(),
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(response){
        
            var dados = response.dados;
            if (response.dados.erro) {
                
               // alert("cidade invalido");
                $("#cidade").attr("value", "");
                $("#endereco").attr("value", "");
                return;
            }
            //var endereco = dados.logradouro + 
            //", Bairro: " + dados.bairro + 
            //", Cidade: " + dados.cidade +
            //", UF: " + dados.uf + 
            //", cidade: " + dados.cidade;

            $("#cidade").attr("value", dados.cidade);
            $("#endereco").attr("value", dados.logradouro);
            $("#bairro").attr("value", dados.bairro);
            $("#nomecidade").attr("value", dados.cidade);
            $("#nomeestado").attr("value", dados.uf);
        }
        });

   });


});

</script>
