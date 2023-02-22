
////LA FUNCIÓN PARA GUARDAR O ACTUALIZAR REGISTRO
function GuardarRegistro(ds,ru,mje,dt){
  
    Swal.fire({
        title: 'Estás seguro?', text: "Por favor confirma para poder guardar!",
        showCancelButton: true, confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33', confirmButtonText: 'Sí, Guardar!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
            type: "POST",
            url: ru,
            data: ds,
            dataType: "json",
            success: function (response) {
                Swal.fire(
                    {
                    position: 'top-end',
                    icon: 'success',
                    title: mje,
                    showConfirmButton: false,
                    timer: 1500}
                    )
                if (dt=='') {
                    //No hace nada
                }else{
                    $(dt).DataTable().ajax.reload();
                }
                    
                
            },
            error: function(response) {
                Swal.fire('OPS!', 'Hubo un error!', 'código de error' + response)
            },
            });
        }
    })
};

///FUNCION ELIMINAR REGISTRO
function EliminarRegistro(ru,mje){
  Swal.fire({
      title: 'Estás seguro?', text: "Confirma para poder eliminar el registro!",
      icon: 'Mensaje', showCancelButton: true, confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33', confirmButtonText: 'Sí, eliminar!'
  }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              type: "GET",
              url: ru,
              dataType: "json",
              success: function (response) {
                  Swal.fire({
                      position: 'top-end',
                      icon: 'success',
                      title: mje,
                      showConfirmButton: false,
                      timer: 1500});
                //   $(dt).DataTable().ajax.reload();
              },
              error: function(response) {
                  Swal.fire('OPS!', 'Hubo un error!', 'error');
              },
          });
      }
  })

};
