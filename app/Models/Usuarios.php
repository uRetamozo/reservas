<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $fillable = [
        'nome',
        'matricula',
        'curso'
    ];

    public function reservas()
    {
        return $this->hasMany(Reservas::class);
    }
}