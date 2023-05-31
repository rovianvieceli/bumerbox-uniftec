<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use stdClass;

class EnderecoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getEnderecoByCep(Request $request){


        //dd("REQUEST", $request);
        $cep = Str::replace("/[^0-9]/", "", $request->cep);
        $url = "http://viacep.com.br/ws/$cep/xml/";
        $dados = simplexml_load_file($url);

        $endereco = new stdClass();
        $endereco->erro = false;
        $endereco->logradouro = (string)$dados->logradouro;
        $endereco->bairro = (string)$dados->bairro;
        $endereco->uf = (string)$dados->uf;
        $endereco->cidade = (string)$dados->localidade;
        $endereco->cep = (string)$dados->cep;
        if (empty($endereco->logradouro)) {
          $endereco->erro = true;
        }
      //  dd("ENDERECO:", $endereco->logradouro);
        return new JsonResponse(['dados' => $endereco]);
      }

}
