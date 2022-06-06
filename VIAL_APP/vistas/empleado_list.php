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
<div class="container-fluid ">    
    <div class="row">
      <div class="col-md-12 bg-white p-3" style="min-height: 1000px">        
        <div class="m-2 row">
          <div class="col-md-6 mb-2">
            <h1 class="display-5">EMPLEADOS</h1>
            <a class="btn btn-success" id="btnagregar" href="empleado_new.php">+ Agregar nuevo Empleado </a>
          </div>

          <div class="col-md-6 mb-4">
              <div class="row">
                <div class="col-md-6">
               
                </div>

                <div class="col-md-6">
               
                </div>
              </div>
              
              <div class="row d-flex align-items-end">
                <div class="col-md-6 ">
                  
                </div>
                <div class="col-md-6">
                  
                </div>
            </div>         
        </div>

        

        <div class="table-responsive" id="listadoregistros">
          <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <th>Opciones</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Imagen</th>
              <th>Telefono</th>
              <th>Correo Electrónico</th>
              <th>Visualizar Web</th>
              <th>Estado Empleado</th>
              <th>Rol Usuario</th>
            </thead>
            <tbody> 
            </tbody>
            <tfoot>
             <th>Opciones</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Imagen</th>
              <th>Telefono</th>
              <th>Correo Electrónico</th>
              <th>Visualizar Web</th>
              <th>Estado Empleado</th>
              <th>Rol Usuario</th>
            </tfoot>   
          </table>
        </div>
      </div>
    </div>
</div>      
       
<?php 


require 'footer.php';
 ?>
 <script src="scripts/empleados.js"></script>
 <?php 
}
ob_end_flush();
  ?>

