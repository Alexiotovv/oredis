$('#texto_banner').on("keyup",function () {
    $("#texto_banner_cant").text($('#texto_banner').val().length);
});

$('#pie_banner').on("keyup",function () {
    $("#pie_banner_cant").text($('#pie_banner').val().length);
});

$('#objetivo').on("keyup",function () {
    $("#objetivo_cant").text($('#objetivo').val().length);
});

$('#texto_evento').on("keyup",function () {
    $("#texto_evento_cant").text($('#texto_evento').val().length);
});
$('#pie_evento').on("keyup",function () {
    $("#pie_evento_cant").text($('#pie_evento').val().length);
});

$("#defecto").on('click',function () {
    if ($("#defecto").prop('checked')) {
        EstadosElementos(true);
    }else{
        EstadosElementos(false);
    }
})

function EstadosElementos(valor) { 
    $("#texto_banner").prop('readonly',valor);
    $("#pie_banner").prop('readonly',valor);
    $("#foto_banner").prop('readonly',valor);
    $("#objetivo").prop('readonly',valor);
    $("#foto_objetivo").prop('readonly',valor);
    $("#texto_evento").prop('readonly',valor);
    $("#pie_evento").prop('readonly',valor);
    $("#telefono").prop('readonly',valor);
    $("#correo").prop('readonly',valor);
    $("#direccion").prop('readonly',valor);
    $("#nombre_enlace1").prop('readonly',valor);
    $("#enlace1").prop('readonly',valor);
    $("#nombre_enlace2").prop('readonly',valor);
    $("#enlace2").prop('readonly',valor);
    $("#nombre_enlace3").prop('readonly',valor);
    $("#enlace3").prop('readonly',valor);
 }
 