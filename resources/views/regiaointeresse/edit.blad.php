@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'edit','resource' => 'regiaointeresse','id' => $regiaointeresse->id])
                @endcomponent
            </div>

            @component('componentes.avisos.avisos', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent

            <form action="{{ route('regiaointeresse.update', $regiaointeresse->id) }}" method="post">
                @csrf
                @method('put')
                <div>
                    <label for="regiao" class="visually-hidden">Regiao</label>
                    <input type="text" name="regiao" id="regiao" value="{{ $regiaointeresse->nome }}" placeholder="Regiao"/>
                </div>

                <div>
                    <label for="nomecidade" class="visually-hidden">Cidade</label>
                    <input type="text" name="nomecidade" id="nomecidade" value="{{ $regiaointeresse->enderecos->first()->nomecidade ?? '' }}" placeholder="Cidade"/>
                </div>            

                <div class="d-flex justify-content-center my-3">
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
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
                
                //alert("CEP invalido");
                //$("#cep").attr("value", "");
               // $("#endereco").attr("value", "");
                return;
            }

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

