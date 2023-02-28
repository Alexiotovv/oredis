<?php

namespace App\Http\Controllers;

use App\Models\noticias;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias=noticias::where('publicar', '1')
        ->orderByDesc('noticias.id')
        ->paginate(5);
        // ->get();
        return view('noticias',['noticias'=>$noticias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registrarnoticia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new noticias();
        if ($request->hasFile('archivo')){
            $file=request('archivo');
            $archivo=time()."_".$file->getClientOriginalName();
            $file->storeAs('noticias/',$archivo,'public');
            // Storage::disk('disco-noticias')->put($archivo, 'Contents');
            $obj->archivo = $archivo;
        }

        $obj->Titulo = request('Titulo');
        $obj->Descripcion = request('Descripcion');
        $obj->Fecha = request('Fecha');
        $obj->publicar = request('publicar');
        $obj->save();
        return redirect()->route('noticias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function show(noticias $noticias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function edit(noticias $noticias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, noticias $noticias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function destroy(noticias $noticias)
    {
        //
    }
}
