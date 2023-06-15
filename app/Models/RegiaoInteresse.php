<?php

namespace App\Models;

use App\Traits\AuditionTrait;
use App\Traits\RegiaoInteresseTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegiaoInteresse extends Model
{
    use SoftDeletes, AuditionTrait, RegiaoInteresseTrait;

    protected $primaryKey = 'id';
    protected $table = 'regioes_interesse';
    protected $fillable = ['nome', 'nome_cidade'];

    public function fidelizacao(): HasMany
    {
        return $this->hasMany(Fidelizacao::class);
    }
}
