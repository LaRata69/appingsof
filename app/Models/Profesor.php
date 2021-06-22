<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Profesor extends Model
{
    use HasFactory;

    protected $fillable = [
        'rut_profesor',
        'nombre_profesor',
        'correo',
        'es_encargado',
        'estado',
    ];
}
