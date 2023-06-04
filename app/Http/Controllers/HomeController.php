<?php

namespace App\Http\Controllers;

use App\Models\Atualizacao;
use App\Traits\GitHubTrait;

class HomeController extends Controller
{
    use GitHubTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $atualizacoes = Atualizacao::paginate(8);
        $closePullRequests = $this->getClosePullRequests();

        return view('home.index')
            ->withAtualizacoes($atualizacoes)
            ->withClosePullRequests($closePullRequests);
    }
}
