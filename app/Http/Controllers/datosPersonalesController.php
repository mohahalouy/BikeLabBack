<?php

namespace App\Http\Controllers;

use App\Models\datosPersonales;
use Illuminate\Http\Request;

class datosPersonalesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardarDatosPersonales (Request $request)
    {


            if (!datosPersonales::where('idUser', $request->input('idUser'))->exists()) {
            $datosPersonales = new datosPersonales();
            $datosPersonales->idUser = $request->input('idUser');
            $datosPersonales->genero = $request->input('genero');
            $datosPersonales->email = $request->input('email');
            $datosPersonales->nombre = $request->input('nombre');
            $datosPersonales->apellidos = $request->input('apellidos');
            $datosPersonales->numeroTelefono = $request->input('numeroTelefono');
            $datosPersonales->entregaDomicilio = $request->input('entregaDomicilio');
            $datosPersonales->direccion = $request->input('direccion');
            $datosPersonales->cp = $request->input('cp');
            $datosPersonales->ciudad = $request->input('ciudad');

            $datosPersonales->save();

            return 'Datos guardados';
        }else{
                if ((int)$request->input('entregaDomicilio') === 1) {
                    datosPersonales::where('idUser', $request->input('idUser'))->update([
                        'idUser' => $request->input('idUser'),
                        'genero' => $request->input('genero'),
                        'email' => $request->input('email'),
                        'nombre' => $request->input('nombre'),
                        'apellidos' => $request->input('apellidos'),
                        'numeroTelefono' => $request->input('numeroTelefono'),
                        'entregaDomicilio' => $request->input('entregaDomicilio'),
                        'direccion' => $request->input('direccion'),
                        'cp' => $request->input('cp'),
                        'ciudad' => $request->input('ciudad'),
                    ]);
                } else {
                    datosPersonales::where('idUser', $request->input('idUser'))->update([
                        'idUser' => $request->input('idUser'),
                        'genero' => $request->input('genero'),
                        'email' => $request->input('email'),
                        'nombre' => $request->input('nombre'),
                        'apellidos' => $request->input('apellidos'),
                        'numeroTelefono' => $request->input('numeroTelefono'),
                        'entregaDomicilio' => $request->input('entregaDomicilio')
                    ]);
                }
                return 'Datos modificados';
            }
    }

    public function find(Request $request)
    {

        $datosPersonales = datosPersonales::where('idUser', $request->input('idUser'))->get();
//       $modelos=$modelos::find(id4);

        return $datosPersonales;

    }

    public function cargarDatosPersonales(Request $request)
    {

        if (datosPersonales::where('idUser', $request->input('idUser'))->exists()) {
            $datosPersonales = datosPersonales::where('idUser', $request->input('idUser'))->get();
            $datosPersonales[0]['entregaDomicilio'] = $datosPersonales[0]['entregaDomicilio'] === 0 ? false : true;
            return $datosPersonales;
        }else{
            return response(['message' => 'No existen Datos']);
        }
    }
}
