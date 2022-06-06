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
          <h1 class="display-5">NUEVO EMPLEADO</h1>
        </div>
        
      <form action="" name="formulario" id="formulario" method="POST">
    <div class="row align-items-center">

      <div class="form-group col-lg-5 col-md-5 col-xs-12 mb-2">
        <label>Nombre</label>
        <input type="text" id="nombre" class="form-control" onkeydown="validarFormularios()">
      </div>

      <div class="form-group col-lg-7 col-md-7 col-xs-12 mb-2">
        <label>Apellidos</label>
        <input type="text" id="apellidos" class="form-control" onkeydown="validarFormularios()">
      </div>

      <div class="form-group col-lg-4 col-md-4 col-xs-12 mb-2">
        <label>DNI</label>
        <input class="form-control" type="text"  id="dni"  pattern="[0-9]{8}[A-Za-z]{1}" onkeydown="validarFormularios()" required>
      </div>


      <div class="form-group col-lg-4 col-md-4 col-xs-12 mb-2">
        <label>Telefono</label>
        <input class="form-control" type="number" id="telefono" onkeydown="validarFormularios()" required>
      </div>

      <div class="form-group col-lg-4 col-md-4 col-xs-12 mb-2">
        <label>Email</label>
        <input class="form-control" type="email" id="email" onkeydown="validarFormularios()" >
      </div>

      <div class="form-group col-lg-6 col-md-6 col-xs-12 mb-2">
        <label>Usuario</label>
        <input class="form-control" type="text"  id="usuario" onkeydown="validarFormularios()" required>
      </div>

      <div class="form-group col-lg-6 col-md-6 col-xs-12 mb-2">
        <label>Contraseña</label>
        <input class="form-control" type="password"  id="contrasena" onkeydown="validarFormularios()" required>
      </div>


      <div class="form-group col-lg-5 col-md-5 col-xs-12">
        <label for="">Imagen</label>
        <input class="form-control filestyle" data-buttonText="Seleccionar foto" type="file" name="imagen" id="imagen"  onchange="validarFormularios()">
    </div>

    <div class="form-group col-lg-5 col-md-5 col-xs-12 mb-2">
        <label>Rol Usuario</label>
        <select id="rol" class="form-select" required>
        <select>
      </div>


      <div class="form-group col-lg-2 col-md-2 col-xs-12 mb-2">
        <label>Mostrar en Web</label>
        <input type="checkbox" class="form-check-input" id="web">
      </div>

    </div>

    

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 m-4">
      <button type='button' id="guardar" class="btn btn-primary"  onclick="insertarEmpleado()"> 🖪 Guardar Empleado</button>
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
 <script src="scripts/empleados.js"></script>
 <script>validarFormularios()</script>
 <?php 
}

ob_end_flush();
  ?>

