<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipamientos extends Model
{
    use HasFactory;

    protected $table='equipamientos';

    protected $fillable = [
        'nombreEs',
        'nombreEn',
        'imagen',
        'codigoArticulo',
        'tipoArticulo',
        'tallas',
        'previewTextoEn',
        'detallesEs',
        'detallesEn'
    ];

}
