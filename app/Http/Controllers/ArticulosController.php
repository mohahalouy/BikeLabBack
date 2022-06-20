<?php

namespace App\Http\Controllers;

use App\Models\equipamientos;
use App\Models\modelos;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

class ArticulosController extends Controller
{
    public function findArray(Request $request){

        $arrayGeneral=[];

        foreach ($request->all() as $valor) {
            if ($valor['tipoArticulo'] === 'equipamiento') {
                $equipamiento = equipamientos::find($valor['id']);
                $equipamiento["cantidad"] = $valor['cantidad'];
                $equipamiento["tipoCesta"] = $valor['tipoArticulo'];
                $equipamiento["tallaSeleccionada"] = $valor['talla'];
                array_push($arrayGeneral, $equipamiento);
            }else if ($valor['tipoArticulo'] === 'modelos') {
                $modelo = modelos::find($valor['id']);
                $modelo["cantidad"] = $valor['cantidad'];
                $modelo["tipoCesta"] = $valor['tipoArticulo'];
                array_push($arrayGeneral, $modelo);
            }
        }

        return $arrayGeneral;

    }

}
