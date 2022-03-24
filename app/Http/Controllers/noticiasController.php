<?php

namespace App\Http\Controllers;

use App\Models\noticias;
use Illuminate\Http\Request;

class noticiasController extends Controller
{
    public function addNews(Request $request)
    {


        $noticia = new noticias();
        $noticia->tituloEs = $request->input('tituloEs');
        $noticia->tituloEn = $request->input('tituloEn');
        $noticia->fecha = $request->input('fecha');
        $noticia->previewTextoEs = $request->input('previewTextoEs');
        $noticia->previewTextoEn = $request->input('previewTextoEn');
        $noticia->textoEs = $request->input('textoEs');
        $noticia->textoEn = $request->input('textoEn');

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

    public function index()
    {
        $noticias = new noticias();

        return $noticias->all();
    }

    public function find(Request $request)
    {

        $noticia = noticias::where('id', $request->query('id'))->get();
//       $noticia=noticias::find(8);

        return $noticia;

    }
}
