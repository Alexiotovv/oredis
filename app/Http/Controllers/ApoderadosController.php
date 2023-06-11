<?php

namespace App\Http\Controllers;

use App\Models\apoderados;
use Illuminate\Http\Request;
use DB;
class ApoderadosController extends Controller
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

        

        $obj = new apoderados();
        $obj->idDisc=request('idPersonaApoderado');
        $obj->dni=request('dni_apoderado');
        $obj->nombres=request('nombre_apoderado');
        $obj->apellidos=request('apellido_apoderado');
        $obj->direccion=request('direccion_apoderado');
        $obj->parentesco=request('parentesco');
        $obj->correo=request('correo_apoderado');
        $obj->telefono=request('telefono_apoderado');
        $obj->save();
        $data=['Msje'=>'ok'];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\apoderados  $apoderados
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj=DB::table('apoderados')
        ->select('apoderados.*')
        ->where('apoderados.idDisc','=',$id)
        ->get();
        return response()->json($obj);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\apoderados  $apoderados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj=apoderados::find($id);
        return response()->json($obj);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\apoderados  $apoderados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, apoderados $apoderados)
    {
        $idApoderado=request('idApoderado');
        $obj = apoderados::findOrFail($idApoderado);
        $obj->dni=request('dni_apoderado');
        $obj->nombres=request('nombre_apoderado');
        $obj->apellidos=request('apellido_apoderado');
        $obj->direccion=request('direccion_apoderado');
        $obj->parentesco=request('parentesco');
        $obj->correo=request('correo_apoderado');
        $obj->telefono=request('telefono_apoderado');
        $obj->status=request('status');
        $obj->save();
        $data=['Msje'=>'ok'];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\apoderados  $apoderados
     * @return \Illuminate\Http\Response
     */
    public function destroy(apoderados $apoderados)
    {
        //
    }
}
