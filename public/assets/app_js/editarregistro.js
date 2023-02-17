$("#btnBuscarEditar").on('click', function(e) {
    e.preventDefault();
    dni=$("#nro_doc_identidad").val();
    $.ajax({
        type: "GET",
        url: "editardiscapacitado/"+dni,
        dataType: "json",
        beforeSend: function() {
            $("#spinner_editar").prop('hidden',false);
        }
        ,
        success: function (response) {
            if (response.length > 0) {
                $("#idPersona").val(response[0]. id);
                $("#nombre").val(response[0].nombre);
                $("#apellido_paterno").val(response[0].apellido_paterno);
                $("#apellido_materno").val(response[0].apellido_materno);
                $("#doc_identidad").val(response[0].doc_identidad);
                $("#nro_doc_identidad").val(response[0].nro_doc_identidad);
                $("#direccion").val(response[0].direccion);
                $("#distrito").val(response[0].distrito).change();
                $("#altitud").val(response[0].altitud);
                $("#longitud").val(response[0].longitud);
                $("#latitud").val(response[0].latitud);
                $("#correo").val(response[0].correo);
                $("#telefono").val(response[0].telefono);
                $("#fecha_nacimiento").val(response[0].fecha_nacimiento);
                $("#estado_civil").val(response[0].estado_civil).change();
                $("#sexo").val(response[0].sexo).change();
                $("#ocupacion").val(response[0].ocupacion);
                $("#grado_instruccion").val(response[0].grado_instruccion);
                $("#flag_certifi_discapacidad").val(response[0].flag_certifi_discapacidad);
                $("#tipo_discapacidad").val(response[0].tipo_discapacidad);
                $("#diagnostico_discapacidad").val(response[0].diagnostico_discapacidad );
                EstadoRadioButton("requiere_ayudaRadio1","requiere_ayudaRadio2",response[0].requiere_ayuda)
                EstadoRadioButton("tipo_ayudaRadio1","tipo_ayudaRadio2",response[0].tipo_ayuda)
                $("#ayuda_mecanica").val(response[0].ayuda_mecanica).change();
                $("#nombre_apoderado").val(response[0].nombre_apoderado);
                $("#dni_apoderado").val(response[0].dni_apoderado);
                $("#parentesco").val(response[0].parentesco);
                $("#direccion_apoderado").val(response[0].direccion_apoderado);
                $("#correo_apoderado").val(response[0].correo_apoderado);
                $("#telefono_apoderado").val(response[0].telefono_apoderado);
                $("#tipo_seguro").val(response[0].tipo_seguro).change();
                EstadoRadioButton("seguro_saludRadio1","seguro_saludRadio2",response[0].seguro_salud);
                $("#fecha_empadronamiento").val(response[0].fecha_empadronamiento);
                $("#flg_carnet_did").val(response[0].flg_carnet_did);

                $("#dni_no_encontrado").prop('hidden',true);
                $("#dni_encontrado").prop('hidden',false);
                $("#nro_doc_identidad").removeClass('is-invalid');
                $("#nro_doc_identidad").addClass('is-valid');
                $("#spinner_editar").prop('hidden',true);
            }else{
                $("#nro_doc_identidad").removeClass('is-valid');
                $("#nro_doc_identidad").addClass('is-invalid');
                $("#dni_no_encontrado").prop('hidden',false);
                $("#dni_encontrado").prop('hidden',true);
                $("#spinner_editar").prop('hidden',true);
            }
                   
        }
    });
});

function EstadoRadioButton(rb1,rb2,src){
    if (src=='SI') {
        $("#"+ rb1 +"").prop('checked',true);
    }else{
        $("#"+ rb2 +"").prop('checked',true);    
    }

}
$("#dni_apoderado").on("keyup",function (e) { 
    if (($(this).val().length)>7) {
        $('#btnBuscarApoderado').prop('disabled',false);
    }else{
        $('#btnBuscarApoderado').prop('disabled',true);
    }
});

$("#btnEnviar").on("click",function (e) {
    e.preventDefault();
    ds=$("#registro").serialize();
    ru='actualizardiscapacitado';
    mje='Registro Actualizado'
    dt='';
    GuardarRegistro(ds,ru,mje,dt);

    setTimeout( function() { window.location.href = "msjeregistrodiscapacitados"; }, 500 );
});
$("#btnBuscarApoderado").on("click",function(e){
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "https://dniruc.apisperu.com/api/v1/dni/"+ $("#dni_apoderado").val() +"?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFsZXhpb3RvdnZAZ21haWwuY29tIn0.lI0TpAOzB02VvEjL01-oofG-Zk9glBYVfE6gJ766H0M",
        data: "json",
        // dataType: "json",
        beforeSend: function() {
            $("#spinner_apoderado").prop('hidden',false);
        }
        ,
        success: function (response) {
            $("#nombre_apoderado").val(
                response['nombres']+ " " + 
                response['apellidoPaterno'] + " " + 
                response['apellidoMaterno']);

            $("#spinner_apoderado").prop('hidden',true);
        },
        error: function (response) {  
            $("#spinner_apoderado").prop('hidden',true);
        }
    });
});

$("#IngresarManualUbicacion").on("click",function (e) {
    $("#latitud").prop('readonly',false);
    $("#longitud").prop('readonly',false);
    $("#altitud").prop('readonly',false);
    $("#latitud").focus();
});

$("#ObtenerUbicacion").on("click",function (e) {
    e.preventDefault();
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(posicion,error,options);

    }else{
        alert("No puedes acceder a la ubicación");
    }
});
var options={
    EnableHighAccuracy:true,
    Timeout:500,
    MaximunAge:0
}

function error(err){
    alert(err);
}

function posicion(geolocationPosition) {  
    let coords=geolocationPosition.coords;
    $("#latitud").val(coords.latitude);
    $("#longitud").val(coords.longitude);
    $("#altitud").val(coords.altitude);
    $("#latitud").prop('readonly',true);
    $("#longitud").prop('readonly',true);
    $("#altitud").prop('readonly',true);
}

// $("#btnEncontrarPersona").on("click",function (e){
//     e.preventDefault();
//     dni=$("#dni_buscar").val();
    
//     $.ajax({
//         type: "GET",
//         url: "consultadni/"+dni,
//         dataType: "json",
//         success: function (response) {
//             if (response.length > 0){
//                 setTimeout( function() { window.location.href = "editardiscapacitado/"+response[0].id; }, 200 );
//             }else{
//                 $("#dni_buscar").addClass('is-invalid');
//                 $("#validationServer03Feedback").prop('hidden',false);
//             }

//         },
//         error: function (param) {
                        
//         }
//     });
// });
