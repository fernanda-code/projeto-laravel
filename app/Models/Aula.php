<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $table = 'aulas';

    protected $fillable = [
        'data',
        'horario',
        'duracao',
        'treinador_id'
    ];

    public function treinador()
    {
        return $this->belongsTo(Treinador::class, 'treinador_id');
    }
}
