
@extends('menuvertical')

@section('contenido_panel')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="home">Inicio</a></li>
      <li class="breadcrumb-item"><a href="paneladmin">Panel Admin</a></li>
      <li class="breadcrumb-item active" aria-current="page">Listar Usuarios</li>
    </ol>
</nav>
<br>

<div class="content">
    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-primary" id="btnNuevoUsuario"><i class="lni lni-plus"></i>Nuevo Usuario</a>
            <br>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="DTUsuarios">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Acción</th>
                        <th>Usuario</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal para Registrar Usuarios --}}
<form id="formUsuario">
    @csrf
    <div class="modal fade" id="ModalUsuario" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EtiquetaUsuario">-</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="">Id</label>
                                <input type="text" class="form-control form-control" name="IdUsuario" id="IdUsuario" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">Usuario</label>
                            <input type="text" id="usuario" class="form-control" name="name" placeholder="usuario" />
                            <p id="estadousuario" style="color: red"></p> 
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">Nombres</label>
                            <input type="text" id="nombres" class="form-control" name="nombres" placeholder="Nombres" />
                            <p id="nombres" style="color: red"></p> 
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">Apellidos</label>
                            <input type="text" id="apellidos" class="form-control" name="apellidos" placeholder="apellidos"/>
                            <p id="apellidos" style="color: red"></p> 
                        </div>
                        <div class="form-group">
                            <label for="">Rol Usuario</label>
                            <select name="rol" id="rol" class="form-control">
                                <option value="1">Administrador</option>
                                <option value="0">Operador</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="">Correo</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe@email.com" required />
                            <p id="estadoemail" style="color: red"></p>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="">Contraseña</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btnGuardaUsuario">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- End Modal para Registrar Usuarios --}}


{{-- Modal para Cambiar Clave --}}
<form id="formCambiarClave">
    @csrf
    <div class="modal-size-lg d-inline-block">
        <div class="modal fade text-left" id="ModalCambiarClave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-default" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="EtiquetaCambiarClave">-</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3">
                                    {{-- <label for="">Id</label> --}}
                                    <input type="text" class="form-control form-control" name="IdUsuarioClave" id="IdUsuarioClave" hidden>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="">Nombre del Usuario</label>
                                <input type="text" id="NombreUsuario" name="NombreUsuario" class=" form-control form-control-md" readonly/>
                            </div>
                            <div class="mb-1">
                                <label class="form-label">Contraseña</label>
                                <div class="input-group" id="show_hide_password">
                                    <input  class="form-control border-end-0" id="passwordchange" type="password" name="passwordchange" placeholder="············"/><a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                </div>
                                <label class="form-label">Reingrese Contraseña</label>
                                <div class="input-group" id="show_hide_password">
                                    <input  class="form-control border-end-0" id="passwordchange2" type="password" name="passwordchange2" placeholder="············"/><a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                </div>
                            </div>
                        </div>        
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success" id="btnGuardaContrasena">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- End Modal para Cambiar Clave --}}


@endsection



