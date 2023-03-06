$('#Descripcion').on("keyup",function () {
    alert("presionaste");
    // $("#descripcion_cant").text($('#Descripcion').val().length);
});

$(document).on("click",".btnEditarNoticia",function (e) {
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    setTimeout( function() { window.location.href = "editnoticia/"+id }, 0 );
});

$(document).on("click",".btnEliminarNoticia",function (e) {
    e.preventDefault();
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    ru='destroynoticia/'+id;
    EliminarRegistro(ru,"Noticia Eliminada","noticias");     
})
