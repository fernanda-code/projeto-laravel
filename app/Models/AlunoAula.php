<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlunoAula extends Model
{
    protected $table = 'alunos_aulas';

    protected $fillable = [
        'aluno_id',
        'aula_id'
    ];
}
