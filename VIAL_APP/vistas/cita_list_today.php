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

$fecha_hoy = date('d-m-Y');
 ?>

<div class="container-fluid ">    
    <div class="row">
      <div class="col-md-12 bg-white p-3" style="min-height: 1000px">        
        <div class="m-2 row">
          <div class="col-md-6 mb-2">
            <h1 class="display-5">CITAS  del <?php echo $fecha_hoy?></h1>
            <a class="btn btn-success" id="btnagregar" href="cita_new.php">+ Agregar nueva Cita </a>
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
          <table id="tbllistado_today" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <th>Opciones</th>
              <th>Cliente</th>
              <th>Servicio</th>
              <th>Empleado</th>
              <th>Fecha</th>
              <th>Hora</th>
            </thead>
            <tbody> 
            </tbody>
            <tfoot>
             <th>Opciones</th>
              <th>Cliente</th>
              <th>Servicio</th>
              <th>Empleado</th>
              <th>Fecha</th>
              <th>Hora</th>
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


$hoy = getdate();
print_r($hoy['year']."-".$hoy['mon']."-".$hoy['mday']);


ob_end_flush();
  ?>

