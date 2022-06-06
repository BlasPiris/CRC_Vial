<?php

//CONEXION CON BASE DE DATOS
require './config/Conexion.php';

//HEADER
require("./header.php");

//CITA PREVIA
if(isset($_GET['cita'])){

    //MENSAJE EN WEB
    ?>
    <div class="page-header text-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Pedir Cita</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="contact text-center">
        <h2 class="section-title">Se ha realizado la solicitud de cita. Le llamaremos lo antes posible para confirmar la cita, gracias</h2>
        <a class="btn btn-outline-danger" href="./index.php">Volver al Inicio</a>
    </div>
    <?php

    $nombre=$_POST["nombre"];
    $fecha=$_POST["dia"];
    $horario=$_POST["horario"];
    $servicio=$_POST["servicio"];
    $tel=$_POST["tel"];
    $observaciones=$_POST["observaciones"];
    
    if(isset($_POST["email"])){
        $email=$_POST["email"];
    }else{
        $email="";
    }

$hoy = date("Y-m-d H:i:s");

// INSERCION EN BBDD

$sql="INSERT INTO `solicitud_cita`(`nom_ape`, `telefono`, `email`, `servicio`, `dia`, `horario`, `observacion`, `fec_solicitud`) 
VALUES ('$nombre','$tel',' $email','$servicio','$fecha','$horario','$observaciones','$hoy')";
ejecutarConsulta($sql);

// ENVIO CORREO
$destinatario = "bpirisr@gmail.com"; 
$asunto = "Solicitud de Cita"; 
$cuerpo = ' 
<html> 
<head> 
</head> 
<body> 
<p><b>'.$_POST["nombre"].'</b> ha enviado una solicitud de Cita. Requiere del servicio de <b>'.$_POST["servicio"].'</b> para el 
dia <b>'.$_POST["dia"].'</b> en horario de <b>'.$_POST["horario"].'</b></p>
<p><b>Datos contacto</b> de '.$_POST["nombre"].'</b> :  <b>'.$_POST["tel"].'</b> <b>'.$_POST["email"].'</b></p>
<p><b>Observaciones</b>: '.$_POST["observaciones"].'</b></p>
</body> 
</html>'; 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
mail($destinatario,$asunto,$cuerpo,$headers);
}

// CONTACTO
if(isset($_GET['contacto'])){

    //MENSAJE EN WEB

    ?>
    
    <div class="page-header text-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Contacto</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="contact text-center">
        <h2 class="section-title">Se ha enviado el mensaje. Le contestaremos lo antes posible, gracias</h2>
        <a class="btn btn-outline-danger" href="./index.php">Volver al Inicio</a>
    </div>
    <?php

//ENVIO CORREO
$destinatario = "bpirisr@gmail.com"; 
$asunto = "Nuevo mensaje de la Web"; 
$cuerpo = ' 
<html> 
<head> 
</head> 
<body> 
<p><b>'.$_POST["nombre"].'</b> ha enviado un mensaje:</p>
<p>'.$_POST["mensaje"].'</p>
<p><b>Datos contacto</b> de '.$_POST["nombre"].'</b> :  <b>'.$_POST["tel"].'</b> <b>'.$_POST["email"].'</b></p>
</body> 
</html>'; 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
mail($destinatario,$asunto,$cuerpo,$headers);
    
}
?>
<?php 
//FOOTER
require("./footer.php")
?>