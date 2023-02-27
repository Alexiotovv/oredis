distritos={}
$.ajax({
    type: "GET",
    url: "obtenerdistritos",
    dataType: "json",
    success: function (response) {
        distritos=response;
    }
});

$("#distrito").on('change', function() {
    distritos.forEach(element => {
        if (element.id==$("#distrito").val()) {
            $("#provincia").val(element.provincia).change();
        }
    });
});

$("#btnVerInfo").on("click",function (e) {
    e.preventDefault();
    $("#cardInfo").css({'margin-right':'0px'});
    
})
$("#btnCerrarCard").on("click",function (e) {
    e.preventDefault();
    $("#cardInfo").css({'margin-right':'-410px'});
})

$("#btnRegistrar").on("click",function (e) { 
    if ($("#nro_doc_identidad").val()=="" || $("#direccion").val()=="" ||$("#telefono").val()=="" ){
        //que haga su trabajo los mensajea de html de cada input
    }else{
        e.preventDefault();
        ds=$("#formRegistro").serialize();
        ru='guardardiscapacitado';
        mje='Registro Guardado'
        GuardarRegistro(ds,ru,mje);
        // setTimeout( function() { window.location.href = "msjeregistrodiscapacitados"; }, 3000 );
    }
});

$("#btnBuscar").on("click",function(e){
    
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "consultadni/"+$("#nro_doc_identidad").val(),
        dataType: "json",
        success: function (response) {
            if (response.discapacitados.length>0) {
                
                $("#nro_doc_identidad").addClass('is-invalid');
                $("#btnRegistrar").prop('disabled',true);
                //datos de la persona     
                $("#findDNI").val(response.discapacitados[0].nro_doc_identidad);
                $("#findNombre").val(response.discapacitados[0].nombre);
                $("#findPaterno").val(response.discapacitados[0].apellido_paterno);
                $("#findMaterno").val(response.discapacitados[0].apellido_materno);
                
                //sus direcciones
                $("#DTDomicilios tbody").html('');

                response.direcciones.forEach(element => {
                    // console.log(element.id);
                    if (element.activo) {
                        color='style ="background-color: #aef0af;"';
                        }else{color=""}
                    $("#DTDomicilios").append('<tr '+ color +'>'+
                        '<td>'+ element.provincia +'</td>'+
                        '<td>'+ element.distrito +'</td>'+
                        '<td>'+ element.direccion + element.numero +'</td>'+
                        '<td>'+ element.activo +'</td>'+
                        '</tr>');

                    });
                
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