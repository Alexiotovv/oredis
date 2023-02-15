<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class paginasController extends Controller
{
    
    public function home(Request $request)
    {
        return view('home');
    }

    public function paneladmin(Request $request)
    {
        return view('paneladmin');
    }

}