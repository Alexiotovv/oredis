$("#IngresoManualApoderado").on("click",function () { 
  if ($("#IngresoManualApoderado").prop('checked')){
      $("#nombre_apoderado").attr('readonly', false);
      $("#apellido_apoderado").attr('readonly', false);
  }else{
      $("#nombre_apoderado").attr('readonly', true);
      $("#apellido_apoderado").attr('readonly', true);
  }

  $("#dni_apoderado").focus();
})

$("#btnGuardarApoderado").on("click",function (e) {
  e.preventDefault();
  ds=$("#formApoderados").serialize();
  if ($("#etiquetaApoderados").text()=='Nuevo Apoderado') {
    ruta="/apoderados/guardar";
    // console.log("entro a guardar");
  }else{
    ruta="/apoderados/actualizar";
  }


  $.ajax({
    type: "POST",
    url: ruta,
    data: ds,
    dataType: "json",
    beforeSend: function() {
      $("#spinner_guardar_apoderado").prop('hidden',false);
    },
    success: function (response) {
      round_success_noti("Registro Guardado");
      $("#spinner_guardar_apoderado").prop('hidden',true);
    },
    error: function (response) {
      round_error_noti("Se produjo un error");
      $("#spinner_guardar_apoderado").prop('hidden',true);
      
  }
  });

  id=$("#idPersonaApoderado").val();
  $.ajax({
    type: "GET",
    url: "/apoderados/listar/"+id,
    dataType: "json",
    success: function (response) {
      $("#DTApoderados tbody").html("");
        
      response.forEach(element => {
          if (element.status) {
            estado='Activo';  
          }else{
            estado='Inactivo';  
          }

          $("#DTApoderados").append("<tr>"+
            "<td>"+ element.id +"</td>"+
            "<td>"+'<button class="btn btn-outline-warning btn-sm btnEditarApoderado"><i class="lni lni-pencil"></i></button>' +"</td>"+
            "<td>"+ element.dni +"</td>"+
            "<td>"+ element.nombres +"</td>"+
            "<td>"+ element.apellidos +"</td>"+
            "<td>"+ element.direccion +"</td>"+
            "<td>"+ element.parentesco +"</td>"+
            "<td>"+ element.correo +"</td>"+
            "<td>"+ element.telefono +"</td>"+
            "<td>"+ estado +"</td>"+
          "</tr>");
        });
    }
  });


  $("#modalApoderados").modal('hide');
})

$("#btnNuevoApoderado").on("click",function (e) {
  e.preventDefault();
  $("#idApoderado").val('');
  $("#dni_apoderado").val('');
  $("#nombre_apoderado").val('');
  $("#apellido_apoderado").val('');
  $("#direccion_apoderado").val('');
  $("#parentesco").val('');
  $("#correo_apoderado").val('');
  $("#telefono_apoderado").val('');
  $("#etiquetaApoderados").text('Nuevo Apoderado');
  
  $("#modalApoderados").modal('show');
  
})


$("#formActualiza").keypress(function(e) {
    if (e.which == 13) {
        return false;
    }
});
//end Buscar el distrito y comparar el discapacitado

distritos={};
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

function EstadoCarnet(){
  var fecha = new Date();
  fecha_hoy = fecha.toJSON().slice(0, 10);
  if ($("#fecha_caducidad_carnet").val()=='') {
    $("#EstadoCarnet").removeClass('btn btn-danger');
      $("#EstadoCarnet").removeClass('btn btn-success');
      $("#EstadoCarnet").addClass('btn btn-secondary');
      $("#EstadoCarnet").text('N/A');
  }else{
    if (fecha_hoy>$("#fecha_caducidad_carnet").val()) {
      $("#EstadoCarnet").removeClass('btn btn-success');
      $("#EstadoCarnet").addClass('btn btn-danger');
      $("#EstadoCarnet").text('Expiró');
    }else{
      $("#EstadoCarnet").removeClass('btn btn-danger');
      $("#EstadoCarnet").addClass('btn btn-success');
      $("#EstadoCarnet").text('Vigente');     
    }
  }
}

$(document).on("click",".btnSeleccionar",function (e) {
  e.preventDefault();
  fila = $(this).closest("tr");
  id= (fila).find('td:eq(0)').text();
  $.ajax({
      type: "GET",
      url: "/persona/buscarporid/"+id,
      dataType: "json",
      success: function (response) {
            $("#idPersonaDireccion").val(response.discapacitados[0].id);//Input del form Direccion
            $("#idPersonaApoderado").val(response.discapacitados[0].id);//Input del form Apoderados
            $("#idPersona").val(response.discapacitados[0].id);
            $("#nro_doc_identidad").val(response.discapacitados[0].nro_doc_identidad);
            $("#nombre").val(response.discapacitados[0].nombre);
            $("#apellido_paterno").val(response.discapacitados[0].apellido_paterno);
            $("#apellido_materno").val(response.discapacitados[0].apellido_materno);
            $("#doc_identidad").val(response.discapacitados[0].doc_identidad).change();
            $("#fecha_caducidad_carnet").val(response.discapacitados[0].fecha_caducidad_carnet);
            $("#correo").val(response.discapacitados[0].correo);
            $("#telefono").val(response.discapacitados[0].telefono);
            $("#fecha_nacimiento").val(response.discapacitados[0].fecha_nacimiento);
            $("#estado_civil").val(response.discapacitados[0].estado_civil).change();
            $("#sexo").val(response.discapacitados[0].sexo).change();
            $("#ocupacion").val(response.discapacitados[0].ocupacion);
            $("#grado_instruccion").val(response.discapacitados[0].grado_instruccion);
            $("#flag_certifi_discapacidad").val(response.discapacitados[0].flag_certifi_discapacidad).change();
            $("#tipo_discapacidad").val(response.discapacitados[0].tipo_discapacidad).change();
            $("#diagnostico_discapacidad").val(response.discapacitados[0].diagnostico_discapacidad).change();
            //RecibirRadio(nombre del elemento, valor guardado que viene, valor del primer radio);
            RecibirRadio("requiere_ayuda",response.discapacitados[0].requiere_ayuda,'SI');
            RecibirRadio("tipo_ayuda",response.discapacitados[0].tipo_ayuda,'FISICA');
            $("#ayuda_mecanica").val(response.discapacitados[0].ayuda_mecanica).change();
            // $("#nombre_apoderado").val(response.discapacitados[0].nombre_apoderado);
            // $("#dni_apoderado").val(response.discapacitados[0].dni_apoderado);
            // $("#parentesco").val(response.discapacitados[0].parentesco).change();
            // $("#direccion_apoderado").val(response.discapacitados[0].direccion_apoderado);
            // $("#correo_apoderado").val(response.discapacitados[0].correo_apoderado);
            // $("#telefono_apoderado").val(response.discapacitados[0].telefono_apoderado);
            $("#tipo_seguro").val(response.discapacitados[0].tipo_seguro).change();
            $("#seguro_salud").val(response.discapacitados[0].seguro_salud);
            $("#flg_carnet_did").val(response.discapacitados[0].flg_carnet_did);
            $("#fecha_empadronamiento").val(response.discapacitados[0].fecha_empadronamiento);
            $("#comentario").val(response.discapacitados[0].comentario);
            //poniendo en la tabla sus direcciones
            ObtenerDirecciones(response.discapacitados[0].id);
            $("#nro_doc_identidad").removeClass('is-valid')
            $("#modalbuscarpornombre").modal("hide");

            $("#DTApoderados tbody").html("");
            response.apoderados.forEach(element => {
              if (element.status) {
                estado='Activo';
              }else{
                estado='Inactivo';
              }
              $("#DTApoderados").append("<tr>"+
                "<td>"+ element.id +"</td>"+
                "<td>"+'<button class="btn btn-outline-warning btn-sm btnEditarApoderado"><i class="lni lni-pencil"></i></button>' +"</td>"+
                "<td>"+ element.dni +"</td>"+
                "<td>"+ element.nombres +"</td>"+
                "<td>"+ element.apellidos +"</td>"+
                "<td>"+ element.direccion +"</td>"+
                "<td>"+ element.parentesco +"</td>"+
                "<td>"+ element.correo +"</td>"+
                "<td>"+ element.telefono +"</td>"+
                "<td>"+ estado  +"</td>"+
              "</tr>");
            });
            EstadoCarnet();


      }
  });
});



$("#SinDocumento").on("click",function (e) {
  e.preventDefault();
  $("#modalbuscarpornombre").modal("show");
})

$("#txtbuscarnombre").on("keyup",function (e){
  buscarPersonaNombres();
});
$("#txtbuscarapellidopat").on("keyup",function (e){
  buscarPersonaNombres();
});
$("#txtbuscarapellidomat").on("keyup",function (e){
  buscarPersonaNombres();
});


function buscarPersonaNombres(){
  nombre=$("#txtbuscarnombre").val();
    apepat=$("#txtbuscarapellidopat").val();
    apemat=$("#txtbuscarapellidomat").val();
    if (nombre.trim()=='') {
        nombre="-";
    }
    if (apepat.trim()=='') {
        apepat="-";
    }
    if (apemat.trim()=='') {
        apemat="-";
    }

    $.ajax({
        type: "GET",
        url: "/socios/buscarnombre/"+nombre+"/"+apepat+"/"+apemat,
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
};

// module.exports {buscarPersonaNombres} ;


$(document).on('click','.btnEditarDireccion', function(e) {
  e.preventDefault();
  fila = $(this).closest("tr");
  id = (fila).find('td:eq(0)').text();
  
  $.ajax({
    type: "GET",
    url: "editardireccion/"+id,
    dataType: "json",
    success: function (response) {
      
      $("#idDireccion").val(response[0].id);
      $("#provincia").val(response[0].provincia).change();
      $("#distrito").val(response[0].distritoId).change();
      $("#direccion").val(response[0].direccion);
      $("#numero").val(response[0].numero);
      $("#activo").val(response[0].activo).change();
    }
  });


  $("#idDireccion").val(id);
  $("#etiquetaDirecciones").text('Editar Dirección');
  $("#modalDirecciones").modal('show');
});



$(document).on('click','.btnEditarApoderado', function(e) {
  e.preventDefault();
  fila = $(this).closest("tr");
  id = (fila).find('td:eq(0)').text();
  
  $.ajax({
    type: "GET",
    url: "/apoderados/editar/"+id,
    dataType: "json",
    success: function (response) {
      // $("idPersonaApoderado").val(response.idDisc);
      $("#idApoderado").val(response.id);
      $("#dni_apoderado").val(response.dni);
      $("#nombre_apoderado").val(response.nombres);
      $("#apellido_apoderado").val(response.apellidos);
      $("#direccion_apoderado").val(response.direccion);
      $("#parentesco").val(response.parentesco);
      $("#correo_apoderado").val(response.correo);
      $("#telefono_apoderado").val(response.telefono);
      $("#status").val(response.status).change();

    }
  });


  $("#iApoderado").val(id);
  $("#etiquetaApoderados").text('Editar Apoderado');
  $("#modalApoderados").modal('show');
});




$("#btnGuardarDireccion").on("click",function (e) {
  e.preventDefault();
  ds=$("#formDirecciones").serialize();
  $("#modalDirecciones").modal('hide');

  if ($("#etiquetaDirecciones").text()=='Nueva Dirección') {
    mje='Domicilio Registrado';
    ru='guardardireccion'; 
    GuardarDireccion(ds,ru,mje);
    ObtenerDirecciones($("#idPersonaDireccion").val());
  }else{
    mje='Domicilio Actualizado';
    ru='actualizardireccion'; 
    GuardarDireccion(ds,ru,mje);
    ObtenerDirecciones($("#idPersonaDireccion").val());
  }
    
});

$("#btnNuevaDireccion").on('click', function(e) {
  e.preventDefault();
  $("#etiquetaDirecciones").text('Nueva Dirección');
  $("#direccion").val('');
  $("#numero").val('');
  $("#distrito").val('--').change();
  $("#provincia").val('--').change();
  $("#provincia").val(1).change();
  $("#modalDirecciones").modal('show');
});

$("#btnEnviar").on("click",function (e) {
  e.preventDefault();
  if ($("#telefono").val()==""){
    alert("Ingrese un telefono");
  }else{
    ds=$("#formActualiza").serialize();
    ru='actualizardiscapacitado';
    mje='Registro Actualizado'
    GuardarRegistro(ds,ru,mje,"");
    // setTimeout( function() { window.location.href = "msjeregistrodiscapacitados"; }, 3000 );
  }
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

// $("#EstadoCarnet").on("click",function (e) { 
//   e.preventDefault();
//   var fecha = new Date();
//   fecha_hoy = fecha.toJSON().slice(0, 10);
//   if (fecha_hoy<$("#fecha_caducidad_carnet").val()) {
//     alert("vigente");
//   }else{
//     alert("expiró");
//   }
// })


$("#btnBuscarEditar").on("click",function(e){
  e.preventDefault();
  if ($("#nro_doc_identidad").val().trim()==="") {
      alert("Ingrese un DNI para buscar");
  }else{
    $.ajax({
      type: "GET",
      url: "consultadni/"+$("#nro_doc_identidad").val(),
      dataType: "json",
      success: function (response) {
          if (response.discapacitados.length>0) {
            $.ajax({
              type: "GET",
              url: "editardiscapacitado/"+$("#nro_doc_identidad").val(),
              dataType: "json",
              success: function (response) {
                $("#idPersonaDireccion").val(response.discapacitados[0].id);//Input del form Direccion
                $("#idPersonaApoderado").val(response.discapacitados[0].id);//Input del form Apoderados
                $("#idPersona").val(response.discapacitados[0].id);
                $("#nro_doc_identidad").addClass('is-valid')
                $("#dni_encontrado").show();
                $("#dni_noencontrado").hide();
  
                $("#nombre").val(response.discapacitados[0].nombre);
                $("#apellido_paterno").val(response.discapacitados[0].apellido_paterno);
                $("#apellido_materno").val(response.discapacitados[0].apellido_materno);
                $("#doc_identidad").val(response.discapacitados[0].doc_identidad).change();
                $("#fecha_caducidad_carnet").val(response.discapacitados[0].fecha_caducidad_carnet);

                $("#correo").val(response.discapacitados[0].correo);
                $("#telefono").val(response.discapacitados[0].telefono);
                $("#fecha_nacimiento").val(response.discapacitados[0].fecha_nacimiento);
                $("#estado_civil").val(response.discapacitados[0].estado_civil).change();
                $("#sexo").val(response.discapacitados[0].sexo).change();
                $("#ocupacion").val(response.discapacitados[0].ocupacion);
                $("#grado_instruccion").val(response.discapacitados[0].grado_instruccion);
                $("#flag_certifi_discapacidad").val(response.discapacitados[0].flag_certifi_discapacidad).change();
                $("#tipo_discapacidad").val(response.discapacitados[0].tipo_discapacidad).change();
                $("#diagnostico_discapacidad").val(response.discapacitados[0].diagnostico_discapacidad).change();
                //RecibirRadio(nombre del elemento, valor guardado que viene, valor del primer radio);
                RecibirRadio("requiere_ayuda",response.discapacitados[0].requiere_ayuda,'SI');
                RecibirRadio("tipo_ayuda",response.discapacitados[0].tipo_ayuda,'FISICA');
                $("#ayuda_mecanica").val(response.discapacitados[0].ayuda_mecanica).change();
                // $("#nombre_apoderado").val(response.discapacitados[0].nombre_apoderado);
                // $("#dni_apoderado").val(response.discapacitados[0].dni_apoderado);
                // $("#parentesco").val(response.discapacitados[0].parentesco).change();
                // $("#direccion_apoderado").val(response.discapacitados[0].direccion_apoderado);
                // $("#correo_apoderado").val(response.discapacitados[0].correo_apoderado);
                // $("#telefono_apoderado").val(response.discapacitados[0].telefono_apoderado);
                $("#tipo_seguro").val(response.discapacitados[0].tipo_seguro).change();
                $("#seguro_salud").val(response.discapacitados[0].seguro_salud);
                $("#flg_carnet_did").val(response.discapacitados[0].flg_carnet_did);
                $("#fecha_empadronamiento").val(response.discapacitados[0].fecha_empadronamiento);
                $("#comentario").val(response.discapacitados[0].comentario);
                //poniendo en la tabla sus direcciones
                ObtenerDirecciones(response.discapacitados[0].id);
                $("#DTApoderados tbody").html("");
                response.apoderados.forEach(element => {
                  if (element.status) {
                    estado='Activo';
                  }else{
                    estado='Inactivo';
                  }

                  $("#DTApoderados").append("<tr>"+
                    "<td>"+ element.id +"</td>"+
                    "<td>"+'<button class="btn btn-outline-warning btn-sm btnEditarApoderado"><i class="lni lni-pencil"></i></button>' +"</td>"+
                    "<td>"+ element.dni +"</td>"+
                    "<td>"+ element.nombres +"</td>"+
                    "<td>"+ element.apellidos +"</td>"+
                    "<td>"+ element.direccion +"</td>"+
                    "<td>"+ element.parentesco +"</td>"+
                    "<td>"+ element.correo +"</td>"+
                    "<td>"+ element.telefono +"</td>"+
                    "<td>"+ estado +"</td>"+
                  "</tr>");
                });
                // console.log(VerificarDistrito());
               
                EstadoCarnet();

              }
            });
          }else{
            $("#dni_encontrado").hide();
            $("#dni_noencontrado").show();
            $("#nro_doc_identidad").removeClass('is-valid');
            $("#nro_doc_identidad").addClass('is-invalid');
  
  
            $("#nombre").val("");
            $("#apellido_paterno").val("");
            $("#apellido_materno").val("");
            $("#doc_identidad").val("DNI").change();
            $("#fecha_caducidad_carnet").val("dd/mm/aaaa");
            // $("#direccion").val(response[0].direccion);
            // $("#distrito").val(response[0].ubigeo_id);
            // $("#altitud").val(response[0].altitud);
            // $("#longitud").val(response[0].longitud);
            // $("#latitud").val(response[0].latitud);
            $("#correo").val("");
            $("#telefono").val("");
            $("#fecha_nacimiento").val("dd/mm/aaaa");
            $("#estado_civil").val('--').change();
            $("#sexo").val("--").change();
            $("#ocupacion").val("");
            $("#grado_instruccion").val("--").change();
            $("#flag_certifi_discapacidad").val("--").change();
            $("#tipo_discapacidad").val("--").change();
            $("#diagnostico_discapacidad").val("--").change();
            //RecibirRadio(nombre del elemento, valor guardado que viene, valor del primer radio);
            // RecibirRadio("requiere_ayuda",response.discapacitados[0].requiere_ayuda,'SI');
            // RecibirRadio("tipo_ayuda",response.discapacitados[0].tipo_ayuda,'FISICA');
            $("#ayuda_mecanica").val("").change();
            // $("#nombre_apoderado").val("");
            // $("#dni_apoderado").val("");
            // $("#parentesco").val("--").change();
            // $("#direccion_apoderado").val("");
            // $("#correo_apoderado").val("");
            // $("#telefono_apoderado").val("");
            $("#tipo_seguro").val("--").change();
            $("#seguro_salud").val("");
            $("#flg_carnet_did").val("");
            $("#fecha_empadronamiento").val("dd/mm/aaaa");
            $("#comentario").val("");
            $("#DTDirecciones tbody").html("");
          }
      }
    });
  }

});


//lista los distritos que pertencen al usuario 
dist_usuario={};
$.ajax({
  type: "GET",
  url: "obtenerdistusuarios/"+$("#idUsuario").val(),
  dataType: "json",
  success: function (response) {
    dist_usuario=(JSON.parse(response[0].zona_dist));
  }
});
//end lista los distritos


var usu_puede_editar=false;
var encontro_dir_activo=false;

function ObtenerDirecciones(idPersona){

  $.ajax({
    type: "GET",
    url: "obtenerdirecciones/"+idPersona,
    dataType: "json",
    success: function (response) {
      $("#DTDirecciones tbody").html('');
      response.forEach(element => {
        if (element.activo) {
          encontro_dir_activo=true;
          color='style ="background-color: #aef0af;"';
            dist_usuario.forEach( element2 => {
            if (element2==element.ubigeo_id) {
                usu_puede_editar=true;
              }
            });
        }else{
          color="";
        }
        $("#DTDirecciones").append('<tr '+ color +'>'+
        '<td>'+ element.id +'</td>'+
        '<td>'+
            '<button class="btn btn-outline-warning btnEditarDireccion"><i class="lni lni-pencil"></i></button>' +
            // '<button class="btn btn-outline-danger btnEliminar"><i class="lni lni-trash"></i></button>' +
        '</td>'+
        '<td>'+ element.provincia +'</td>'+
        '<td>'+ element.distrito +'</td>'+
        '<td>'+ element.direccion +'</td>'+
        '<td>'+ element.numero +'</td>'+
        '<td>'+ element.activo +'</td>'+
        '</tr>');
      });
      
      if ($("#Rol").val()=='1') {//pregunta si es admin
        //activa los botones
        $("#btnEnviar").prop("disabled",false);
        $("#btnNuevaDireccion").prop("disabled",false);
        $(".btnEditarDireccion").prop("disabled",false);
      }
      if ($("#Rol").val()=='2') {//Pregunta Si es registador
        if (encontro_dir_activo==true) {  
            if (usu_puede_editar) {//Pregunta Si el usu actual puede editar
              $("#btnEnviar").prop("disabled",false);
              $("#btnNuevaDireccion").prop("disabled",false);
              $(".btnEditarDireccion").prop("disabled",false);
            }else{
              $("#btnEnviar").prop("disabled",true);
              $("#btnNuevaDireccion").prop("disabled",true);
              $(".btnEditarDireccion").prop("disabled",true);
            }
        }else{
          $("#btnEnviar").prop("disabled",false);
          $("#btnNuevaDireccion").prop("disabled",false);
        }
      }

    }
  });



}


function RecibirRadio(nombre_elemento,valor_guardado,valor) {
    if (valor_guardado==valor) {
      $("#"+nombre_elemento+"Radio1").prop('checked',true);
    }else{
      $("#"+nombre_elemento+"Radio2").prop('checked',true);
    }
}

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
          $("#nombre_apoderado").val( response['nombres']);
          $("#apellido_apoderado").val(response['apellidoPaterno'] + " " + response['apellidoMaterno']);
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
      $("#nombre").val('');
      $("#apellido_paterno").val('');
      $("#apellido_materno").val('');

      $("#dni_encontrado").hide();
      $("#dni_noencontrado").hide();
      $("#nro_doc_identidad").removeClass('is-valid');
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