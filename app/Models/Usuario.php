<?php

namespace App\Models;

use App\Traits\AuditionTrait;
use App\Traits\UsuarioTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes, AuditionTrait, UsuarioTrait;

    protected $primaryKey = 'id';
    protected $table = 'usuarios';
    protected $fillable = ['nome', 'data_nascimento', 'cpfcnpj', 'senha', 'fidelizado', 'visivel'];

    public function perfis(): HasMany
    {
        return $this->hasMany(Perfil::class);
    }

    public function enderecos(): HasMany
    {
        return $this->hasMany(Endereco::class);
    }

    public function telefones(): HasMany
    {
        return $this->hasMany(Telefone::class);
    }

    public function fidelizacao() : HasMany
    {
        return $this->hasMany(Fidelizacao::class);
    }
}
