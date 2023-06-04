<?php

namespace App\Traits;

use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

trait CategoriaTrait
{
    protected function getCriadoEmAttribute(): string
    {
        return $this->created_at ? Carbon::parse($this->created_at)->format('d/m/Y H:i:s') : '';
    }

    protected function getModificadoEmAttribute(): string
    {
        return $this->updated_at ? Carbon::parse($this->updated_at)->format('d/m/Y H:i:s') : '';
    }

    protected function getCriadoPorAttribute(): string
    {
        return $this->created_by ? Usuario::find($this->created_by)->nome : '';
    }

    protected function getModificadoPorAttribute(): string
    {
        return $this->updated_by ? Usuario::find($this->updated_by)->nome : '';
    }
}
