@extends('layout.base')

@section('conteudo')
    @component('componentes.formulario.cadastro', ['acao' => 'create', 'recurso' => 'fornecedores', 'errors' => $errors])
        <form action="{{ route('regiaointeresse.store') }}" method="post">
            @csrf

            <div>
                <label for="nomefantasia" class="visually-hidden">Nome Fantasia</label>
                <input type="text" name="nomefantasia" id="nomefantasia" value="{{ old('nomefantasia') }}"
                       placeholder="Nome Fantasia"/>
            </div>

            <div>
                <label for="cep" class="visually-hidden">CEP</label>
                <input type="text" name="cep" id="cep" value="{{ old('cep') }}" onkeyup="" data-type="cep" placeholder="CEP"/>
            </div>

            <div>
                <label for="endereco" class="visually-hidden">Endereço</label>
                <input type="text" name="endereco" id="endereco" value="{{ old('endereco') }}" placeholder="Endereço"/>
            </div>

            <div>
                <label for="numero" class="visually-hidden">Número</label>
                <input type="text" name="numero" id="numero" value="{{ old('numero') }}" placeholder="Número"/>
            </div>

            <div>
                <label for="complemento" class="visually-hidden">Complemento</label>
                <input type="text" name="complemento" id="complemento" value="{{ old('complemento') }}" placeholder="Complemento"/>
            </div>

            <div>
                <label for="bairro" class="visually-hidden">Bairro</label>
                <input type="text" name="bairro" id="bairro" value="{{ old('bairro') }}" placeholder="Bairro"/>
            </div>

            <div>
                <label for="nomecidade" class="visually-hidden">Cidade</label>
                <input type="text" name="nomecidade" id="nomecidade" value="{{ old('nomecidade') }}" placeholder="Cidade"/>
            </div>            

            <div>
                <label for="nomeestado" class="visually-hidden">Estado</label>
                <input type="text" name="nomeestado" id="nomeestado" value="{{ old('nomeestado') }}" placeholder="Estado"/>
            </div>            

            <div>
                <label for="telefone" class="visually-hidden">Telefone</label>
                <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}" data-type="telefone"
                       placeholder="Telefone"/>
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
    
    cep.addEventListener('keyup', () => {
        
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
                
               // alert("CEP invalido");
                $("#cep").attr("value", "");
                $("#endereco").attr("value", "");
                return;
            }
            //var endereco = dados.logradouro + 
            //", Bairro: " + dados.bairro + 
            //", Cidade: " + dados.cidade +
            //", UF: " + dados.uf + 
            //", CEP: " + dados.cep;

            $("#cep").attr("value", dados.cep);
            $("#endereco").attr("value", dados.logradouro);
            $("#bairro").attr("value", dados.bairro);
            $("#nomecidade").attr("value", dados.cidade);
            $("#nomeestado").attr("value", dados.uf);
        }
        });

   });


});

</script>
