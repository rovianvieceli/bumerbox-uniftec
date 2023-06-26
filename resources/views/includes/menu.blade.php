@if(Auth::check())

    <nav class="col-md-2 d-md-block menu">
        <div class="position-sticky menu-lateral">
            <ul class="nav flex-column bg-green-lime">
                <h6 class="menu-opcao d-flex">Cadastros</h6>

@if (auth()->user()->perfil()[0]->tipo_perfil_codigo != "CLT") 
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
                </li>
 
    @if (auth()->user()->perfil()[0]->tipo_perfil_codigo != "FRN")                 
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('fornecedores.index') }}">Fornecedores</a>
                </li>
    @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a>
                </li>
                 
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('regiaointeresse.index') }}">Regiões de Interesse</a>
                </li>
               
@endif

@if (auth()->user()->perfil()[0]->tipo_perfil_codigo != "FRN")  
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('fidelizacoes.index') }}">Fidelização</a>
                </li>  
@endif
                <h6 class="menu-opcao d-flex">Extrair</h6>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('relatorios.index') }}" href="#">Relatórios</a>
                </li>

                <h6 class="menu-opcao d-flex">Configurações</h6>

@if (auth()->user()->perfil()[0]->tipo_perfil_codigo == "ADM" || 
     auth()->user()->perfil()[0]->tipo_perfil_codigo == "USR")
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.index') }}">Usuários</a>
                </li>
@endif                

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('minhaconta.edit', Auth::user()) }}">Minha Conta</a>
                </li>

@if (auth()->user()->perfil()[0]->tipo_perfil_codigo == "ADM" || 
     auth()->user()->perfil()[0]->tipo_perfil_codigo == "USR")                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('atualizacoes.index') }}">Atualizações</a>
                </li>
@endif                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Sair</a>
                </li>
            </ul>
        </div>
    </nav>
@endif
