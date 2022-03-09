<?php

namespace App\Http\Controllers;

use App\Models\noticias;
use Illuminate\Http\Request;

class noticiasController extends Controller
{
    public function addNews(Request $request)
    {


        $noticia = new noticias();
        $noticia->titulo = $request->input('titulo');
        $noticia->fecha = $request->input('fecha');
        $noticia->texto = $request->input('texto');

        if($request->hasfile('imagen'))
        {
            $file = $request->file('imagen');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/noticias/', $filename);
            $noticia->imagen = $filename;
        }

        $noticia->save();

        return response('insert success');
    }
}
