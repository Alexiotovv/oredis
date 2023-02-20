// $("#Prueba").on("click",function (e) {
//     e.preventDefault();

//     Swal.fire(
//         {
//         position: 'top-end',
//         icon: 'success',
//         title: "hola",
//         showConfirmButton: false,
//         timer: 1500}
//         )

// })

$("#btnRegistrar").on("click",function (e) { 
    e.preventDefault();
    ds=$("#formRegistro").serialize();
    ru='guardardiscapacitado';
    mje='Registro Guardado'
    GuardarRegistro(ds,ru,mje);
    // setTimeout( function() { window.location.href = "msjeregistrodiscapacitados"; }, 3000 );
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

$("#IngresarManualUbicacion").on("click",function (e) {
    $("#Latitud").prop('readonly',false);
    $("#Longitud").prop('readonly',false);
    $("#Altitud").prop('readonly',false);
    $("#Latitud").focus();
});

$("#btnBuscar").on("click",function(e){
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "consultadni/"+$("#nro_doc_identidad").val(),
        dataType: "json",
        success: function (response) {
            if (response.length>0) {
                $("#nro_doc_identidad").addClass('is-invalid');
                $("#btnRegistrar").prop('disabled',true);

            }else{
                $("#btnRegistrar").prop('disabled',false);
                $.ajax({
                    type: "GET",
                    url: "https://dniruc.apisperu.com/api/v1/dni/"+ $("#nro_doc_identidad").val() +"?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImFsZXhpb3RvdnZAZ21haWwuY29tIn0.lI0TpAOzB02VvEjL01-oofG-Zk9glBYVfE6gJ766H0M",
                    data: "json",
                    // dataType: "json",
                    beforeSend: function() {
                        $("#spinner").prop('hidden',false);
                    },
                    success: function (response) {
                        $("#nombres").val(response['nombres']);
                        $("#apellido_materno").val(response['apellidoMaterno']);
                        $("#apellido_paterno").val(response['apellidoPaterno']);
                        $("#spinner").prop('hidden',true);
                        
                    },
                    error: function (response) {  
                        $("#spinner").prop('hidden',true);
                        alert('error'+response);
                        
                    }
                });
            }
        }
    });


    
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

$("#nro_doc_identidad").on("keyup",function (e) { 
    if (($(this).val().length)>7) {
        $('#btnBuscar').prop('disabled',false);
    }else{
        $('#btnBuscar').prop('disabled',true);
        $("#nombres").val('');
        $("#apellido_paterno").val('');
        $("#apellido_materno").val('');
        $("#nro_doc_identidad").removeClass('is-invalid');
    }
});

$("#dni_apoderado").on("keyup",function (e) { 
    if (($(this).val().length)>7) {
        $('#btnBuscarApoderado').prop('disabled',false);
    }else{
        $('#btnBuscarApoderado').prop('disabled',true);
    }
});

$("#ocupacion").on("keyup",function (){
    $("#ocupacion").val($("#ocupacion").val().toUpperCase());    
})
var fecha = new Date();
document.getElementById("fecha_empadronamiento").value = fecha.toJSON().slice(0, 10);
document.getElementById("fecha_nacimiento").value = fecha.toJSON().slice(0, 10);