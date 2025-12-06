<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salas extends Model
{
    protected $fillable = [
        'nome',
        'capacidade',
        'status'
    ];
    public function reservas()
    {
        return $this->hasMany(Reservas::class);
    }
}
