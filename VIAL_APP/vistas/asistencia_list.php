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
            <h1 class="display-5">ASISTENCIAS</h1>
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
              <?php if($_SESSION['rol_usuario']==1){ ?>
                <div class="col-md-6 ">
                  <label>Empleado</label>
                  <select id="emp" class="form-select" >
                  <select>
                </div>
                <div class="col-md-6">
                  <a class="btn btn-info" id="btnagregar" onclick="asistenciasEmpleado()">Buscar</a>
                </div>
                <?php }else{?>
                  <div class="col-md-6">
                    <a class="btn btn-info" id="btnagregar" onclick="asistenciasEmpleado(<?php echo $_SESSION['id_empleado']?>)">Buscar</a>
                  </div>
                <?php } ?>
            </div>         
        </div>

        

        <div class="table-responsive" id="listadoregistros">
          <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              
              <th>Emplado</th>
              <th>Tipo</th>
              <th>Fecha Fichaje</th>
            </thead>
            <tbody> 
            </tbody>
            <tfoot>
            
              <th>Emplado</th>
              <th>Tipo</th>
              <th>Fecha Fichaje</th>
            </tfoot>   
          </table>
        </div>
      </div>
    </div>
</div>      
       
<?php 


require 'footer.php';
 ?>
 <script src="scripts/asistencias.js"></script>
 
 <?php 
 
if($_SESSION['rol_usuario']!=1){ 
  echo "<script> asistenciasEmpleado(".$_SESSION['id_empleado'].")</script>";
}else{
  echo "<script> listar()</script>";
}

}
ob_end_flush();
  ?>

