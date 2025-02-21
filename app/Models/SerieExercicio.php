<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerieExercicio extends Model
{
    use HasFactory;

    protected $table = 'serie_exercicio';

    protected $primaryKey = 'id_serie_exercicio';

    protected $fillable = [
        'id_sessao_treinamento',
        'id_grupo_muscular',
        'id_maquina_treino',
        'numero_series',
        'repeticoes_series',
        'carga',
    ];

    public function sessaoTreinamento()
    {
        return $this->belongsTo(SessaoTreinamento::class, 'id_sessao_treinamento');
    }

    public function grupoMuscular()
    {
        return $this->belongsTo(GrupoMuscular::class, 'id_grupo_muscular');
    }

    public function maquinaTreino()
    {
        return $this->belongsTo(MaquinaTreino::class, 'id_maquina_treino');
    }
}
