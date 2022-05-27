<?php

namespace App\Http\Controllers;

use App\Models\equipamientos;
use Illuminate\Http\Request;

class equipamientosController extends Controller
{
    public function addClothing(Request $request)
    {


        $ropa = new equipamientos();
        $ropa->nombreEs = $request->input('nombreEs');
        $ropa->nombreEn = $request->input('nombreEn');
        $ropa->codigoArticulo = $request->input('codigoArticulo');
        $ropa->tipoArticulo = $request->input('tipoArticulo');
        $ropa->tallas = $request->input('tallas');
        $ropa->precio = $request->input('precio');
        $ropa->detallesEs = $request->input('detallesEs');
        $ropa->detallesEn = $request->input('detallesEn');

        if($request->hasfile('imgPortada'))
        {
            $file = $request->file('imgPortada');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/equipamiento/imagenes/', $filename);
            $ropa->imgPortada = $filename;
        }

        $ropa->save();

        return response('insert success');
    }


    public function index(Request $request)
    {
        $equipamientos = equipamientos::where('tipoArticulo', $request->query('tipoArticulo'))->get();

        return $equipamientos->all();
    }

    public function find($id)
    {

        $equipamiento = equipamientos::where('id', $id)->get()->first();
////       $modelos=$modelos::find(id8);

        return $equipamiento;

    }
}
