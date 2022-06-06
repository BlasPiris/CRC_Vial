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
            <h1 class="display-5">CITAS por Servicio</h1>
            <a class="btn btn-success" id="btnagregar" href="cita_new.php">+ Agregar nueva Cita </a>
          </div>

          <div class="col-md-6 mb-4">
              <div class="row">
                <div class="col-md-6">
                <label>Fecha Inicio</label>
                <input type="date" class="form-control mb-1" name="fecha_inicio" id="fec_ini" >
                </div>

                <div class="col-md-6">
                <label>Fecha Fin</label>
                <input type="date" class="form-control mb-1" name="fecha_fin" id="fec_fin" >
                </div>
              </div>
              
              <div class="row d-flex align-items-end">
                <div class="col-md-6 ">
                  <label>Servicio</label>
                  <select id="ser" class="form-select" >
                   
                  <select>
                </div>
                <div class="col-md-6">
                  <a class="btn btn-info" id="btnagregar" onclick="citaServicio()">Buscar</a>
                </div>
            </div>         
        </div>

        

        <div class="table-responsive" id="listadoregistros">
          <table id="tbllistado_cliente" class="table table-striped table-bordered table-condensed table-hover">
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
ob_end_flush();
  ?>

