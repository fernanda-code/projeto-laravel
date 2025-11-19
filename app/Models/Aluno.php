<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'Alunos';

    protected $fillable = [
        'nome',
        'dataNasc',
        'telefone',
    ];
    public function aulas()
    {
       return $this->belongsToMany(\App\Models\Aula::class, 'alunos_aulas', 'aluno_id', 'aula_id');
    }
}
