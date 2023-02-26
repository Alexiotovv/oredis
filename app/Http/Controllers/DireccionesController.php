<?php

namespace App\Http\Controllers;

use App\Models\direcciones;
use Illuminate\Http\Request;
use DB;

class DireccionesController extends Controller
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
        $obj = DB::table('direcciones')
        ->where('direcciones.disc_id',request('idPersonaDireccion'))
        ->where('direcciones.activo',1)
        ->update(['direcciones.activo'=>0]);
        

        $obj=new direcciones();
        $obj->disc_id=request('idPersonaDireccion');
        $obj->ubigeo_id=request('distrito');
        $obj->direccion=request('direccion');
        $obj->numero=request('numero');
        $obj->activo=true;
        $obj->save();
        

        $data=['Msje'=>'ok'];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\direcciones  $direcciones
     * @return \Illuminate\Http\Response
     */
    public function show($idPersona)//ObtenerDirecciones
    {
        $direcciones = DB::table('direcciones')
        ->leftjoin('ubigeos','ubigeos.id','=','direcciones.ubigeo_id')
        ->where('direcciones.disc_id','=',$idPersona)
        ->select('direcciones.*','ubigeos.provincia','ubigeos.distrito')
        ->orderByDesc('direcciones.id')
        ->get();
        
        return response()->json($direcciones);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\direcciones  $direcciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::table('direcciones')
        ->leftjoin('ubigeos','ubigeos.id','=','direcciones.ubigeo_id')
        ->where('direcciones.id','=',$id)
        ->select('direcciones.id','direcciones.direccion','direcciones.numero','direcciones.activo',
        'ubigeos.provincia as provincia','ubigeos.id as distritoId')
        ->get();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\direcciones  $direcciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $obj = DB::table('direcciones')
        ->where('direcciones.disc_id',request('idPersonaDireccion'))
        ->where('direcciones.activo',1)
        ->update(['direcciones.activo'=>0]);
        
        $idDireccion=request('idDireccion');
        $obj=direcciones::findOrFail($idDireccion);
        $obj->ubigeo_id=request('distrito');
        $obj->direccion=request('direccion');
        $obj->numero=request('numero');
        $obj->activo=request('activo');
        $obj->save();
        
        $data=['Msje'=>'ok'];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\direcciones  $direcciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(direcciones $direcciones)
    {
        //
    }
}
