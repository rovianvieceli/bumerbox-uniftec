<?php

namespace App\Http\Controllers;

use App\Http\Requests\Fidelizacao\StoreFidelizacaoRequest;
use App\Http\Requests\Fidelizacao\UpdateFidelizacaoRequest;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Categoria;
use App\Models\Fidelizacao;
use App\Models\RegiaoInteresse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;
use Carbon\Carbon;

class RelatoriosController extends Controller
{
   
    public $separador = ";";
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('relatorios.index')
            ->withTitulo('Relatórios');
    }

    public function exportCSVUsuarios()
    {

       $fileName = 'relatorioUsuarios.csv';
       $dados = Usuario::select('usuarios.*')
                 ->leftJoin('perfis', 'usuarios.id', '=', 'perfis.usuario_id')
                 ->orWhere('tipo_perfil_codigo', '=', 'USR')
                 ->where('visivel', true)
                 ->orderBy("usuarios.nome")
                 ->get();
       
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
            $columns = [
                "id",
                "Nome",
                "Data de Nascimento",
                "CPF/CNPJ",
                "Fidelizado"
            ];
    
           
            $callback = function() use ($dados, $columns) {

                $file = fopen('php://output', 'w');
                fputcsv($file, $columns, $this->separador);

                foreach ($dados as $dado) {
                    $row['id']  = $dado->id;
                    $row['Nome']    = $dado->nome;
                    $row['Data de Nascimento']    = Carbon::parse($dado->data_nascimento)->format('d/m/Y');
                    $row['CPF/CNPJ']  = $dado->cpfcnpj;
                    $row['Fidelizado']  = $dado->fidelizado ? "Sim" : "Não";
    
                    fputcsv($file, array($row['id'], $row['Nome'], $row['Data de Nascimento'], $row['CPF/CNPJ'], $row['Fidelizado']), $this->separador);
                }
    
                fclose($file);
            };
    
            return response()->stream($callback, 200, $headers);
        }
    public function exportCSVFidelizacoes()
    {

       $fileName = 'relatorioFidelizacoes.csv';
       $dados = Fidelizacao::select(["fidelizacoes.*", 
                                      "categorias.nome", 
                                      "regioes_interesse.nome as regiao"])
               ->join('categorias', 'categorias.id', '=', 'fidelizacoes.categoria_id')
               ->Join('regioes_interesse', 'regioes_interesse.id', '=', 'fidelizacoes.regioes_interesse_id')
               ->where('usuario_id', '=', auth()->user()->id)
               ->orderBy("fidelizacoes.id")
               ->get();
       
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
            $columns = [
                "id",
                "Categoria",
                "Região de Interesse",
                "Valor Receber"
            ];
           
            $callback = function() use ($dados, $columns) {

                $file = fopen('php://output', 'w');
                fputcsv($file, $columns, $this->separador);

                foreach ($dados as $dado) {
                    $row['id']  = $dado->id;
                    $row['Categoria']    = $dado->nome;
                    $row['Região de Interesse']    = $dado->regiao;
                    $row['Valor Receber']  = $dado->valor_receber;
    
                    fputcsv($file, array($row['id'], $row['Categoria'], $row['Região de Interesse'], $row['Valor Receber']   ), $this->separador);
                }

                fclose($file);
            };
    
            return response()->stream($callback, 200, $headers);
        }

    public function exportCSVRegioes()
    {

       $fileName = 'relatorioRegioes.csv';
       $dados = RegiaoInteresse::all()->sortBy("nome");
       
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
            $columns = [
                "id",
                "Nome",
                "Cidade"
            ];
           
            $callback = function() use ($dados, $columns) {

                $file = fopen('php://output', 'w');
                fputcsv($file, $columns, $this->separador);

                foreach ($dados as $dado) {
                    $row['id']  = $dado->id;
                    $row['Nome']    = $dado->nome;
                    $row['Cidade']  = $dado->nome_cidade;
    
                    fputcsv($file, array($row['id'], $row['Nome'], $row['Cidade']), $this->separador);
                }

                fclose($file);
            };
    
            return response()->stream($callback, 200, $headers);
        }

    public function exportCSVCategorias()
    {

       $fileName = 'relatorioCategorias.csv';
       $dados = Categoria::all()->sortBy("nome");
       
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
            $columns = [
                "id",
                "Nome",
                "Valor"
            ];
           
            $callback = function() use ($dados, $columns) {

                $file = fopen('php://output', 'w');
                fputcsv($file, $columns, $this->separador);

                foreach ($dados as $dado) {
                    $row['id']  = $dado->id;
                    $row['Nome']    = $dado->nome;
                    $row['Valor']  = $dado->valor_unitario;
    
                    fputcsv($file, array($row['id'], $row['Nome'], $row['Valor']), $this->separador);
                }
    
                fclose($file);
            };
    
            return response()->stream($callback, 200, $headers);
        }

    
    public function exportCSVFornecedores()
    {
       $fileName = 'relatorioFornecedores.csv';
       $dados = Usuario::select(['usuarios.*'])
       ->leftJoin('perfis', 'usuarios.id', '=', 'perfis.usuario_id')
       ->orWhere('tipo_perfil_codigo', '=', 'FRN')
       ->where('visivel', true)
       ->orderBy("usuarios.nome")
       ->get();
       
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
            $columns = [
                "id",
                "Nome",
                "CNPJ",
                "Fidelizado"
            ];
    
            $callback = function() use ($dados, $columns) {

                $file = fopen('php://output', 'w');
                fputcsv($file, $columns, $this->separador);

                foreach ($dados as $dado) {
                    $row['id']  = $dado->id;
                    $row['Nome']    = $dado->nome;
                    $row['CNPJ']  = $dado->cpfcnpj;
                    $row['Fidelizado']  = $dado->fidelizado ? "Sim" : "Não";
    
                    fputcsv($file, array($row['id'], $row['Nome'], $row['CNPJ'], $row['Fidelizado']), $this->separador);
                }
    
                fclose($file);
            };
    
            return response()->stream($callback, 200, $headers);
        }


   

    public function exportCSVClientes()
    {
       $fileName = 'relatorioClientes.csv';
       $dados = Usuario::select(['usuarios.*'])
       ->leftJoin('perfis', 'usuarios.id', '=', 'perfis.usuario_id')
       ->orWhere('tipo_perfil_codigo', '=', 'CLT')
       ->where('visivel', true)
       ->orderBy("usuarios.nome")
       ->get();
       
            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );
    
            $columns = [
                "id",
                "Nome",
                "Data de Nascimento",
                "CPF/CNPJ",
                "Fidelizado"
            ];
    
           
            $callback = function() use ($dados, $columns) {

                $file = fopen('php://output', 'w');
                fputcsv($file, $columns, $this->separador);

                foreach ($dados as $dado) {
                    $row['id']  = $dado->id;
                    $row['Nome']    = $dado->nome;
                    $row['Data de Nascimento']    = Carbon::parse($dado->data_nascimento)->format('d/m/Y');
                    $row['CPF/CNPJ']  = $dado->cpfcnpj;
                    $row['Fidelizado']  = $dado->fidelizado ? "Sim" : "Não";
    
                    fputcsv($file, array($row['id'], $row['Nome'], $row['Data de Nascimento'], $row['CPF/CNPJ'], $row['Fidelizado']), $this->separador);
                }
    
                fclose($file);
            };
    
            return response()->stream($callback, 200, $headers);
        }

}
