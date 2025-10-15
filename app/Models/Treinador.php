<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treinador extends Model
{
    protected $table = 'Treinadores';

    protected $fillable = [
        'nome',
        'especialidade',
        'telefone',
    ];
}
