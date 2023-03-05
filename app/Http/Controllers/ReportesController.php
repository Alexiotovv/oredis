<?php

namespace App\Http\Controllers;

use App\Models\reportes;
use App\Models\visitas;
use App\Models\ubigeos;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
class ReportesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function indexbeneficiario(){
        $distrito_corresponde=DB::table('users')->where('users.id','=',auth()->user()->id)->get();
        // dd($distrito_corresponde[0]->zona_dist);

        $distritos=DB::table('ubigeos')->whereIn('ubigeos.id',json_decode($distrito_corresponde[0]->zona_dist))->select('ubigeos.distrito','ubigeos.id','ubigeos.ubigeo_distrito')->get();
        // dd($distritos);
        $personas=DB::table('discapacitados')
        ->leftjoin('direcciones','direcciones.disc_id','=','discapacitados.id')
        ->leftjoin('ubigeos','ubigeos.id','=','direcciones.ubigeo_id')
        ->where('discapacitados.id','=',0)
        ->select('ubigeos.distrito','discapacitados.nombre',
        'discapacitados.apellido_paterno',
        'discapacitados.apellido_materno',
        'discapacitados.nro_doc_identidad',
        'discapacitados.telefono',
        'discapacitados.correo',
        'discapacitados.fecha_nacimiento',
        'discapacitados.estado_civil',
        'discapacitados.sexo',
        'discapacitados.ocupacion',
        'discapacitados.grado_instruccion',
        'discapacitados.flag_certifi_discapacidad',
        'discapacitados.tipo_discapacidad',
        'discapacitados.diagnostico_discapacidad',
        'discapacitados.requiere_ayuda',
        'discapacitados.tipo_ayuda',
        'discapacitados.ayuda_mecanica',
        'discapacitados.nombre_apoderado',
        'discapacitados.dni_apoderado',
        'discapacitados.parentesco',
        'discapacitados.direccion_apoderado',
        'discapacitados.correo_apoderado',
        'discapacitados.telefono_apoderado',
        'discapacitados.tipo_seguro',
        'discapacitados.seguro_salud',
        'discapacitados.fecha_empadronamiento',
        'discapacitados.flg_carnet_did')
        ->get();
        return view('reportebeneficiario',compact('distritos','personas'));
    }
    public function obtenerbeneficiario(Request $request){
        $distrito=request('distrito');
        $distrito_corresponde=DB::table('users')->where('users.id','=',auth()->user()->id)->get();
        // dd($distrito_corresponde[0]->zona_dist);

        $distritos=DB::table('ubigeos')->whereIn('ubigeos.id',json_decode($distrito_corresponde[0]->zona_dist))->select('ubigeos.distrito','ubigeos.id','ubigeos.ubigeo_distrito')->get();
        // dd($distritos);
        // $distritos=$distrito_corresponde[0];
        $personas=DB::table('discapacitados')
        ->leftjoin('direcciones','direcciones.disc_id','=','discapacitados.id')
        ->leftjoin('ubigeos','ubigeos.id','=','direcciones.ubigeo_id')
        ->where('discapacitados.delete','=',0)
        ->where('ubigeos.id','=',$distrito)
        ->select('ubigeos.distrito','discapacitados.nombre',
        'discapacitados.apellido_paterno',
        'discapacitados.apellido_materno',
        'discapacitados.nro_doc_identidad',
        'discapacitados.telefono',
        'discapacitados.correo',
        'discapacitados.fecha_nacimiento',
        'discapacitados.estado_civil',
        'discapacitados.sexo',
        'discapacitados.ocupacion',
        'discapacitados.grado_instruccion',
        'discapacitados.flag_certifi_discapacidad',
        'discapacitados.tipo_discapacidad',
        'discapacitados.diagnostico_discapacidad',
        'discapacitados.requiere_ayuda',
        'discapacitados.tipo_ayuda',
        'discapacitados.ayuda_mecanica',
        'discapacitados.nombre_apoderado',
        'discapacitados.dni_apoderado',
        'discapacitados.parentesco',
        'discapacitados.direccion_apoderado',
        'discapacitados.correo_apoderado',
        'discapacitados.telefono_apoderado',
        'discapacitados.tipo_seguro',
        'discapacitados.seguro_salud',
        'discapacitados.fecha_empadronamiento',
        'discapacitados.flg_carnet_did')
        ->get();
        return view('reportebeneficiario',compact('distritos','personas'));
    }

    public function obtenervisitas(Request $request)
    {
        $f_incio=request('FechaInicio');
        $visitas=DB::table('visitas')
        ->leftjoin('direcciones','direcciones.id','=','visitas.idDireccion')
        ->leftjoin('ubigeos','ubigeos.id','=','direcciones.ubigeo_id')
        ->leftjoin('discapacitados','discapacitados.id','=','direcciones.disc_id')
        ->leftjoin('users','users.id','=','visitas.Usuario')
        ->select('ubigeos.provincia',
        'ubigeos.distrito',
        'discapacitados.nombre',
        'discapacitados.apellido_paterno',
        'discapacitados.apellido_materno',
        'visitas.FechaVisita',
        'direcciones.direccion',
        'direcciones.numero',
        'visitas.viveaqui',
        'users.nombres',
        'users.apellidos')
        ->where('visitas.FechaVisita','>=',$f_incio)
        ->get();
        // $msje=['Mensaje'=>'ok'];
        // return response()->json($msje);
        return view('reportevisita',['visitas'=>$visitas]);

    }

    public function index(Request $request)
    {
        $visitas=DB::table('visitas')
        ->leftjoin('direcciones','direcciones.id','=','visitas.idDireccion')
        ->leftjoin('ubigeos','ubigeos.id','=','direcciones.ubigeo_id')
        ->leftjoin('discapacitados','discapacitados.id','=','direcciones.disc_id')
        ->leftjoin('users','users.id','=','visitas.Usuario')
        ->select('ubigeos.provincia',
        'ubigeos.distrito',
        'discapacitados.nombre',
        'discapacitados.apellido_paterno',
        'discapacitados.apellido_materno',
        'visitas.FechaVisita',
        'direcciones.direccion',
        'direcciones.numero',
        'visitas.viveaqui',
        'users.nombres',
        'users.apellidos')
        ->where('visitas.id','=',0)
        ->get();
        return view('reportevisita',compact('visitas'));
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
