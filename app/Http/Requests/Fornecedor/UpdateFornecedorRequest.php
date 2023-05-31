<?php

namespace App\Http\Requests\Fornecedor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateFornecedorRequest extends FormRequest
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
            'telefone' => Str::replace(['(', ')', ' ', '-'], '', $this->get('telefone')),
            'rua' => $this->get('endereco'),
            'complemento' => $this->get('complemento'),
            'bairro' => $this->get('bairro'),
            'nomecidade' => $this->get('nomecidade'),
            'nomeestado' => $this->get('nomeestado'),
            'numero' => $this->get('numero'),
            'nome' => $this->get('nomefantasia'),
            'senha' => Str::random(8),
        ]);
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|min:3|max:255',
            'cpfcnpj' => 'required|min:11|max:18|unique:usuarios,cpfcnpj,' . $this->fornecedore->id . ',id',
            'rua' => 'required|min:3|max:255',
            'data_nascimento' => 'nullable|date_format:Y-m-d',
            'telefone' => 'nullable|min:10|max:11',
            'cep' => 'required|digits:8',
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
        ];
    }
}
