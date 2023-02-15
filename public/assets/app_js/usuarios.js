$("#btnGuardaContrasena").on("click",function (e) {
    e.preventDefault();

    if (($("#passwordchange").val())==($("#passwordchange2").val())) {
        var serializedData = $("#formCambiarClave").serialize();
        let ruta="ActualizaContrasena";
        let msje="Contraseña Actualizada";
        GuardarRegistro(serializedData,ruta,msje,"#DTUsuarios")
        $("#ModalCambiarClave").modal('hide');
    }else{
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: "Las contraseñas no coinciden",
            showConfirmButton: false,
            timer: 1500});
    }
    

});

$(document).on("click",".btnCambiarClave",function (e) {
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    nombre = (fila).find('td:eq(2)').text();
    $("#EtiquetaCambiarClave").text('Cambiar Contraseña');
    $("#IdUsuarioClave").val(id);
    $("#NombreUsuario").val(nombre);
    $("#ModalCambiarClave").modal('show');
});

$(document).on("click",".btnEditarUsuario",function (e) { 
    e.preventDefault();
    $("#EtiquetaUsuario").text('Editar Usuario');
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    nombre = (fila).find('td:eq(2)').text();
    nombres = (fila).find('td:eq(3)').text();
    apellidos = (fila).find('td:eq(4)').text();
    correo = (fila).find('td:eq(5)').text();
    rol = (fila).find('td:eq(6)').text();
    estado = (fila).find('td:eq(7)').text();


    $("#IdUsuario").val(id);
    $("#usuario").val(nombre);
    $("#nombres").val(nombres);
    $("#apellidos").val(apellidos);
    $("#email").val(correo);
    $("#rol").val(rol).change();
    $("#status").val(estado).change();
    $("#password").prop("disabled",true);
    $("#ModalUsuario").modal('show');
 });


$("#btnNuevoUsuario").on("click",function (e) {
    e.preventDefault();
    $("#EtiquetaUsuario").text('Nuevo Usuario');
    LimpiarFormUsuarios();
    $("#password").prop("disabled",false);
    $("#apellidos").val("");
    $("#nombres").val("");
    $("#ModalUsuario").modal('show');
})

$("#name").keyup(function(){
    var serializedData = $("#formUsuario").serialize();
    
    $.ajax({
        type: "POST",
        url: "verificanombre",
        data: serializedData,
        dataType: "json",
        success: function (response) {
            if (response['estado']=='Disponible') {
                $("#estadousuario").hide();
                // $("#estadousuario").text('Disponible');
            }else{
                $("#estadousuario").show();
                $("#estadousuario").text('No Disponible');
            }
        }
    });
});

$("#email").keyup(function(){
    var serializedData = $("#formUsuario").serialize();
    $.ajax({
        type: "POST",
        url: "verificaemail",
        data: serializedData,
        dataType: "json",
        success: function (response) {
            if (response['estado']=='Disponible') {
                $("#estadoemail").hide();
                // $("#estadousuario").text('Disponible');
            }else{
                $("#estadoemail").show();
                $("#estadoemail").text('No Disponible');
            }
        }
    });
});


$("#btnGuardaUsuario").on("click",function(e){
    e.preventDefault();
    var serializedData = $("#formUsuario").serialize();
    let ruta="";
    let msje="";
    if (($("#estadousuario").val()=='No Disponible') ||($("#estadoemail").val()=='No Disponible')) {
        
    }else{

        if ($("#EtiquetaUsuario").text()=='Nuevo Usuario') {
            ruta="register";
            msje="Registro Guardado"
        }else{
            ruta="ActualizaUsuario";
            msje="Registro Actualizado";
        }
        GuardarRegistro(serializedData,ruta,msje,"#DTUsuarios");
        LimpiarFormUsuarios();
        $("#ModalUsuario").modal('hide');
    }

});

$("#DTUsuarios").DataTable({

    "destroy":true,
    "ajax":"ListarUsuarios",
    "method":"GET",
    "columns":[
        {data:"id"},
        { "defaultContent": "<button class='btn btn-icon btn-outline-warning btnEditarUsuario'><i class='fadeIn animated bx bx-pencil'></i></button>\
        <button class='btn btn-outline-danger btnCambiarClave'><i class='fadeIn animated bx bx-lock-open'></i></button>"},
        {data:"name"},
        {data:"nombres"},
        {data:"apellidos"},
        {data:"email"},
        {data:"is_admin"},
        {data:"status"},
    ],order:[0],
    // buttons:['copy','excel','pdf'],
    // dom: 'Bfrtip',

});


$(document).ready(function () {
    $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("bx-hide");
            $('#show_hide_password i').removeClass("bx-show");
        } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("bx-hide");
            $('#show_hide_password i').addClass("bx-show");
        }
    });
});


function LimpiarFormUsuarios(){
    // $("#IdUsuario").val("");
    // $("#name").val("");
    // $("#email").val("");
}