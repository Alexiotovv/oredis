
distritos={}

$.ajax({
    type: "GET",
    url: "/obtenerdistritos",
    dataType: "json",
    success: function (response) {
        distritos=response;
    }
});



$(document).on("click",".btnEliminarSocio",function (e) { 
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    ru="/socios/destroy/"+id;
    mje="Socio Eliminado";
    dt="#DTListaSocios";
    ru_despues="";
    EliminarRegistro(ru,mje,dt,ru_despues)
 })

$(document).on("click",".btnEditarSocio",function (e) { 
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $.ajax({
        type: "GET",
        url: "/socios/edit/"+id,
        dataType: "json",
        success: function (response) {
            $("#nombre_socio").val(response.nombre_socio);
            $("#apellido_socio").val(response.apellido_socio);
            $("#tipo_socio").val(response.tipo_socio);
            $("#celular_socio").val(response.celular_socio);
            $("#correo_socio").val(response.correo_socio);
            $("#tipo_discapacidad").val(response.tipo_discapacidad);
        }
    });

    $("#IdSocio").val(id);
    $("#etiquetaSocio").text('Editar Socio');
    $("#modalSocio").modal('show');
 })

$(document).on("click",".btnListarsocios",function (e) { 
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    
    mdDistrito = (fila).find('td:eq(2)').text();
    mdProvincia = (fila).find('td:eq(3)').text();
    mdNombre = (fila).find('td:eq(4)').text();
    mdSiglas=(fila).find('td:eq(5)').text();
    mdNPartida=(fila).find('td:eq(6)').text();
    mdDireccion=(fila).find('td:eq(7)').text();
    mdCelular=(fila).find('td:eq(8)').text();
    mdCorreo=(fila).find('td:eq(9)').text();

    $("#mdProvincia").val(mdProvincia);
    $("#mdDistrito").val(mdDistrito);
    $("#mdNombre").val(mdNombre);
    $("#mdSiglas").val(mdSiglas);
    $("#mdNPartida").val(mdNPartida);
    $("#mdDireccion").val(mdDireccion);
    $("#mdCelular").val(mdCelular);
    $("#mdCorreo").val(mdCorreo);

    $("#DTListaSocios").DataTable({
        "destroy":true,
        "method":"GET",
        "ajax":"/socios/show/"+id,
        "columns":[
            {data:'id'},
            { "defaultContent": 
            "<button class='btn btn-icon btn-outline-warning btnEditarSocio'><i class='fadeIn animated bx bx-pencil'></i></button>\
            <button class='btn btn-outline-danger btnEliminarSocio'><i class='fadeIn animated bx bx-trash'></i></button>"},
            {data:'nombre_socio'},
            {data:'apellido_socio'},
            {data:'tipo_socio'},
            {data:'celular_socio'},
            {data:'correo_socio'},
            {data:'tipo_discapacidad'},
        ],order:[0],
        buttons:[],
        dom: 'Bfrtip',
    });
    $("#etiquetaListarSocio").text('Socios Registrados');
    $("#modalListarSocios").modal('show');
})

$(document).on("click",".btnAgregarsocio",function (e) {
    e.preventDefault();
    LimpiarformSocio();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $("#IdAsociacionSocio").val(id);
    $("#etiquetaSocio").text('Registrar Socio');
    $("#modalSocio").modal('show');
})


$("#btnGuardaSocio").on("click",function (e) { 
    e.preventDefault();
    ds=$("#fomrSocio").serialize();
    
    dt="";
    if ($("#etiquetaSocio").text()=='Registrar Socio') {
        ru="/socios/store";
        mje="Socio Registrado";    
    }else{
        ru="/socios/update";
        mje="Socio Actualizado";
        dt="#DTListaSocios";
    }
    GuardarRegistro(ds,ru,mje,dt);
    $("#modalSocio").modal('hide');
 })

function LimpiarformSocio() { 
    $("#nombre_socio").val('');
    $("#apellido_socio").val('');
    $("#celular_socio").val('');
    $("#correo_socio").val('');
    
}

$("#DTAsociaciones").DataTable({
    "destroy":true,
    "ajax":"/asociaciones/show",
    "method":"GET",
    "columns":[
        {data:'id'},
        { "defaultContent": "<button class='btn btn-icon btn-outline-warning btnEditarAsociacion'><i class='fadeIn animated bx bx-pencil'></i></button>\
        <button class='btn btn-outline-danger btnEliminarAsociacion'><i class='fadeIn animated bx bx-trash'></i></button>\
        <button class='btn btn-outline-success btnAgregarsocio'><i class='fadeIn animated bx bx-user-plus'></i></button>\
        <button class='btn btn-outline-primary btnListarsocios'><i class='fadeIn animated bx bx-list-ol'></i></button>"},
        {data:'provincia'},
        {data:'distrito'},
        {data:'nombre_organizacion'},
        {data:'siglas_asociacion'},
        {data:'partida_registral'},
        {data:'direccion'},
        {data:'celular'},
        {data:'correo'},
        {data:'status'},
    ],order:[0],
    buttons:['excel','pdf'],
    dom: 'Bfrtip',
})

$("#btnNuevo").on("click",function (e) {
    e.preventDefault();
    $("#etiquetaAsociacion").text('Registro Asociación');
    $("#modalAsociacion").modal('show');
})
$(document).on("click",".btnEditarAsociacion",function (e) { 
    e.preventDefault();
    $("#etiquetaAsociacion").text('Editar Asociación');
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $("#idAsociacion").val(id);

    $.ajax({
        type: "GET",
        url: "/asociaciones/edit/"+id,
        dataType: "json",
        success: function (response) {
            
            $("#idAsociacion").val(response.id);
            $("#distrito").val(response.idUbigeos).change();
            $("#nombre_organizacion").val(response.nombre_organizacion);
            $("#siglas_asociacion").val(response.siglas_asociacion);
            $("#partida_registral").val(response.partida_registral);
            $("#direccion").val(response.direccion);
            $("#celular").val(response.celular);
            $("#correo").val(response.correo);
        }
    });
    $("#modalAsociacion").modal('show');

 })

$("#btnGuardarAsociacion").on("click",function (e) { 
    e.preventDefault();
    ds=$("#formAsociacion").serialize();
    if ($("#etiquetaAsociacion").text()=='Registro Asociación') {
        ru="/asociaciones/store";
        mje="Registro Guardado";
    }else{
        ru="/asociaciones/update";
        mje="Registro Actualizado";
    }
    dt="#DTAsociaciones";
    GuardarRegistro(ds,ru,mje,dt);
    $("#modalAsociacion").modal('hide');
 })

$(document).on("click",".btnEliminarAsociacion",function (e) { 
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    ru="/asociaciones/destroy/"+id;
    mje="Registro Eliminado";
    dt="#DTAsociaciones";
    EliminarRegistro(ru,mje,dt,'');
    $("#modalAsociacion").modal('hide');
 })

$("#distrito").on('change', function() {
    distritos.forEach(element => {
        if (element.id==$("#distrito").val()) {
            $("#provincia").val(element.provincia).change();
        }
    });
});