<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $fillable = [
        'nrc',
        'codigo_asignatura',
        'rut_profesor',
        'nombre_profesor',
        'estado',
        'periodo_academico',
    ];
}
