<?php

namespace App\Http\Controllers;

use App\Models\discapacitados;
use Illuminate\Http\Request;

class DiscapacitadosController extends Controller
{

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
        return view('regdiscapacitado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $obj= new discapacitados();
        $obj->nombre=request('nombres');
        $obj->apellido_paterno=request('apellido_paterno');#
        $obj->apellido_materno=request('apellido_materno');#
        $obj->doc_identidad=request('doc_identidad');#OK
        $obj->nro_doc_identidad=request('nro_doc_identidad');#OK
        $obj->direccion=request('direccion');#
        $obj->distrito=request('distrito');#
        $obj->altitud=request('Altitud');
        $obj->longitud=request('Longitud');
        $obj->latitud=request('Latitud');
        $obj->correo=request('correo');#
        $obj->telefono=request('telefono');#
        $obj->fecha_nacimiento=request('fecha_nacimiento');#
        $obj->estado_civil=request('estado_civil');#
        $obj->sexo=request('sexo');#
        $obj->ocupacion=request('ocupacion');#
        $obj->grado_instruccion=request('grado_instruccion');#
        $obj->flag_certifi_discapacidad=request('flag_certifi_discapacidad');#
        $obj->tipo_discapacidad=request('tipo_discapacidad');#
        $obj->diagnostico_discapacidad=request('diagnostico_discapacidad');#
        $obj->requiere_ayuda=request('requiere_ayuda');
        $obj->tipo_ayuda=request('tipo_ayuda');
        $obj->ayuda_mecanica=request('ayuda_mecanica');
        $obj->nombre_apoderado=request('nombre_apoderado');
        $obj->dni_apoderado=request('dni_apoderado');
        $obj->parentesco=request('parentesco');
        $obj->direccion_apoderado=request('direccion_apoderado');
        $obj->correo_apoderado=request('correo_apoderado');
        $obj->telefono_apoderado=request('telefono_apoderado');
        $obj->tipo_seguro=request('tipo_seguro');
        $obj->seguro_salud=request('seguro_salud');
        $obj->fecha_empadronamiento=request('fecha_empadronamiento');
        $obj->flg_carnet_did=request('flg_carnet_did');

        $obj->Usuario=auth()->user()->id;
        $obj->save();
        $data=['Mensaje'=>'ok'];
        return response()->json($data);
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\discapacitados  $discapacitados
     * @return \Illuminate\Http\Response
     */
    public function show(discapacitados $discapacitados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\discapacitados  $discapacitados
     * @return \Illuminate\Http\Response
     */
    public function edit(discapacitados $discapacitados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\discapacitados  $discapacitados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, discapacitados $discapacitados)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\discapacitados  $discapacitados
     * @return \Illuminate\Http\Response
     */
    public function destroy(discapacitados $discapacitados)
    {
        //
    }
}
