<form method="get" action="{{ route('fornecedores.index') }}" class="mt-1 p-2">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="nome" class="visually-hidden">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Nome"/>
        </div>

        <div class="col-md-3">
            <label for="cpf_cnpj" class="visually-hidden">CPF/CNPJ</label>
            <input type="text" name="cpfcnpj" id="nome" data-type="cpfcnpj" placeholder="CPF/CNPJ"/>
        </div>

        <div class="col-md-3">
            <label for="telefone" class="visually-hidden">Telefone</label>
            <input type="text" name="telefone" id="nome" data-type="telefone" placeholder="Telefone"/>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <label for="cep" class="visually-hidden">CEP</label>
            <input type="text" name="cep" id="nome" data-type="cep" placeholder="CEP"/>
        </div>

        <div class="col-md-8">
            <label for="endereco" class="visually-hidden">Endereço</label>
            <input type="text" name="endereco" id="nome" placeholder="Endereço"/>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-sm btn-success">Pesquisar</button>
    </div>
</form>

