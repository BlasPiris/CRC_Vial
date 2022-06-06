
//FUNCION HORA ACTUAL
function Reloj(){
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()

    if(hora<10){hora="0"+hora;}
    if(minuto<10){ minuto="0"+minuto;}
    horaImprimible = hora + " : " + minuto

    $("#clock").text(horaImprimible);
}

setInterval(Reloj,16)

//FUNCION INICIAR TURNO
function iniciarTurno(id){
$.post("../ajax/fichaje.php?inicio=yes",{id:id})
.done(function(data){console.log(data)})
$("#alert").removeClass( "d-none" );
$("#alert").html("Se ha fichado la entrada correctamente")
$("#fichaje").prop( "disabled", true );
setTimeout(function(){ $(location).attr("href","login.php") }, 10000);

}

//FUNCION FINALIZAR TURNO
function finalizarTurno(id){

    $.post("../ajax/fichaje.php?fin=yes",{id:id});
    $("#alert").removeClass( "d-none" );
    $("#alert").html("Se ha fichado la salida correctamente")
    $("#fichaje").prop( "disabled", true );
    setTimeout(function(){ $(location).attr("href","login.php") }, 10000);
}