@if (Route::has('login'))
@auth
  @extends('layouts.panel')
  @section('content')
    <h5><a href="/home">Inicio / </a><a href="paneladmin">Panel Admin / </a></h5>
    <h5 style="text-align: center">Bienvenido al Panel Administración</h5>  
    
  @endsection
@endauth
@endif