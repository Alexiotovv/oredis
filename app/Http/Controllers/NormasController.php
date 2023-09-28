<?php

namespace App\Http\Controllers;

use App\Models\normas;
use Illuminate\Http\Request;

class NormasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $normas=normas::all();
        return view('panel.normas.index',compact('normas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.normas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj=new normas();
        $obj->titulo=request('titulo');
        $obj->descripcion=request('descripcion');
        $obj->fecha=request('fecha');
        if ($request->hasFile('archivo')){
            $file = request('archivo')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('archivo')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('archivo')->storeAs('normas/',$archivo,'pirulo');//pirulo es el nombre de disco
            $obj->archivo = $archivo;
        }
        $obj->userid=auth()->user()->id;
        $obj->save();

        return redirect()->route('panel.normas.index')->with('mensaje','Registro Guardado');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\normas  $normas
     * @return \Illuminate\Http\Response
     */
    public function show(normas $normas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\normas  $normas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj=normas::find($id);
        return view('panel.normas.edit',['obj'=>$obj]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\normas  $normas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=request('id');
        $obj= normas::findOrFail($id);
        $obj->titulo=request('titulo');
        $obj->descripcion=request('descripcion');
        if ($request->hasFile('archivo')){
            $file = request('archivo')->getClientOriginalName();//archivo recibido
            $filename = pathinfo($file, PATHINFO_FILENAME);//nombre archivo sin extension
            $extension = request('archivo')->getClientOriginalExtension();//extensión
            $archivo= $filename.'_'.time().'.'.$extension;//
            request('archivo')->storeAs('normas/',$archivo,'pirulo');//pirulo es el nombre de disco
            $obj->archivo = $archivo;
        }
        $obj->save();

        return redirect()->route('panel.normas.index')->with('mensaje','Registro Guardado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\normas  $normas
     * @return \Illuminate\Http\Response
     */
    public function destroy(normas $normas)
    {
        //
    }

    public function estado($id,$valor)
    {
        $obj=normas::findOrFail($id);
        $obj->estado=$valor;
        $obj->save();
        $data=['Mensaje'=>'Ok'];
        return response()->json($data);
    }

}
