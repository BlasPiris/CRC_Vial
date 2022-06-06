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
          <h1 class="display-5">Añadir SERVICIO a EMPLEADO</h1>
        </div>
        
      <form action="" name="formulario" id="formulario" method="POST">
    <div class="row align-items-center">

    <div class="form-group col-lg-6 col-md-6 col-xs-12 mb-2">
        <label>Servicio</label>
        <select id="ser" class="form-select" onchange="mostrarEmpleadosServicio(this.value)" required">
        <select>
      </div>

      <div class="form-group col-lg-6 col-md-6 col-xs-12 mb-2">
        <label>Empleado</label>
        <select id="emp_ser" class="form-select" required>
        <select>
      </div>


      

    </div>

    

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 m-4">
      <a class="btn btn-primary"  onclick="añadirServicioEmpleado()"> 🖪 Guardar Servicio</a>
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
 <script src="scripts/servicios.js"></script>
 <?php 
}

ob_end_flush();
  ?>

