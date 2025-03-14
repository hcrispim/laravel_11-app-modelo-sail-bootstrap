<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class SessaoTreinamentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_programa_treinamento' => 'required|integer',
            'dt_sessao_planejada' => 'nullable|date_format:Y-m-d',
            'tempo_duracao_planejada' => 'nullable|date_format:H:i',
            'dt_sessao_executada' => 'nullable|date_format:Y-m-d',
            'tempo_duracao_executada' => 'nullable|date_format:H:i',
        ];
    }
    protected function prepareForValidation()
    {

        $this->merge([
            'dt_sessao_planejada' => $this->formatarData($this->dt_sessao_planejada),
            'dt_sessao_executada' => $this->formatarData($this->dt_sessao_executada),
            'tempo_duracao_planejada' => $this->formatarHora($this->tempo_duracao_planejada),
            'tempo_duracao_executada' => $this->formatarHora($this->tempo_duracao_executada),
        ]);
    }

    private function formatarData($data)
    {
        return $data ?: null;
    }
    private function formatarHora($hora)
    {
        if (!$hora) {
            return null;
        }

        // Verifica se a hora está no formato H:i
        $horaFormatada = \DateTime::createFromFormat('H:i', $hora);
        return $horaFormatada && $horaFormatada->format('H:i') === $hora ? $hora : null;
    }
}
