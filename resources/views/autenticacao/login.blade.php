@extends('layout.base')

@section('conteudo')
    <div class="row">
        <div class="col-md-4 m-auto">
            <h2 class="p-4 text-center">Login</h2>
            <form method="post" action="{{ route('autenticar') }}">
                @csrf
                <figure>
                    <img src="{{ asset('img/Group 14.png') }}" id="cadeado" class="img-fluid" alt="cadeado">
                </figure>
                <div>
                    <label class="visually-hidden" for="cpfcnpj">CPF/CNPJ</label>
                    <input type="text" id="cpfcnpj" name="cpfcnpj" data-type="cpfcnpj" placeholder="CPF/CNPJ"><br><br>
                </div>
                <div>
                    <label class="visually-hidden" for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Senha">
                    <input type="checkbox" onclick="togglePasswordLogin()">Mostrar a senha<br><br>
                </div>
                @component('componentes.avisos.avisos', ['errors' => $errors, 'textcolor' => 'danger']) @endcomponent
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Entrar</button>
                </div>
                <div class="d-flex justify-content-center mt-1">
                    <a class="btn btn-success" href="{{ route('registro.create') }}">Registrar-se</a>
                </div>
            </form>
        </div>
    </div>
@endsection
