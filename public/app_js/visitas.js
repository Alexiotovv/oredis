
$("#btnGuardarVisita").on("click",function (e) {
    e.preventDefault()
    if ($("#dniBuscar").val()=="") {
        alert('Ingrese un DNI');
    }else{
        ds=$("#formGuardarVisita").serialize();
        ru="guardarvisita";
        mje="Visita Registrada"
        GuardarRegistro(ds,ru,mje,"");
        $("#Direccion").val('');
        $("#dniBuscar").val('');
        $("#latitud").val('');
        $("#longitud").val('');
        $("#altitud").val('');
        $("#comentarios").val('');
        $("#NombrePersona").text('');
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

// function iniciarMapa(lati,longi) { 
//     var latitud = -3.7510642;
//     var longitud = -73.2630891;
//     if (lati=='' && longi=='') {
//         latitud=lati
//         longitud=longi
//     }
    
//     coordenadas={
//         lng: longitud,
//         lat: latitud
//     }
//     generarMapa(coordenadas)
//  }

// function generarMapa(coordenadas) { 
//     var mapa = new google.maps.Map(
//         document.getElementById('mapa'),
//         {
//             zoom: 18,
//             center: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
//         }
//     );
//     marcador = new google.maps.Marker({
//         map:mapa,
//         draggable: true,
//         position: new google.maps.LatLng(coordenadas.lat, coordenadas.lng)
//     });
//     marcador.addListener('dragend',function (event) { 
//         document.getElementById("latitud").value = this.getPosition().lat();
//         document.getElementById("longitud").value = this.getPosition().lng();
//     });

// }


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

mapita=false;

function posicion(geolocationPosition) {  
    let coords=geolocationPosition.coords;
    $("#latitud").val(coords.latitude);
    $("#longitud").val(coords.longitude);
    // $("#altitud").val(coords.altitude);
    $("#latitud").prop('readonly',true);
    $("#longitud").prop('readonly',true);

    // $("#altitud").prop('readonly',true);
        // "https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d497.6434321545103!2d-73.27377632106065!3d-3.7780779910876934      !3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2spe!4v1679600481647!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    // src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d995.6434321545103!2d"+ coords.longitude +"!3d"+ coords.latitude +"!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2spe!4v1679600481647!5m2!1ses-419!2spe";
    // $("#mapa").attr("src",src);

    var container = L.DomUtil.get('map');
      if(container != null){
        container._leaflet_id = null;
      }
    
    var map = L.map('map').setView([coords.latitude,coords.longitude], 16);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 25,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

    var marker = L.marker([coords.latitude,coords.longitude],{draggable: true}).addTo(map);
    
    marker.on("drag", function () { 
        $("#latitud").val(marker.getLatLng().lat);
        $("#longitud").val(marker.getLatLng().lng);
     });

     
    
}
// getLatLng() devuelve la posición del marcador

    




$("#IngresarManualUbicacion").on("click",function (e) {
    $("#latitud").prop('readonly',false);
    $("#longitud").prop('readonly',false);
    // $("#altitud").prop('readonly',false);
    $("#latitud").focus();
});