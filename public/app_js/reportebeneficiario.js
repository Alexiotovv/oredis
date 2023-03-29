$("#chkDistrito").on("click",function (){
  
    if ($("#chkDistrito").prop('checked')) {
        var obj = document.getElementById('distrito');
        for(var i = 0; i < obj.options.length; i++){
            obj.options[i].selected = true;
        }
        $("#distrito").change();
    }else{
        var obj = document.getElementById('distrito');
        for(var i = 0; i < obj.options.length; i++){
            obj.options[i].selected = false;
        }
        $("#distrito").change();
    }
    
  });

