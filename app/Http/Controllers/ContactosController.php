<?php

namespace App\Http\Controllers;

use App\Models\contactos;
use Illuminate\Http\Request;

class ContactosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obj=contactos::all();
        return view('panel.contacto_index',compact('obj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paginas.contacto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj=new contactos();
        $obj->nombre=request('nombre');
        $obj->correo=request('correo');
        $obj->telefono=request('telefono');
        $obj->mensaje=request('mensaje');
        // $obj->status=request('status');
        $obj->save();
        return redirect()->route('contacto.create')->with('guardo','si');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function show(contactos $contactos)
    {
        $obj=contactos::all();
        return datatables()->of($obj)->toJson();
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function edit(contactos $contactos)
    {
        //
    }
    public function status($id,$valor)
    {
        $obj=contactos::findOrFail($id);
        $obj->status=$valor;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contactos $contactos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function destroy(contactos $contactos)
    {
        //
    }
}
