<?php

namespace App\Http\Controllers;

use App\Models\asociacionessocios;
use Illuminate\Http\Request;
use DB;

class AsociacionessociosController extends Controller
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
        $obj = new asociacionessocios();
        $obj->idasociaciones=request('IdAsociacionSocio');
        $obj->nombre_socio=request('nombre_socio');
        $obj->apellido_socio = request('apellido_socio');
        $obj->tipo_socio = request('tipo_socio');
        $obj->celular_socio = request('celular_socio');
        $obj->correo_socio = request('correo_socio');
        $obj->tipo_discapacidad = request('tipo_discapacidad');
        $obj->save();
        $data=['Msje'=>'ok'];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\asociacionessocios  $asociacionessocios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = DB::table('asociacionessocios')
        ->select('asociacionessocios.*')
        ->where('asociacionessocios.idasociaciones','=',$id)
        ->get();
        return datatables()->of($obj)->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\asociacionessocios  $asociacionessocios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = asociacionessocios::find($id);
        return response()->json($obj);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\asociacionessocios  $asociacionessocios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, asociacionessocios $asociacionessocios)
    {
        $id=request('IdSocio');
        $obj = asociacionessocios::findOrFail($id);
        $obj->nombre_socio=request('nombre_socio');
        $obj->apellido_socio = request('apellido_socio');
        $obj->tipo_socio = request('tipo_socio');
        $obj->celular_socio = request('celular_socio');
        $obj->correo_socio = request('correo_socio');
        $obj->tipo_discapacidad = request('tipo_discapacidad');
        $obj->save();
        $data=['Msje'=>'ok'];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\asociacionessocios  $asociacionessocios
     * @return \Illuminate\Http\Response
     */
    public function destroy(asociacionessocios $asociacionessocios)
    {
        //
    }
}
