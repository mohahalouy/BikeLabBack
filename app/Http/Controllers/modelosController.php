<?php

namespace App\Http\Controllers;

use App\Models\equipamientos;
use App\Models\modelos;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

class modelosController extends Controller
{
    public function addModel(Request $request)
    {


        $modelo = new modelos();
        $modelo->nombreEs = $request->input('nombreEs');
        $modelo->nombreEn = $request->input('nombreEn');
        $modelo->previewEs = $request->input('previewTextoEs');
        $modelo->previewEn = $request->input('previewTextoEn');
        $modelo->textoEs = $request->input('textoEs');
        $modelo->textoEn = $request->input('textoEn');
        $modelo->destacadoEs = $request->input('destacadoEs');
        $modelo->destacadoEn = $request->input('destacadoEn');
        $modelo->enlace = $request->input('enlace');
        $modelo->tipoMotorEs = $request->input('tipoMotorEs');
        $modelo->tipoMotorEn = $request->input('tipoMotorEn');
        $modelo->modelo = $request->input('modelo');
        $modelo->precio = $request->input('precio');
        $modelo->cv = $request->input('cv');
        $modelo->cc = $request->input('cc');
        $modelo->nm = $request->input('nm');
        $modelo->alturaAsiento = $request->input('alturaAsiento');



        if($request->hasfile('imagen'))
        {
            $file = $request->file('imagen');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/modelos/imagenes/', $filename);
            $modelo->imagen = $filename;
        }

        if($request->hasfile('sonidoMotor'))
        {
            $file = $request->file('sonidoMotor');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/modelos/sonidoMotor/', $filename);
            $modelo->sonidoMotor = $filename;
        }

        $modelo->save();

        return response($request);
    }

    public function index()
    {
        $modelos = new modelos();

        return $modelos->all();
    }

    public function find(Request $request)
    {

        $modelos = modelos::where('id', $request->query('id'))->get();
//       $modelos=$modelos::find(id8);

        return $modelos;

    }

    public function findArray(Request $request){

        $idsModelos=[];
        $idsEquipamientos=[];

        $arrayGeneral=[];

        foreach ($request->all() as $valor) {
            if ($valor['tipoArticulo'] === 'modelo') {
                array_push($idsModelos, $valor['id']);
            } else if ($valor['tipoArticulo'] === 'equipamiento') {
                array_push($idsEquipamientos, $valor['id']);
            }
        }

        $modelos = modelos::whereIn('id', $idsModelos)->get();
        $equipamientos = equipamientos::whereIn('id', $idsEquipamientos)->get();


        foreach ($request->all() as $valor) {
            foreach ($modelos as $valorj) {
                if ($valorj['id'] === $valor['id'] && $valor['tipoArticulo'] === 'modelo') {
                    $valorj['cantidad'] = $valor['cantidad'];
                }
            }
            foreach ($equipamientos as $valorj) {
                if ($valorj['id'] === $valor['id'] && $valor['tipoArticulo'] === 'equipamiento') {
                    $valorj['cantidad'] = $valor['cantidad'];
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
