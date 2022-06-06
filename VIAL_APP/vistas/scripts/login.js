//FUNCION ACCEDER ESCRITORIO
$("#acceso").on('click',function(e){
    user=$("#user").val();
    passwd=$("#passwd").val();
if ($("#user").val()=="" || $("#passwd").val()=="") {
     $("#aviso").text("Rellena todos los campos");
}else{
        $.post("../ajax/login.php?acceso=yes",
        {"user":user,"passwd":passwd},
        function(data)
    {
        console.log(data);
        if (data!=""){
          $(location).attr("href","escritorio.php");            
        }else{
            $("#aviso").text("Usuario o contraseña incorrecta");
        }
    });
}
})

//FUNCION ACCEDER FICHAJE
$("#fichaje").on('click',function(e){
    user=$("#user").val();
    passwd=$("#passwd").val();
if ($("#user").val()=="" || $("#passwd").val()=="") {
     $("#aviso").text("Rellena todos los campos");
}else{
        $.post("../ajax/login.php?acceso=yes",
        {"user":user,"passwd":passwd},
        function(data)
    {
        console.log(data);
        if (data!=""){
          $(location).attr("href","fichar.php");            
        }else{
            $("#aviso").text("Usuario o contraseña incorrecta");
        }
    });
}
})
