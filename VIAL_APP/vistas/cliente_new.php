<?php
//ALMACENAMIENTO EN BUFFER
ob_start();

//COMPROBACION SESION
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.php");
}else{


//SOLICITUD HEADER
require 'header.php';


 ?>
<div class="container-fluid">    
  <section class="row m-5" style="min-height: 1000px">   
    <div class="row">
      <div class="col-md-12 bg-light">

      <div class="m-2">
          <h1 class="display-5">NUEVO CLIENTE</h1>
        </div>
        
      <form action="" name="formulario" id="formulario" method="POST">
    <div class="row -2">

      <div class="form-group col-lg-4 col-md-4 col-xs-12 mb-2">
        <label>Nombre</label>
        <input type="text" class="form-control" id="nombre" onkeydown="validarFormularios()">
      </div>

      <div class="form-group col-lg-8 col-md-8 col-xs-12 mb-2">
        <label>Apellidos</label>
        <input type="text" class="form-control" id="apellidos" onkeydown="validarFormularios()">
      </div>

      <div class="form-group col-lg-3 col-md-3 col-xs-12 mb-2">
        <label>DNI</label>
        <input class="form-control" type="text"  id="dni"  onkeydown="validarFormularios()"  required>
      </div>

      <div class="form-group col-lg-3 col-md-3 col-xs-12 mb-2">
        <label>Fecha Nacimiento</label>
        <input class="form-control" type="date" id="fec_nac" onchange="validarFormularios()" required>
      </div>

      <div class="form-group col-lg-3 col-md-3 col-xs-12 mb-2">
        <label>Telefono</label>
        <input class="form-control" type="text" id="telefono" onkeydown="validarFormularios()" required>
      </div>

      <div class="form-group col-lg-3 col-md-3 col-xs-12 mb-2">
        <label>Email</label>
        <input class="form-control" type="email" id="email" onkeydown="validarFormularios()" >
      </div>

      

    </div>

    

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 m-4">
      <button type='button' id="guardar" class="btn btn-primary"  onclick="insertarCliente()"> 🖪 Guardar Cliente</button>
      <a class="btn btn-danger"  type="button" href="escritorio.php"> ᐊ Cancelar</a>
    </div>
  </form>

       
      </div>
    </div>
  </section> 
</div>      
       
<?php 


require 'footer.php';
 ?>
 <script src="scripts/clientes.js"></script>
 <?php 
}

ob_end_flush();
  ?>

