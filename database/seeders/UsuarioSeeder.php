<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Exception;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    private static array $administradores = [
        [
            'nome' => 'Sistema',
            'cpfcnpj' => '22872788000',
            'visivel' => false
        ],
        [
            'nome' => 'Administrador',
            'senha' => '@dm1n1str@d0r',
            'cpfcnpj' => '75765555055',
            'visivel' => false
        ],
    ];

    private function create($dados): UsuarioSeeder
    {
        $usuarioModel = Usuario::where('cpfcnpj', $dados['cpfcnpj'])->first();
        if (!$usuarioModel) {
            $usuarioModel = new Usuario();
        }

        try {
            $usuarioModel->fill($dados)->save();
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
        foreach (self::$administradores as $administrador) {
            $this->create($administrador);
        }
    }
}
