<?php

namespace App\Models;

use App\Traits\AuditionTrait;
use App\Traits\CategoriaTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes, AuditionTrait, CategoriaTrait;

    protected $primaryKey = 'id';
    protected $table = 'categorias';
    protected $fillable = ['nome', 'valor_unitario'];

    public function fidelizacao() : HasMany
    {
        return $this->hasMany(Fidelizacao::class);
    }
}
