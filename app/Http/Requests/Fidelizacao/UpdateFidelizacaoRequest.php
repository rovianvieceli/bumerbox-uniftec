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
            'categoria_id' => 'required',
            'valor_receber' => 'required|numeric|min:1',
            'regioes_interesse_id'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'categoria_id' =>[ 'required' => 'O campo Categoria é obrigatório',],
            'regioes_interesse_id' =>[ 'required' => 'O campo Região Interesse é obrigatório',],
            'valor_receber' =>[ 'required' => 'O campo Valor Receber é obrigatório',
                                'min' => 'O campo Valor Receber deve ser maior que zero',
                                'numeric' => 'O campo Valor Receber deve conter um valor válido',
                              ],
        ];
    }
}
