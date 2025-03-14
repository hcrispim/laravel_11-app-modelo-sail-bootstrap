<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaTreinamento extends Model
{
    use HasFactory;

    protected $table = 'programa_treinamento';
    protected $primaryKey = 'id_programa_treinamento';

    protected $fillable = [
        'id_usuario',
        'nome_programa',
        'dt_inicio',
        'dt_final'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function sessoesTreinamento()
    {
        return $this->hasMany(SessaoTreinamento::class, 'id_programa_treinamento');
    }
}
