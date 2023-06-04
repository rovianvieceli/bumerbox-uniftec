<?php

namespace App\Http\Requests\Atualizacao;

use Illuminate\Foundation\Http\FormRequest;

class StoreAtualizacaoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'tipo_perfil_codigo' => $this->get('autor'),
        ]);
    }

    public function rules(): array
    {
        return [
            'descricao' => 'required|min:5',
            'autor' => 'required|exists:tipos_perfil,codigo',
        ];
    }

    public function messages(): array
    {
        return [
            'autor' => 'O campo :attribute não é um :attribute válido',
            'min' => 'O campo :attribute deve possuir pelo menos :min carateres',
        ];
    }
}
