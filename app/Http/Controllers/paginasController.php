<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\noticias;
use App\Models\contenidos;
use App\Models\normas;
use DB;
class paginasController extends Controller
{
    
    public function inicio(Request $request)
    {
        $noticias=noticias::where('publicar', '1')
        ->orderByDesc('noticias.id')
        ->paginate(3);
        
        $dato=DB::table('contenidos')->select('contenidos.*')->get();
        $slider=noticias::where('publicar','1')
        ->where('slider','1')
        ->get();

        if (count($dato)>0) {
            $obj=contenidos::find($dato[0]->id);
        }
        return view('home',['noticias'=>$noticias,'obj'=>$obj,'slider'=>$slider]);
    }

    public function home(Request $request)
    {
        $noticias=noticias::where('publicar', '1')->orderByDesc('noticias.id')->paginate(3);
        $dato=DB::table('contenidos')->select('contenidos.*')->get();
        $bannerModal=DB::table('noticias')->orderByDesc('noticias.id')->where('modal',true)->select('noticias.*')->first();

        if (count($dato)>0) {
            $obj=contenidos::find($dato[0]->id);
        }
        $slider=noticias::where('publicar','1')
        ->where('slider','1')
        ->get();
        $normas = normas::all()->where('estado',1);
        
        return view('home',['noticias'=>$noticias,'obj'=>$obj,'bannerModal'=>$bannerModal,'slider'=>$slider,'normas'=>$normas]);
    }

    public function paneladmin(Request $request)
    {
        return view('paneladmin');
    }

}