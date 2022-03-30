<?php

namespace App\Http\Controllers;

use App\Models\modelos;
use Illuminate\Http\Request;

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
//       $modelos=$modelos::find(8);

        return $modelos;

    }

}
