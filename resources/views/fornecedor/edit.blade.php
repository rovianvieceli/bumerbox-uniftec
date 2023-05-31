@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-5 m-auto">
            <div class="d-flex justify-content-end">
                @component('componentes.navegacao.acoes', ['acao' => 'edit','resource' => 'fornecedores','id' => $fornecedor->id])
                @endcomponent
            </div>

            @component('componentes.avisos.avisos', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent

            <form action="{{ route('fornecedores.update', $fornecedor->id) }}" method="post">
                @csrf
                @method('put')
                <div>
                    <label for="nomefantasia" class="visually-hidden">Nome Fantasia</label>
                    <input type="text" name="nomefantasia" id="nomefantasia" value="{{ $fornecedor->nome }}" placeholder="Nome Fantasia"/>
                </div>

                <div>
                    <label for="cpfcnpj" class="visually-hidden">CNPJ</label>
                    <input type="text" name="cpfcnpj" id="cpfcnpj" data-type="cpfcnpj" placeholder="CPF/CNPJ"
                           value="{{ $fornecedor->isCpfOrCnpj }}">
                </div>
                <div>
                    <label for="cep" class="visually-hidden">CEP</label>
                    <input type="text" name="cep" id="cep" value="{{ $fornecedor->enderecos->first()->isCep ?? '' }}"
                           data-type="cep" placeholder="CEP"/>
                </div>

                <div>
                    <label for="endereco" class="visually-hidden">Endereço</label>
                    <input type="text" name="endereco" id="endereco" value="{{ $fornecedor->enderecos->first()->rua ?? '' }}"
                           placeholder="Endereço"/>
                </div>

                <div>
                    <label for="numero" class="visually-hidden">Número</label>
                    <input type="text" name="numero" id="numero" value="{{ $fornecedor->enderecos->first()->numero ?? '' }}" placeholder="Número"/>
                 </div>

                 <div>
                    <label for="complemento" class="visually-hidden">Complemento</label>
                    <input type="text" name="complemento" id="complemento" value="{{ $fornecedor->enderecos->first()->complemento ?? '' }}" placeholder="Complemento"/>
                </div>

                <div>
                    <label for="bairro" class="visually-hidden">Bairro</label>
                    <input type="text" name="bairro" id="bairro" value="{{ $fornecedor->enderecos->first()->bairro ?? '' }}" placeholder="Bairro"/>
                </div>

                <div>
                    <label for="nomecidade" class="visually-hidden">Cidade</label>
                    <input type="text" name="nomecidade" id="nomecidade" value="{{ $fornecedor->enderecos->first()->nomecidade ?? '' }}" placeholder="Cidade"/>
                </div>            

                <div>
                    <label for="nomeestado" class="visually-hidden">Estado</label>
                    <input type="text" name="nomeestado" id="nomeestado" value="{{ $fornecedor->enderecos->first()->nomeestado ?? '' }}" placeholder="Estado"/>
                </div>  

                <div>
                    <label for="telefone" class="visually-hidden">Telefone</label>
                    <input type="text" name="telefone" id="telefone" data-type="telefone" placeholder="Telefone"
                           value="{{ $fornecedor->telefones->first()->isNumero ?? '' }}"/>
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

