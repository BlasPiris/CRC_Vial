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
          <h1 class="display-5">NUEVA CITA</h1>
        </div>
        
      <form action="" name="formulario" id="formulario" method="POST">
    <div class="row -2">

      <div class="form-group col-lg-4 col-md-4 col-xs-12 mb-2">
        <label>Cliente</label>
        <select id="cli" class="form-select" onchange="validarFormularios()"  required>
        <select>
      </div>

      <div class="form-group col-lg-4 col-md-3 col-xs-12 mb-2">
        <label>Servicio</label>
        <select id="ser" class="form-select" onchange="mostrarEmpleadosServicio(this.value),validarFormularios()" required>
        <select>
      </div>

      <div class="form-group col-lg-4 col-md-4 col-xs-12 mb-2">
        <label>Empleado</label>
        <select id="emp_ser" class="form-select" onchange="validarFormularios()" required>
        <select>
      </div>

      <div class="form-group col-lg-6 col-md-6 col-xs-12 mb-2">
        <label for="">Fecha</label>
        <input class="form-control" type="date" onchange="validarFormularios()" name="descripcion" id="fecha" required>
      </div>

      <div class="form-group col-lg-6 col-md-6 col-xs-12 mb-2">
        <label for="">Hora</label>
        <input class="form-control" type="time" onchange="validarFormularios()" name="descripcion" id="hora" required >
      </div>

      

    </div>

    

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 m-4">
      <button type='button' id="guardar" class="btn btn-primary"  onclick="insertarCita()"> 🖪 Guardar Cita</button>
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
 <script src="scripts/citas.js"></script>
 <?php 
}

ob_end_flush();
  ?>

