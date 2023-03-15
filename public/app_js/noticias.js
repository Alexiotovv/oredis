$('#Descripcion').on("keyup",function () {
    $("#descripcion_cant").text($('#Descripcion').val().length);
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

$(document).on("click",".chkbanner",function (e){
    // e.preventDefault();
    if ($(this).prop('checked')) { valor=1; } else { valor=0; }
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $.ajax({
        type: "GET",
        url: "/noticia/bannermodal/"+ id +"/estado/"+ valor,
        data: "data",
        dataType: "dataType",
        success: function (response) {
            
        }
    });
})