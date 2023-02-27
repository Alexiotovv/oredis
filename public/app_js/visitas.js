$("#btnGuardarVisita").on("click",function (e) {
    e.preventDefault()
    if ($("#dniBuscar").val()=="") {
        alert('Ingrese un DNI');
    }else{
        ds=$("#formGuardarVisita").serialize();
        ru="guardarvisita";
        mje="Visita Registrada"
        GuardarRegistro(ds,ru,mje,"");
    }
});

$("#btnBuscarDireccion").on("click",function (e){
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "obtenerdireccion/"+$("#dniBuscar").val(),
        dataType: "json",
        success: function (response) {
            $("#NombrePersona").text(response[0].nombre+ ' ' +response[0].apellido_paterno+ ' '+response[0].apellido_materno);
            $("#Direccion").val(response[0].direccion+ ' '+response[0].numero);
            $("#idDireccion").val(response[0].idDireccion);
        },
        
    });
})


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

    src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d591.8374011667854!2d"+ coords.longitude +"!3d"+ coords.latitude +"!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2spe!4v1677511264404!5m2!1ses-419!2spe";
    $("#mapa").attr("src",src);
    
}

$("#IngresarManualUbicacion").on("click",function (e) {
    $("#latitud").prop('readonly',false);
    $("#longitud").prop('readonly',false);
    $("#altitud").prop('readonly',false);
    $("#latitud").focus();
});