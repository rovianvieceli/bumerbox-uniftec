<?php

namespace App\Http\Requests\RegiaoInteresse;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegiaoInteressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|min:5',
            'nome_cidade' => 'required|min:5',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute deve possuir pelo menos :min carateres',
        ];
    }
}
