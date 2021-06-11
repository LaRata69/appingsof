<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Alumno extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'rut_alumno',
        'correo',
        'nombre',
        'estado',
        'es_ayudante',
    ];
}
