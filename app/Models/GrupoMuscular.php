<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoMuscular extends Model
{
    use HasFactory;
    protected $table = 'grupo_muscular';
    protected $primaryKey = 'id_grupo_muscular';
    protected $fillable = [
        'nome_grupo_muscular',
        'localizacao_grupo_muscular',
    ];
}
