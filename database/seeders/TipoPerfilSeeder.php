<?php

namespace Database\Seeders;

use App\Models\TipoPerfil;
use Exception;
use Illuminate\Database\Seeder;

class TipoPerfilSeeder extends Seeder
{
    private static array $tipoPerfil = [
        ['nome' => 'Sistema', 'codigo' => 'SYS', 'visivel' => false],
        ['nome' => 'Administrador', 'codigo' => 'ADM', 'visivel' => false],
        ['nome' => 'Usuário', 'codigo' => 'USR'],
        ['nome' => 'Cliente', 'codigo' => 'CLT'],
        ['nome' => 'Fornecedor', 'codigo' => 'FRN']
    ];

    private function create($dados): TipoPerfilSeeder
    {
        $estadoModel = TipoPerfil::where('codigo', $dados['codigo'])->first();
        if (!$estadoModel) {
            $estadoModel = new TipoPerfil();
        }
        try {
            $estadoModel->fill($dados)->save();
        } catch (Exception $e) {
            $this->command->error($e->getMessage());
            $this->command->error(sprintf('Erro ao criar "%s" para "%s"', $dados['nome'], get_class($this)));
        }
        return $this;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::$tipoPerfil as $tipoPerfil) {
            $this->create($tipoPerfil);
        }
    }
}
