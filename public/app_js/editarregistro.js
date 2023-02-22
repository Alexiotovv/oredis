

$("#btnEnviar").on("click",function (e) {
  if ($("#nro_doc_identidad").val()=="" || $("#direccion").val()=="" ||$("#telefono").val()==""){
    //que haga su trabajo los mensajea de html de cada input
  }else{
    e.preventDefault();
    ds=$("#formActualiza").serialize();
    ru='actualizardiscapacitado';
    mje='Registro Actualizado'    
    GuardarRegistro(ds,ru,mje);
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

function posicion(geolocationPosition) {  
  let coords=geolocationPosition.coords;
  $("#Latitud").val(coords.latitude);
  $("#Longitud").val(coords.longitude);
  $("#Altitud").val(coords.altitude);
  $("#Latitud").prop('readonly',true);
  $("#Longitud").prop('readonly',true);
  $("#Altitud").prop('readonly',true);
}

$("#IngresarManualUbicacion").on("click",function (e) {
  $("#Latitud").prop('readonly',false);
  $("#Longitud").prop('readonly',false);
  $("#Altitud").prop('readonly',false);
  $("#Latitud").focus();
});

$("#btnBuscarEditar").on("click",function(e){
  e.preventDefault();
  $.ajax({
    type: "GET",
    url: "consultadni/"+$("#nro_doc_identidad").val(),
    dataType: "json",
    success: function (response) {
        if (response.length>0) {
          $.ajax({
            type: "GET",
            url: "editardiscapacitado/"+$("#nro_doc_identidad").val(),
            dataType: "json",
            success: function (response) {
              $("#idPersona").val(response[0].id);
              $("#nro_doc_identidad").addClass('is-valid')
              $("#dni_encontrado").show();
              $("#dni_noencontrado").hide();
              
              $("#nombre").val(response[0].nombre);
              $("#apellido_paterno").val(response[0].apellido_paterno);
              $("#apellido_materno").val(response[0].apellido_materno);
              $("#doc_identidad").val(response[0].doc_identidad).change();
              $("#direccion").val(response[0].direccion);
              $("#distrito").val(response[0].ubigeo_id);
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
              $("#flag_certifi_discapacidad").val(response[0].flag_certifi_discapacidad).change();
              $("#tipo_discapacidad").val(response[0].tipo_discapacidad).change();
              $("#diagnostico_discapacidad").val(response[0].diagnostico_discapacidad).change();
              //RecibirRadio(nombre del elemento, valor guardado que viene, valor del primer radio);
              RecibirRadio("requiere_ayuda",response[0].requiere_ayuda,'SI');
              RecibirRadio("tipo_ayuda",response[0].tipo_ayuda,'FISICA');
              $("#ayuda_mecanica").val(response[0].ayuda_mecanica).change();
              $("#nombre_apoderado").val(response[0].nombre_apoderado);
              $("#dni_apoderado").val(response[0].dni_apoderado);
              $("#parentesco").val(response[0].parentesco).change();
              $("#direccion_apoderado").val(response[0].direccion_apoderado);
              $("#correo_apoderado").val(response[0].correo_apoderado);
              $("#telefono_apoderado").val(response[0].telefono_apoderado);
              $("#tipo_seguro").val(response[0].tipo_seguro).change();
              $("#seguro_salud").val(response[0].seguro_salud);
              $("#fecha_empadronamiento").val(response[0].fecha_empadronamiento);
            }
          });
        }else{
          $("#dni_encontrado").hide();
          $("#dni_noencontrado").show();
          $("#nro_doc_identidad").removeClass('is-valid');
          $("#nro_doc_identidad").addClass('is-invalid');
        }
    }
  });

});

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