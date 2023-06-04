<?php

namespace App\Traits;

use App\Models\Usuario;
use Carbon\Carbon;

trait AtualizacaoTrait
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

    protected function getMensagemAttribute(): string
    {
        return strlen($this->descricao) > 50 ? substr($this->descricao, 0, 80) . '...' : $this->descricao;
    }
}
