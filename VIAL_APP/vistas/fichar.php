<?php 
require '../config/Conexion.php'; 

session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>VIAL</title>
    <link href="img/logo_ico.png" rel="icon">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../extra/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../extra/css/blue.css">
    <link rel="stylesheet" href="./css/css.css">
  </head>
  <body>
  <div class="fixed-top alert alert-success text-center d-none " role="alert" id="alert" >
        Fichaje realizado correctamente
  </div>
  <div class="hold-transition">
    <div class="login-box">
      <div class="login-logo">
       <a><img src="../img/logo.png"></a>
      
      </div>
      <div class="login-box-body bg-light"">
           <div class="row text-center mb-3">
             <h1 id="clock"></h1>
             <h3 class="emp"><?php echo $_SESSION["nombre"]." ".$_SESSION["apellidos"]; ?></h3><p></p>
             <?php
            if($_SESSION['estado']=="ACTIVO"){
              echo " <span class='estado'> ESTADO: <mark class='bg-success text-light'>Activo</mark></span>";
            }else{
              echo " <span class='estado'>ESTADO: <mark class='bg-danger text-light'>Inactivo</mark></span>";
            };
             ?><p></p>
             <span class='registro'> ULTIMO REGISTRO: <?php $fecha=$_SESSION["fecha"]; echo $hoy = date("d-m-Y H:i",strtotime($fecha)); ?></span>
          </div>        

          <div class="row">
          <?php
            if($_SESSION['estado']!="ACTIVO"){
              echo "<a  type='submit' onclick='iniciarTurno(".$_SESSION["id_empleado"].")' id='fichaje' class='btn btn-success btn-block mb-2'> Iniciar Turno</a>";
            }else{
              echo "<a  type='submit' onclick='finalizarTurno(".$_SESSION["id_empleado"].")' id='fichaje' class='btn btn-danger btn-block mb-2'> Terminar Turno</a>";
            };
             ?>
             <a class='btn btn-primary btn-block mb-2' href="escritorio.php"> Acceder</a>
          </div>
          
        </form>        
      </div>
    </div>
  </div>
    <!-- SCRIPT -->
    <script src="../extra/js/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script type="text/javascript" src="scripts/fichar.js"></script>
  </body>
</html> 
