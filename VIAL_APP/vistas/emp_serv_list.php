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
          <div class="col-md-6">
            <h1 class="display-5">SERVICIOS de EMPLEADOS</h1>
            <a class="btn btn-success" id="btnagregar" href="emp_serv_set.php">+ Agregar nuevo Servicio a Empleado </a>
          </div>

          <div class="col-md-6 mb-4">
              
              
              <div class="row d-flex align-items-end">
                <div class="col-md-6 ">
                  <label>Empleado</label>
                  <select id="emp" class="form-select" >
                   
                  <select>
                </div>
                <div class="col-md-6">
                  <a class="btn btn-info" id="btnagregar" onclick="serviciosEmpleado()">Buscar</a>
                </div>
            </div>
            <div class="row d-flex align-items-end">
                <div class="col-md-6 ">
                  <label>Servicio</label>
                  <select id="ser" class="form-select" >
                   
                  <select>
                </div>
                <div class="col-md-6">
                  <a class="btn btn-info" id="btnagregar" onclick="empleadosServicio()">Buscar</a>
                </div>
            </div>          
        </div>

        

        <div class="table-responsive" id="listadoregistros">
          <table id="tbllistado_ser_emp" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <th>Opciones</th>
              <th>Empleado</th>
              <th>Servicio</th>
              
            </thead>
            <tbody> 
            </tbody>
            <tfoot>
             <th>Opciones</th>
              <th>Empleado</th>
              <th>Servicio</th>
              
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

