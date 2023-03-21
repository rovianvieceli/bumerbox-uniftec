<?php

namespace App\Models;

use App\Traits\AuditionUsers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desconto extends Model
{
    use SoftDeletes, AuditionUsers;

    protected $primaryKey = 'id';
    protected $table = 'descontos';
    protected $fillable = ['fidelizacao_id', 'quantidade', 'valor'];
}
