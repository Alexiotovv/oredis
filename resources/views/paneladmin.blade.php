@if (Route::has('login'))
@auth
  @extends('layouts.panel')
  @section('titulo')
    <title>Panel de Administración</title>
  @endsection
  @section('content')
    <h5><a href="/home">Inicio / </a><a href="#">Panel Admin / </a></h5>
    <h5 style="text-align: center">Bienvenido al Panel Administración</h5>  
    
  @endsection
@endauth
@endif