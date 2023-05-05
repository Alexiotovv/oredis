<?php

namespace App\Http\Controllers;

use App\Models\asociacionessocios;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
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
    public function listar($idAsociacion)
    {
        $obj = DB::table('asociacionessocios')
        ->leftjoin('asociaciones','asociaciones.id','=','asociacionessocios.idasociaciones')
        ->leftjoin('discapacitados','discapacitados.id','=','asociacionessocios.iddiscapacitados')
        ->leftjoin('direcciones','direcciones.disc_id','=','discapacitados.id')
        ->leftjoin('ubigeos','ubigeos.id','=','direcciones.ubigeo_id')
        ->where('asociacionessocios.idasociaciones','=',$idAsociacion)
        ->where('direcciones.activo','=',1)
        ->select(
            'discapacitados.nro_doc_identidad',
            'discapacitados.nombre',
            'discapacitados.apellido_paterno',
            'discapacitados.apellido_materno',
            'asociacionessocios.tipo_socio',
            'ubigeos.provincia',
            'ubigeos.distrito',
            'direcciones.direccion',
            'direcciones.numero',
            'discapacitados.correo',
            'discapacitados.telefono',
            'discapacitados.tipo_discapacidad',)
        ->get();
        return response()->json($obj);
    }

    public function buscarregistroporid($id)
    {
       $obj = DB::table('asociacionessocios')
       ->select('asociacionessocios.iddiscapacitados')
       ->where('asociacionessocios.iddiscapacitados','=',$id)
       ->get();
       return response()->json($obj);
    }


    public function buscarregistro($dni)
     {
        $obj = DB::table('asociacionessocios')
        ->leftjoin('discapacitados','discapacitados.id','=','asociacionessocios.iddiscapacitados')
        ->select('asociacionessocios.id')
        ->where('discapacitados.nro_doc_identidad','=',$dni)
        ->get();
        return response()->json($obj);
     }

     public function buscarnombre($nombre,$apepat,$apemat)
     {
        #aqui me quede
        // $nombre=request('txtbuscarnombre');
        // $apellido_pat=request('txtbuscarapellidopat');
        // $apellido_mat=request('txtbuscarapellidomat');
        // $nombre=Str::of(request('txtbuscarnombre'))->explode(' ');
        if ($nombre=='-') {
            $nombre='%';
        }
        if ($apepat=='-') {
            $apepat='%';
        }
        if ($apemat=='-') {
            $apemat='%';
        }

        $obj = DB::table('discapacitados')
        ->leftjoin('direcciones','direcciones.disc_id','=','discapacitados.id')
        ->leftjoin('ubigeos','ubigeos.id','=','direcciones.ubigeo_id')
        ->select('discapacitados.id',
            'discapacitados.nro_doc_identidad',
            'discapacitados.nombre',
            'discapacitados.apellido_paterno',
            'discapacitados.apellido_materno',
            'ubigeos.provincia',
            'ubigeos.distrito',
            'direcciones.direccion',
            'direcciones.numero',
        )
       ->where('discapacitados.nombre','like','%'.$nombre.'%')
       ->where('discapacitados.apellido_paterno','like','%'.$apepat.'%')
       ->where('discapacitados.apellido_materno','like','%'.$apemat.'%')
       ->where('direcciones.activo','=',1)
       ->limit(50)
        ->get();
        return response()->json($obj);
     }

     public function buscar($dni)
     {
        $obj = DB::table('discapacitados')
        ->select('discapacitados.id',
        'discapacitados.nro_doc_identidad',
        'discapacitados.nombre',
        'discapacitados.apellido_paterno',
        'discapacitados.apellido_materno')
        ->where('discapacitados.nro_doc_identidad','=',$dni)
        ->get();
        return response()->json($obj);
     }


    public function store(Request $request)
    {
        $obj = new asociacionessocios();
        $obj->idasociaciones=request('IdAsociacionSocio');
        $obj->iddiscapacitados=request('iddiscapacitado');
        $obj->tipo_socio = request('tipo_socio');
        $obj->status = request('status');
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
        ->leftjoin('discapacitados','discapacitados.id','=','asociacionessocios.iddiscapacitados')
        ->select('asociacionessocios.id',
        'asociacionessocios.tipo_socio',
        'discapacitados.nombre',
        'discapacitados.apellido_paterno',
        'discapacitados.apellido_materno',
        'discapacitados.telefono',
        'discapacitados.correo',
        'discapacitados.tipo_discapacidad')
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
        $obj->tipo_socio = request('tipo_socio');
        $obj->status = request('status');
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
    public function destroy($id)
    {
        $obj = asociacionessocios::findOrFail($id);
        $obj->delete();
        $data=['Msje'=>'ok'];
        return response()->json($data);
    }
}
