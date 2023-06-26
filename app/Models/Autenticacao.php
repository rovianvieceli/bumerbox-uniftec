<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Model;

class Autenticacao extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'usuarios';

    public function getAuthPassword()
    {
        return $this->senha;
    }
    public function perfil()
    {
        $perfil = Perfil::select('perfis.*')
        ->where('usuario_id', '=', auth()->user()->id)
        ->get();
        return $perfil;
    }
}
