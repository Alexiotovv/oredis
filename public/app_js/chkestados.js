function cambia_estado(elemento) { 
    $(document).on("click",".chk"+ elemento +"",function (e){
    // e.preventDefault();
    if ($(this).prop('checked')) { valor=1; } else { valor=0; }
    fila = $(this).closest("tr");
    id = (fila).find('td:eq(0)').text();
    $.ajax({
        type: "GET",
        url: "/panel/"+ elemento +"/"+ id +"/estado/"+ valor,
        data: "data",
        dataType: "dataType",
        success: function (response) {
            
        }
    });            
    })
 }