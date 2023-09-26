<?php

namespace App\Http\Controllers;

use App\Models\noticias;
use Illuminate\Http\Request;
use App\Models\contenidos;
use DB;
use Illuminate\Support\Facades\Storage;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto=$request->get('txtBuscar');
        $noticias=noticias::where('Titulo', 'like','%'.$texto.'%')
        ->where('status','=',1)
        ->orwhere('Descripcion', 'like','%'.$texto.'%')
        ->orderByDesc('noticias.id')
        ->paginate(20);
        // ->get(); //no se ponde get cuando hay paginate()
        return view('noticias',['noticias'=>$noticias,'texto'=>$texto]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrarnoticia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new noticias();
        if ($request->hasFile('archivo')){
            $file = request('archivo')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('archivo')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('archivo')->storeAs('noticias/',$archivo,'pirulo');//pirulo es el nombre de disco
            $obj->archivo = $archivo;
        }
        if (request('contenido')==''){
            $contenido='-';
        }

        $obj->Titulo = request('Titulo');
        $obj->Descripcion = request('Descripcion');
        $obj->Fecha = request('Fecha');
        $obj->publicar = request('publicar');
        $obj->contenido = $contenido;
        $obj->slider = request('slider');
        $obj->save();
        return redirect()->route('noticias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function show(noticias $noticias)
    {
        $noticias=noticias::where('publicar', '1')
        ->where('status','=',1)
        ->orderByDesc('noticias.id')
        ->paginate(10);

        $dato=DB::table('contenidos')->select('contenidos.*')->get();
        if (count($dato)>0) {
            $obj=contenidos::find($dato[0]->id);
        }
        return view('noticias_todas',['noticias'=>$noticias,'obj'=>$obj]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia=noticias::find($id);
        return view ('noticia_editar',['obj'=>$noticia]);
    }

    public function noticia_independiente($id)
    {
        $noticias=noticias::find($id);
        
        $dato=DB::table('contenidos')->select('contenidos.*')->get();
        if (count($dato)>0) {
            $obj=contenidos::find($dato[0]->id);
        }
        
        
        return view('noticia_independiente',['noticias'=>$noticias,'obj'=>$obj]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = request('id');
        $obj=noticias::findOrFail($id);
        if ($request->hasFile('archivo')){
            $file = request('archivo')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('archivo')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('archivo')->storeAs('noticias/',$archivo,'pirulo');//pirulo es el nombre de disco
            $obj->archivo = $archivo;
        }
        if (request('contenido')==''){
            $contenido='-';
        }
        $obj->Titulo = request('Titulo');
        $obj->Descripcion = request('Descripcion');
        $obj->Fecha = request('Fecha');
        $obj->publicar = request('publicar');
        $obj->contenido = request('contenido');
        $obj->slider = request('slider');
        $obj->save();
        return redirect()->route('noticias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj=noticias::findOrFail($id);
        $obj->status=false;
        $obj->save();
        $data=['msje'=>'ok'];
        return response()->json($data);
    }

    public function bannermodal($id,$valor)
    {
        $obj=noticias::findOrFail($id);
        $obj->modal=$valor;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }
    public function slider($id,$valor)
    {
        $obj=noticias::findOrFail($id);
        $obj->slider=$valor;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }
    public function publicar($id,$valor)
    {
        $obj=noticias::findOrFail($id);
        $obj->publicar=$valor;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }
}
