<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    protected $fillable = [
        'salas_id',
        'usuarios_id',
        'data_hora',
        'inicio_fim'
    ];
}
