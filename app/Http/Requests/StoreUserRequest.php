<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Str;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'cpfcnpj' => Str::replace(['.', '-', '/'], '', $this->get('cpfcnpj')),
            'visivel' => $this->has('visivel'),
            'fidelizado' => $this->has('fidelizado'),
        ]);
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|min:3|max:255',
            'cpfcnpj' => 'required|min:11|max:14|unique:usuarios,cpfcnpj,NULL,id',
            'data_nascimento' => 'nullable|date_format:Y-m-d',
            'confirmar_senha' => 'required|same:senha',
            'senha' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()->symbols()
                    ->uncompromised()
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'cpfcnpj.unique' => 'O campo :attribute já possuí um registro',
            'date_format' => 'O campo :attribute deve conter um valor válido',
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve possuir pelo menos :min carateres',
            'max' => 'O campo :attribute deve possuir no máximo :max carateres',
            'confirmar_senha' => 'O campo :attribute deve corresponder à senha.',
            'senha' => [
                'O campo :attribute deve conter pelo menos uma letra maiúscula e uma minúscula',
                "O campo :attribute deve conter pelo menos um símbolo.",
                "O campo :attribute deve conter pelo menos um número.",
            ],

        ];
    }
}
