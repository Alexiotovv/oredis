@extends('menuvertical')
@section('contenido_panel')


<div class="alert alert-success" role="alert">
    La información se registró correctamente.!
</div>
<div class="content">
    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-primary" href="CreateDiscapacitados" ><i class="lni lni-plus"></i> Nuevo Registro</a>
        </div>
        <div class="col-md-4">
            <a class="btn btn-warning" href="editarpersonas" ><i class="lni lni-pencil"></i> Editar Registro</a>
        </div>
    </div>


@endsection

