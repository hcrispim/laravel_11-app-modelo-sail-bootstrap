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

    /**
     * Converte data do formato d/m/Y para Y-m-d (formato MySQL)
     */
    private function formatarData($data)
    {
        if (!$data) {
            return null;
        }

        // Remover espaços extras
        $data = trim($data);

        // Se a data já estiver no formato Y-m-d, não converter
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $data)) {
            return $data;
        }

        // Verifica se está no formato esperado d/m/Y e converte para Y-m-d
        try {
            return Carbon::createFromFormat('d/m/Y', $data)->format('Y-m-d');
        } catch (\Exception $e) {
            return null; // Retorna null caso a conversão falhe
        }
    }
    private function formatarHora($hora)
    {
        if (!$hora) {
            return null;
        }

        // Remover espaços extras
        $hora = trim($hora);

        // Verifica se a hora já está no formato correto H:i
        if (preg_match('/^\d{2}:\d{2}$/', $hora)) {
            return $hora;
        }

        // Se a hora estiver no formato H:i:s, converter para H:i
        try {
            return Carbon::createFromFormat('H:i:s', $hora)->format('H:i');
        } catch (\Exception $e) {
            return null; // Retorna null se a conversão falhar
        }
    }
}
