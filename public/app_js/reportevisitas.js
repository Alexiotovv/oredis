$("#chkDistrito").on("click",function (){
  
  if ($("#chkDistrito").prop('checked')) {
      $("#distrito").attr('disabled',true);
  }else{
      $("#distrito").attr('disabled',false);
  }
  
});

// $("#btnBuscarVisitas").on("click",function (e) {
//     e.preventDefault();
    // ds=$("#formBuscarVisitas").serialize();

//     $.ajax({
//         type: "GET",
//         url: "obtenervisitas",
//         // data: ds,
//         dataType: "json",
//         // beforeSend: function() {
//         //     $("#spinner_busqueda").prop('hidden',false);
//         // },
//         success: function (response) {
//             console.log(response);
//             // if (response.length>0) {
//             //     $(response).forEach((item) => {
//             //         $("#DTReporteVisitas").append('<tr'+
//             //             '<td>'+ item.provincia +'<td>'+
//             //             '<td>'+ item.distrito +'<td>'+
//             //             '<td>'+ item.nombre +'<td>'+
//             //             '<td>'+ item.apellido_paterno +'<td>'+
//             //             '<td>'+ item.apellido_materno +'<td>'+
//             //             '<td>'+ item.direccion +'<td>'+
//             //             '<td>'+ item.numero +'<td>'+
//             //             '<td>'+ item.viveaqui +'<td>'+
//             //             '<td>'+ item.nombres +'<td>'+
//             //             '<td>'+ item.apellidos +'<td>'+
//             //         '</tr>');
//             //     });
//             // }
            
//         },
//         // error: function (response) {
//         //     $("#spinner_busqueda").prop('hidden',true);
//         // }
//     });

//     // $("#DTReporteVisitas").DataTable({
//     //     destroy:true,
//     //     ajax:{url:"ListarReporteVisitas/"+ds,
//     //     type:"POST",
//     //     },
//     //     columns:[
//     //         {data:"provincia"},
//     //         {data:"distrito"},
//     //         {data:"nombre"},
//     //         {data:"apellido_paterno"},
//     //         {data:"apellido_materno"},
//     //         {data:"direccion"},
//     //         {data:"numero"},
//     //         {data:"viveaqui"},
//     //         {data:"nombres"},
//     //         {data:"apellidos"},
//     //     ],order:[0],
//     //     buttons:['copy','excel','pdf'],
//     //     dom: 'Bfrtip',

    //   });
// });


  var fecha = new Date();
  document.getElementById("FechaInicio").value = fecha.toJSON().slice(0, 10);
  document.getElementById("FechaFinal").value = fecha.toJSON().slice(0, 10);
// $('#DTReporteVisitas').DataTable({
//     "order": [0, 'desc'],
//     "language": {
//     "lengthMenu": "Mostrar _MENU_ registros por páginas",
//     "zeroRecords": "Nada encontrado - disculpa",
//     "info": "Mostrando la página _PAGE_ de _PAGES_",
//     "infoEmpty": "No hay registros disponibles",
//     "infoFiltered": "(filtrado de _MAX_ registros totales)",
//     "search": "Buscar",
//     "paginate": {
//         "next": "Siguiente",
//         "previous": "Anterior",
//     }
//     }
// });
