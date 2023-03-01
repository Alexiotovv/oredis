<?php

namespace App\Http\Controllers;

use App\Models\visitas;
use Illuminate\Http\Request;
use DB;
class VisitasController extends Controller
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
        return view('visitas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj= new visitas();
        $obj->idDireccion=request('idDireccion');
        $obj->altitud=request('altitud');
        $obj->longitud=request('longitud');
        $obj->latitud=request('latitud');
        $obj->viveaqui=request('viveaqui');
        $obj->comentarios=request('comentarios');
        $obj->FechaVisita=request('FechaVisita');
        $obj->Usuario=auth()->user()->id;
        $obj->save();
        $data=['Msje'=>'Ok'];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\visitas  $visitas
     * @return \Illuminate\Http\Response
     */
    public function show($dni)
    {
        //
       $datos =DB::table('direcciones')
       ->leftjoin('discapacitados','discapacitados.id','direcciones.disc_id')
       ->where('discapacitados.nro_doc_identidad','=',$dni)
       ->where('direcciones.activo','=',1)
       ->select('direcciones.direccion','direcciones.numero','discapacitados.nombre',
       'discapacitados.apellido_paterno','discapacitados.apellido_materno','direcciones.id as idDireccion')
       ->get();
       return response()->json($datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\visitas  $visitas
     * @return \Illuminate\Http\Response
     */
    public function edit(visitas $visitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\visitas  $visitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, visitas $visitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\visitas  $visitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(visitas $visitas)
    {
        //
    }
}
