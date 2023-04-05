
@if (Route::has('login'))
@auth
    @extends('layouts.panel')
    @section('content')

        <h5><a href="/home">Inicio / </a><a href="/paneladmin">Panel Admin / </a><a href="#">Contacto</a> </h5>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="DTContacto">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Mensaje</th>
                                <th>Contestado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obj as $obj)
                                
                            <tr>
                                <td> {{$obj->id}} </td>
                                <td> {{$obj->nombre}} </td>
                                <td> {{$obj->correo}} </td>
                                <td> {{$obj->telefono}} </td>
                                <td> {{$obj->mensaje}} </td>
                                <td>
                                    <div class="form-check form-switch">
                                        @if ($obj->status)
                                            <input class="form-check-input chkbanner" type="checkbox" id="bannerModal" checked>
                                        @else
                                            <input class="form-check-input chkbanner" type="checkbox" id="bannerModal">
                                        @endif    
                                    </div>
                                        
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
    @section('extra_js')
       <script src="../../../app_js/contacto.js"></script>
    @endsection
@endauth
@endif

