function currentdate(fecha) { 
    var fecha_actual = new Date();
    document.getElementById(fecha).value = fecha_actual.toJSON().slice(0, 10);
 }