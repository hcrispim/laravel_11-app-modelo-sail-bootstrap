<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaquinaTreino extends Model
{
    /** @use HasFactory<\Database\Factories\MaquinaTreinoFactory> */

    use HasFactory;

    protected $table = 'maquina_treino';
    protected $primaryKey = 'id_maquina_treino';
    protected $fillable = ['nome_maquina_treino', 'foto_maquina_treino'];
}
