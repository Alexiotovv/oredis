<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\noticias;
use DB;
class paginasController extends Controller
{
    
    public function inicio(Request $request)
    {
        $noticias=noticias::where('publicar', '1')
        ->orderByDesc('noticias.id')
        ->paginate(3);
        // ->get();
        return view('home',['noticias'=>$noticias]);
    }

    public function home(Request $request)
    {

        $noticias=noticias::where('publicar', '1')
        ->orderByDesc('noticias.id')
        ->paginate(3);
        // ->get();
        return view('home',['noticias'=>$noticias]);
    }

    public function paneladmin(Request $request)
    {
        return view('paneladmin');
    }

}