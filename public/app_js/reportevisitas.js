$("#DTReporteVisitas").DataTable({
    "destroy":true,
    "ajax":"ListarReporteVisitas",
    "method":"GET",
    "columns":[      
        {data:"provincia"},
        {data:"distrito"},
        {data:"nombre"},
        {data:"apellido_paterno"},
        {data:"apellido_materno"},
        {data:"direccion"},
        {data:"numero"},
        {data:"viveaqui"},
        {data:"nombres"},
        {data:"apellidos"},
    ],order:[0],
    buttons:['copy','excel','pdf'],
    dom: 'Bfrtip',
  
  });
