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
          <div class="col-md-6 m-3">
            <h1 class="display-5">SOLICITUDES CITA PREVIA</h1>
            <p>Estas solicitudes se eliminarán pasados 15 dias de su solicitud</p>
            <a class="btn btn-success" id="btnagregar" href="cita_new.php">+ Agregar nueva Cita </a>
          </div>

        

        

        <div class="table-responsive" id="listadoregistros">
          <table id="tbllistado_citasprev" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <th>Opciones</th>
              <th>Cliente</th>
              <th>Telefono</th>
              <th>Email</th>
              <th>Servico</th>
              <th>Dia</th>
              <th>Horario</th>
              <th>Observaciones</th>
            </thead>
            <tbody> 
            </tbody>
            <tfoot>
            <th>Opciones</th>
              <th>Cliente</th>
              <th>Telefono</th>
              <th>Email</th>
              <th>Servico</th>
              <th>Dia</th>
              <th>Horario</th>
              <th>Observaciones</th>
            </tfoot>   
          </table>
        </div>
      </div>
    </div>
</div>      
       
<?php 


require 'footer.php';
 ?>
 <script src="scripts/citas.js"></script>
 <?php 
}
ob_end_flush();
  ?>

