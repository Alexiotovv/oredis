<?php

namespace App\Http\Controllers;

use App\Models\reportes;
use Illuminate\Http\Request;
use DB;
class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('reportevisita');
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
     * @param  \App\Models\reportes  $reportes
     * @return \Illuminate\Http\Response
     */
    public function show(reportes $reportes)
    {
        $visitas=DB::table('visitas')
        ->leftjoin('direcciones','direcciones.id','=','visitas.idDireccion')
        ->leftjoin('ubigeos','ubigeos.id','=','direcciones.ubigeo_id')
        ->leftjoin('discapacitados','discapacitados.id','=','direcciones.disc_id')
        ->leftjoin('users','users.id','=','visitas.Usuario')
        ->select('discapacitados.nombre',
        'discapacitados.apellido_paterno',
        'discapacitados.apellido_materno',
        'direcciones.direccion',
        'direcciones.numero',
        'ubigeos.provincia',
        'ubigeos.distrito',
        'visitas.viveaqui',
        'visitas.created_at',
        'users.nombres',
        'users.apellidos',
        )
        ->get();
        return datatables()->of($visitas)->tojson();
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reportes  $reportes
     * @return \Illuminate\Http\Response
     */
    public function edit(reportes $reportes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reportes  $reportes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reportes $reportes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reportes  $reportes
     * @return \Illuminate\Http\Response
     */
    public function destroy(reportes $reportes)
    {
        //
    }
}
