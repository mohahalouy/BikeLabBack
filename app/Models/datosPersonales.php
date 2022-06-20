<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datosPersonales extends Model
{

    use HasFactory;

    protected $table='datosPersonales';

    protected $fillable = [
        'idUser',
        'genero',
        'email',
        'nombre',
        'apellidos',
        'numeroTelefono',
        'entregaDomicilio',
        'direccion',
        'cp',
        'ciudad'
    ];
}
