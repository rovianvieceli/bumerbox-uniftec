<?php

namespace App\Http\Requests\Atualizacao;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAtualizacaoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'descricao' => 'required|min:5',
        ];
    }

    public function messages(): array
    {
        return [
            'min' => 'O campo :attribute deve possuir pelo menos :min carateres',
        ];
    }
}
