<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelos extends Model
{
    use HasFactory;

    protected $table='modelos';

    protected $fillable = [
        'nombreEs',
        'nombreEn',
        'previewEs',
        'previewEn',
        'textoEs',
        'textoEn',
        'destacadoEs',
        'destacadoEn',
        'enlace',
        'tipoMotorEs',
        'tipoMotorEn',
        'precio',
        'cv',
        'cc',
        'nm',
        'alturaAsiento',
        'sonidoMotor',
        'imagen',
    ];
}
