<?php

namespace App\Http\Requests\Fornecedor;

use App\Rules\CpfOuCnpj;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use App\Rules\ValidaSenha;

class StoreFornecedorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'cpfcnpj' => Str::replace(['.', '-', '/'], '', $this->get('cpfcnpj')),
            'cep' => Str::replace(['.', '-', '/'], '', $this->get('cep')),
            'telefone' => Str::replace(['(', ')', ' '], '', $this->get('telefone')),
            'rua' => $this->get('endereco'),
            'numero' => $this->get('numero'),
            'complemento' => $this->get('complemento'),
            'bairro' => $this->get('bairro'),
            'nomecidade' => $this->get('nomecidade'),
            'nomeestado' => $this->get('nomeestado'),
            'nome' => $this->get('nomefantasia'),
        ]);
    }

    public function rules(): array
    {
        return [
            'nomefantasia' => 'required|min:3|max:255',
            'cpfcnpj' => [
                'required',
                'unique:usuarios,cpfcnpj,NULL,id',
                new CpfOuCnpj
            ],
            'cep' => 'required|digits:8',
            'rua' => 'required|min:3|max:255',
            'telefone' => 'nullable|min:10|max:11',
            'senha' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ],
            'confirmar_senha' => [
                'required',
                new ValidaSenha
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'cpfcnpj' => 'O campo :attribute não é um :attribute válido',
            'cpfcnpj.unique' => 'O campo :attribute já possuí um registro',
            'required' => 'O campo :attribute deve ser preenchido',
            'min' => 'O campo :attribute deve possuir pelo menos :min carateres',
            'max' => 'O campo :attribute deve possuir no máximo :max carateres',
            'digits' => 'O campo :attribute deve possuir :digits dígitos',
            'senha' => [
                "O campo :attribute deve conter pelo menos uma letra maiúscula e uma minúscula",
                "O campo :attribute deve conter pelo menos um símbolo.",
                "O campo :attribute deve conter pelo menos um número.",
                "O campo :attribute possuí uma :attribute fraca. Por favor, forneça uma :attribute mais forte."
            ],
            'confirmar_senha' => 'O campo :attribute não é igual a senha informada.'
        ];
    }
}
