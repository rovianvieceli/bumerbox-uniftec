<?php

namespace App\Models;

use App\Traits\AuditionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Atualizacao extends Model
{
    use SoftDeletes, AuditionTrait;

    protected $primaryKey = 'id';
    protected $table = 'atualizacoes';
    protected $fillable = ['tipo_perfil_codigo', 'descricao'];

    public function tipoPerfil(): HasMany
    {
        return $this->hasMany(TipoPerfil::class, 'codigo', 'tipo_perfil_codigo');
    }
}
