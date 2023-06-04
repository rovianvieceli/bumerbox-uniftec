<?php

namespace Database\Seeders;

use App\Models\Perfil;
use Exception;
use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
    private static array $perfil = [
        ['usuario_id' => 1, 'tipo_perfil_codigo' => 'SYS'],
        ['usuario_id' => 2, 'tipo_perfil_codigo' => 'ADM'],
    ];

    private function create($dados): PerfilSeeder
    {
        $perfilModel = Perfil::where('usuario_id', $dados['usuario_id'])->first();
        if (!$perfilModel) {
            $perfilModel = new Perfil();
        }

        try {
            $perfilModel->fill($dados)->save();
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
        foreach (self::$perfil as $tipoPerfil) {
            $this->create($tipoPerfil);
        }
    }
}
