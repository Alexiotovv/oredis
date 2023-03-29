<?php

namespace App\Http\Controllers;

use App\Models\asociaciones;
use Illuminate\Http\Request;
use DB;
class AsociacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provincia=DB::table('ubigeos')
        ->select('ubigeos.provincia')
        ->distinct('ubigeos.provincia')
        ->get();
        $distrito=DB::table('ubigeos')
        ->select('ubigeos.id','ubigeos.distrito')
        ->get();
        return view('asociaciones.index_asociaciones',['distrito'=>$distrito,'provincia'=>$provincia]);
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
        $obj = new asociaciones();
        $obj->idUbigeos=request('distrito');
        $obj->nombre_organizacion=request('nombre_organizacion');
        $obj->siglas_asociacion=request('siglas_asociacion');
        $obj->partida_registral=request('partida_registral');
        $obj->direccion=request('direccion');
        $obj->celular=request('celular');
        $obj->correo=request('correo');
        $obj->save();
        $msje=['Msje'=>'ok'];
        return response()->json($msje);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\asociaciones  $asociaciones
     * @return \Illuminate\Http\Response
     */
    public function show(asociaciones $asociaciones)
    {
        $obj=DB::table('asociaciones')
        ->leftjoin('ubigeos','ubigeos.id','=','asociaciones.idUbigeos')
        ->leftjoin('asociacionessocios','asociacionessocios.idasociaciones','=','asociaciones.id')
        ->where('asociaciones.status','=',1)
        ->orwhere('asociacionessocios.tipo_socio','=','PRESIDENTE')
        ->orwhere('asociacionessocios.tipo_socio','=','')
        ->select('asociaciones.*','asociacionessocios.nombre_socio',
        'asociacionessocios.apellido_socio','ubigeos.provincia',
        'ubigeos.distrito')
        ->get();
        return datatables()->of($obj)->tojson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\asociaciones  $asociaciones
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj=asociaciones::find($id);
        return response()->json($obj);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\asociaciones  $asociaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, asociaciones $asociaciones)
    {
        $id=request('idAsociacion');
        $obj = asociaciones::findOrFail($id);
        $obj->idUbigeos=request('distrito');
        $obj->nombre_organizacion=request('nombre_organizacion');
        $obj->siglas_asociacion=request('siglas_asociacion');
        $obj->partida_registral=request('partida_registral');
        $obj->direccion=request('direccion');
        $obj->celular=request('celular');
        $obj->correo=request('correo');
        $obj->save();
        $msje=['Msje'=>'ok'];
        return response()->json($msje);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\asociaciones  $asociaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj=asociaciones::findOrFail($id);
        $obj->status=0;
        $obj->save();
        $msje=['Msje'=>'ok'];
        return response()->json($msje);
    }
}
