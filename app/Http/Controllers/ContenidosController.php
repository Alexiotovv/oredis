<?php

namespace App\Http\Controllers;

use App\Models\contenidos;
use Illuminate\Http\Request;
use DB;
class ContenidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contenidos  $contenidos
     * @return \Illuminate\Http\Response
     */
    public function show(contenidos $contenidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contenidos  $contenidos
     * @return \Illuminate\Http\Response
     */
    public function edit(contenidos $contenidos)
    {
        // $datos=DB::table('contenidos')->first();
        $dato=DB::table('contenidos')->select('contenidos.id')->get();
        if (count($dato)>0) {//existe instancia objeto
            $obj=contenidos::find($dato[0]->id);
        }else{
            $obj=contenidos::find(0);
        }
        
        return view('contenido',['obj'=>$obj]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contenidos  $contenidos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contenidos $contenidos)
    {
        $dato=DB::table('contenidos')->select('contenidos.id')->get();
        if (count($dato)>0) {//existe instancia objeto
            $obj=contenidos::findOrFail($dato[0]->id);
        }else{
            $obj=new contenidos();
        }

        $obj->objetivo=request('objetivo');
        $obj->texto_evento=request('texto_evento');
        $obj->pie_evento=request('pie_evento');
        $obj->telefono=request('telefono');
        $obj->correo=request('correo');
        $obj->direccion=request('direccion');
        $obj->nombre_enlace1=request('nombre_enlace1');
        $obj->enlace1=request('enlace1');
        $obj->nombre_enlace2=request('nombre_enlace2');
        $obj->enlace2=request('enlace2');
        $obj->nombre_enlace3=request('nombre_enlace3');
        $obj->enlace3=request('enlace3');

        $obj->texto_banner=request('texto_banner');
        $obj->pie_banner=request('pie_banner');

        if ($request->hasFile('foto_banner')){
            //guarda foto banner
            $file = request('foto_banner')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('foto_banner')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('foto_banner')->storeAs('contenido/',$archivo,'pirulo');//pirulo es el nombre de disco
            //end guarda foto banner
            $obj->foto_banner=$archivo;
        }
        if ($request->hasFile('foto_objetivo')){
            //guarda foto objetivo
            $file = request('foto_objetivo')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('foto_objetivo')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('foto_objetivo')->storeAs('contenido/',$archivo,'pirulo');//pirulo es el nombre de disco
            $obj->foto_objetivo=$archivo;
            // end guarda foto objetivo
        }
        $obj->save();
        return redirect('editarcontenido')->with(['message'=>1]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contenidos  $contenidos
     * @return \Illuminate\Http\Response
     */
    public function destroy(contenidos $contenidos)
    {
        //
    }
}
