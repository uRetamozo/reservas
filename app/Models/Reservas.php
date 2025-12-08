<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    protected $fillable = [
        'sala_id',
        'usuario_id',
        'data_hora_inicio',
        'data_hora_fim'
    ];

    public function sala()
    {
        return $this->belongsTo(Salas::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuarios::class);
    }
}
