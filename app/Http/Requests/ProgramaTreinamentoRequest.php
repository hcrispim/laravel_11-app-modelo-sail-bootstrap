<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramaTreinamentoRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'id_programa_treinamento' => 'required|integer',
            'id_usuario' => 'required|integer',
            'nome_programa' => 'required|string',
            'dt_inicio' => 'nullable|date_format:Y-m-d',
            'dt_final' => 'nullable|date_format:Y-m-d',
        ];
    }

    public function authorize(): bool
    {
    //    dd('entrou no ProgramaTreinamentoRequest');
        return true;
    }

    protected function prepareForValidation()
    {

        $this->merge([
            'dt_inicio' => $this->formatarData($this->dt_inicio),
            'dt_final' => $this->formatarData($this->dt_final),
         ]);
      //  dump($this->all()); // Exibe todos os dados da requisição
     //   dd($this->all()); // Exibe o valor do campo 'nome_programa' e interrompe a execução
    }
    private function formatarData($data)
    {
        return $data ?: null;
    }
}
