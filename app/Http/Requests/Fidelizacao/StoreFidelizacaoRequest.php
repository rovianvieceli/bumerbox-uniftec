<?php

namespace App\Http\Requests\Fidelizacao;

use Illuminate\Foundation\Http\FormRequest;

class StoreFidelizacaoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
