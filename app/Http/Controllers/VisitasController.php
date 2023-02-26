<?php

namespace App\Http\Controllers;

use App\Models\visitas;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\visitas  $visitas
     * @return \Illuminate\Http\Response
     */
    public function show(visitas $visitas)
    {
        //
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
