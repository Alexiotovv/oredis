<div class="modal fade" tabindex="-1" id="modalbuscarpornombre">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Buscar Persona</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Ingrese Nombres</label>
                    <input type="text" class="form form-control" id="txtbuscarnombre" name="txtbuscarnombre">
                </div>
                <div class="col-md-4">
                    <label for="">Ingrese Apellido Paterno</label>
                    <input type="text" class="form form-control" id="txtbuscarapellidopat" name="txtbuscarapellidopat">
                </div>
                <div class="col-md-4">
                    <label for="">Ingrese Apellido Materno</label>
                    <input type="text" class="form form-control" id="txtbuscarapellidomat" name="txtbuscarapellidomat">
                </div>
            </div>
            <div class="text-center" id="spinner_buscar_nombre" hidden style="position: absolute;">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="DTBuscarSocio">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>seleccionar</th>
                            <th>dni</th>
                            <th>nombre</th>
                            <th>apellido_peterno</th>
                            <th>apellido_materno</th>
                            <th>provincia</th>
                            <th>distrito</th>
                            <th>direccion</th>
                            <th>numero</th>
                        </tr>
                    </thead>
                    <tbody>
    
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
    </div>

