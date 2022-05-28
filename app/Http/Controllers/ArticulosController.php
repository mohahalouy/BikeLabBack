<?php

namespace App\Http\Controllers;

use App\Models\equipamientos;
use App\Models\modelos;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

class articulosController extends Controller
{
    public function findArray(Request $request){

        $idsModelos=[];
        $idsEquipamientos=[];

        $arrayGeneral=[];

        foreach ($request->all() as $valor) {
            if ($valor['tipoArticulo'] === 'modelos') {
                array_push($idsModelos, $valor['id']);
            } else if ($valor['tipoArticulo'] === 'equipamiento') {
                array_push($idsEquipamientos, $valor['id']);
            }
        }

        $modelos = modelos::whereIn('id', $idsModelos)->get();
        $equipamientos = equipamientos::whereIn('id', $idsEquipamientos)->get();


        foreach ($request->all() as $valor) {
            foreach ($modelos as $valorj) {
                if ($valorj['id'] === $valor['id'] && $valor['tipoArticulo'] === 'modelos') {
                    $valorj['cantidad'] = $valor['cantidad'];
                    $valorj['tipoCesta'] = $valor['tipoArticulo'];
                }
            }
            foreach ($equipamientos as $valorj) {
                if ($valorj['id'] === $valor['id'] && $valor['tipoArticulo'] === 'equipamiento') {
                    $valorj['cantidad'] = $valor['cantidad'];
                    $valorj['tipoCesta'] = $valor['tipoArticulo'];
                    $valorj['tallaSeleccionada'] = $valor['talla'];
                }
            }
        }



        foreach ($modelos as $valor) {
            array_push($arrayGeneral,$valor);
        }

        foreach ($equipamientos as $valor) {
            array_push($arrayGeneral,$valor);
        }


        return $arrayGeneral;

    }

}
