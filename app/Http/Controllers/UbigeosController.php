<?php

namespace App\Http\Controllers;

use App\Models\ubigeos;
use Illuminate\Http\Request;
use DB;
class UbigeosController extends Controller
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
     * @param  \App\Models\ubigeos  $ubigeos
     * @return \Illuminate\Http\Response
     */
    public function show(ubigeos $ubigeos)
    {
        //obtener registros
        $distritos=DB::table('ubigeos')
        ->select('ubigeos.id','ubigeos.provincia','ubigeos.ubigeo_distrito','ubigeos.distrito')
        ->get();
        return response()->json($distritos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ubigeos  $ubigeos
     * @return \Illuminate\Http\Response
     */
    public function edit(ubigeos $ubigeos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ubigeos  $ubigeos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ubigeos $ubigeos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ubigeos  $ubigeos
     * @return \Illuminate\Http\Response
     */
    public function destroy(ubigeos $ubigeos)
    {
        //
    }
}
