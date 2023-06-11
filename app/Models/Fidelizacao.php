<?php

namespace App\Models;

use App\Traits\AuditionTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Fidelizacao extends Model
{
    use SoftDeletes, AuditionTrait;

    protected $primaryKey = 'id';
    protected $table = 'fidelizacoes';
    protected $fillable = ['categoria_id', 'usuario_id', 'valor_receber'];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
