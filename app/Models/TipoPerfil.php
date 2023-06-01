<?php

namespace App\Models;

use App\Traits\AuditionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoPerfil extends Model
{
    use SoftDeletes, AuditionTrait;

    protected $primaryKey = 'id';
    protected $table = 'tipos_perfil';
    protected $fillable = ['nome', 'codigo', 'visivel'];

    public function atualizacao(): BelongsTo
    {
        return $this->belongsTo(Atualizacao::class, 'codigo', 'tipo_perfil_codigo');
    }
}
