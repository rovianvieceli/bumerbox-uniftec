<?php

namespace App\Http\Requests\Fidelizacao;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFidelizacaoRequest extends FormRequest
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
