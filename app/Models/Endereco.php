<?php

namespace App\Models;

use App\Traits\AuditionTrait;
use App\Traits\EnderecoTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use SoftDeletes, AuditionTrait, EnderecoTrait;

    protected $primaryKey = 'id';
    protected $table = 'enderecos';
    protected $fillable = ['usuario_id', 
      'cidade_id', 
      'rua',
      'complemento',
      'bairro',
      'nomecidade',
      'nomeestado', 
      'cep', 
      'numero'];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }
}
