<?php require '../config/Conexion.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>VIAL</title>
   <link href="img/logo_ico.png" rel="icon">
    <!-- CSS -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../extra/css/font-awesome.css">
    <link rel="stylesheet" href="../extra/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../extra/css/_all-skins.min.css">
    <link rel="stylesheet" href="./css/css.css">
    <link rel="stylesheet" type="text/css" href="../extra/datatables/jquery.dataTables.min.css">    
    <link href="../extra/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../extra/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../extra/css/bootstrap-select.min.css">
  </head>
  <body class="hold-transition">
    <div class="login-box">
      <div class="login-logo">
       <a><img src="../img/logo.png"></a>
      <div class="login-box-body bg-light"">
        <p class="login-box-msg">Ingrese sus datos de Acceso</p>
          <div class="form-group m-2 ">
            <input type="text" id="user" name="user" class="form-control" placeholder="Usuario" required>
          </div>
          <div class="form-group m-2 mb-4 text-center">
            <input type="password" id="passwd" name="passwd" class="form-control" placeholder="Password" required>
            <label class="text-danger" id="aviso"></label>
          </div>
          <div class="row">
              <a id="fichaje" class="btn btn-primary btn-block mb-2 "> Fichar</a>
              <a id="acceso" class="btn btn-primary btn-block mb-2"> Ingresar</a>
          </div>
      </div>
    </div>
    <script src="../extra/js/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script type="text/javascript" src="scripts/login.js"></script>
  </body>
</html> 
