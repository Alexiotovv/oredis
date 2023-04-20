
distritos={}

$.ajax({
    type: "GET",
    url: "/obtenerdistritos",
    dataType: "json",
    success: function (response) {
        distritos=response;
    }
});

$(document).on("click",".btnSeleccionar",function (e) {
    e.preventDefault();
    fila = $(this).closest("tr");
    $("#iddiscapacitado").val((fila).find('td:eq(0)').text());
    $("#dni").val((fila).find('td:eq(2)').text());
    $("#nombre").val((fila).find('td:eq(3)').text()+" "+(fila).find('td:eq(4)').text()+" "+(fila).find('td:eq(5)').text());
    $("#modalbuscarpornombre").modal("hide");
});

$("#txtbuscarnombre").on("keyup",function (e){
    buscarPersonaNombres();
});
$("#txtbuscarapellidopat").on("keyup",function (e){
    buscarPersonaNombres();
});
$("#txtbuscarapellidomat").on("keyup",function (e){
    buscarPersonaNombres();
});
function buscarPersonaNombres() { 
    nombre=$("#txtbuscarnombre").val();
    apepat=$("#txtbuscarapellidopat").val();
    apemat=$("#txtbuscarapellidomat").val();
    if (nombre.trim()=='') {
        nombre="%";
    }
    if (apepat.trim()=='') {
        apepat="%";
    }
    if (apemat.trim()=='') {
        apemat="%";
    }
    
    $.ajax({
        type: "GET",
        url: "/socios/buscar/nombre/"+nombre+"/apepat/"+apepat+"/apemat/"+apemat,
        dataType: "json",
        beforeSend: function() {
            $("#spinner_buscar_nombre").prop('hidden',false);
        }, 
        success: function (response) {
            $("#DTBuscarSocio tbody").html("");
            response.forEach(element => {
                $("#DTBuscarSocio").append('<tr>'+
                '<td>'+element.id+'</td>'+
                '<td><button class="btn btn-warning btn-sm btnSeleccionar"><i class="bx bx-plus"></i></button></td>'+
                '<td>'+element.nro_doc_identidad+'</td>'+
                '<td>'+element.nombre+'</td>'+
                '<td>'+element.apellido_paterno+'</td>'+
                '<td>'+element.apellido_materno+'</td>'+
                '<td>'+element.provincia+'</td>'+
                '<td>'+element.distrito+'</td>'+
                '<td>'+element.direccion+'</td>'+
                '<td>'+element.numero+'</td>'+
                '</tr>');
            });
            $("#spinner_buscar_nombre").prop('hidden',true);
        }

    });
 }

$("#SinDocumento").on("click",function (e){
    e.preventDefault();
    $("#modalbuscarpornombre").modal("show");
});

$("#btnbuscarsocio").on("click",function (e) {
    var dni=$("#dni").val();
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "/socios/buscar/"+dni,
        dataType: "json",
        beforeSend: function() {
            $("#spinner").prop('hidden',false);
        },
        success: function (response) {
            $("#nombre").val(response[0].nombre + " " + 
                response[0].apellido_paterno + " " + 
                response[0].apellido_materno)
                $("#spinner").prop('hidden',true);
            $("#iddiscapacitado").val(response[0].id);
        },
        error: function (response) {  
            $("#spinner").prop('hidden',true);
            alert('error '+response);
        }
    });
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
    //ocultamos las casillas de agregar personas
    $("#ocultar_campos").prop("hidden",true);
    $.ajax({
        type: "GET",
        url: "/socios/edit/"+id,
        dataType: "json",
        success: function (response) {
            $("#nombre").val((fila).find('td:eq(2)').text()+" "+(fila).find('td:eq(3)').text()+ " " +(fila).find('td:eq(4)').text());
            $("#tipo_socio").val(response.tipo_socio);
            $("#status").val(response.status);
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
    mdNombre = (fila).find('td:eq(5)').text();
    mdSiglas=(fila).find('td:eq(6)').text();
    mdNPartida=(fila).find('td:eq(7)').text();
    mdDireccion=(fila).find('td:eq(8)').text();
    mdCelular=(fila).find('td:eq(9)').text();
    mdCorreo=(fila).find('td:eq(10)').text();

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
            {data:'nombre'},
            {data:'apellido_paterno'},
            {data:'apellido_materno'},
            {data:'tipo_socio'},
            {data:'telefono'},
            {data:'correo'},
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
    $("#nombre").val("");
    $("#ocultar_campos").prop("hidden",false);
    
    $("#IdAsociacionSocio").val(id);
    $("#etiquetaSocio").text('Registrar Socio');
    $("#modalSocio").modal('show');
})


$("#btnGuardaSocio").on("click",function (e) { 
    e.preventDefault();
    
    
        ds=$("#fomrSocio").serialize();
        dt="";
        if ($("#etiquetaSocio").text()=='Registrar Socio') {
            if ($("#iddiscapacitado").val()=="") {
                alert("Seleccione una persona por dni o por nombre");
            }else{
                ru="/socios/store";
                mje="Socio Registrado";
                dt="#DTAsociaciones";
                GuardarRegistro(ds,ru,mje,dt);
                $("#modalSocio").modal('hide');
            }
            
        }else{
            ru="/socios/update";
            mje="Socio Actualizado";
            dt="#DTListaSocios";
            GuardarRegistro(ds,ru,mje,dt);
            $("#modalSocio").modal('hide');
        }
        
    
 })

function LimpiarformSocio() { 
    // $("#nombre_socio").val('');
    // $("#apellido_socio").val('');
    // $("#celular_socio").val('');
    // $("#correo_socio").val('');
    
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
        // {data: '-',
        //     render: function ( data, type, row ) {
        //         if (row.nombre==null) {
        //             return ' ';
        //         }else{
        //             return row.nombre +row.apellido_paterno + ' ' + row.apellido_materno;
        //         }
        //     }
        // },
        // {data:'tipo_socio'},
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