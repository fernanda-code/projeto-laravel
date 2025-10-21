<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $table = 'Planos';

    protected $fillable = [
        'nome',
        'duracao',
        'preco',
    ];
}
