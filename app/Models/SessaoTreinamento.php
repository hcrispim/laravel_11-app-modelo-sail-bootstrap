<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessaoTreinamento extends Model
{
    use HasFactory;

    protected $table = 'sessao_treinamento';
    protected $primaryKey = 'id_sessao_treinamento';

    protected $fillable = [
        'id_programa_treinamento',
        'dt_sessao_planejada',
        'tempo_duracao_planejada',
        'dt_sessao_executada',
        'tempo_duracao_executada'
    ];

    public function programaTreinamento()
    {
        return $this->belongsTo(ProgramaTreinamento::class, 'id_programa_treinamento');
    }
    public function seriesExercicio()
    {
        return $this->hasMany(SerieExercicio::class, 'id_sessao_treinamento');
    }
}
