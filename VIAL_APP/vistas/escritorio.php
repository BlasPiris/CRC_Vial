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
<div class="container" style="min-height:1000px;">
  <div class="row m-5">

  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="small-box bg-blue">
    <div class="inner">
      <h4 style="font-size: 20px;">
        <strong>Citas</strong>
      </h4>
      
    </div>
    
    <?php if($_SESSION['rol_usuario']==1){ ?>
            <a href="cita_previa.php" class="small-box-footer" >Solicitudes Cita Previa ᐅ </a>
            <a href="cita_new.php" class="small-box-footer" >Nueva Cita  ᐅ</a>
            <a href="cita_list_today.php"class="small-box-footer" >Citas de hoy  ᐅ</a>
            <a href="cita_list.php" class="small-box-footer" >Buscar Citas  ᐅ</a>
            <a href="cita_list_cliente.php" class="small-box-footer" >Buscar Citas por Cliente  ᐅ</a>
            <a href="cita_list_servicio.php" class="small-box-footer">Buscar Citas por Servicio  ᐅ</a>
            <a href="cita_list_empleado.php" class="small-box-footer" >Buscar Citas por Empleado  ᐅ</a>
    <?php }else{ ?>
      <a href="cita_list_empleado.php" class="small-box-footer">Mis citas  ᐅ</a>
   <?php } ?>
  </div>
</div>


<?php if($_SESSION['rol_usuario']==1){ ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="small-box bg-orange">
        <div class="inner">
          <h4 style="font-size: 20px;">
            <strong>Clientes</strong>
          </h4>
        
        </div>
        <a href="cliente_new.php" class="small-box-footer">Nuevo Cliente  ᐅ</a>
        <a href="cliente_list.php" class="small-box-footer">Buscar Clientes  ᐅ</a>
      </div>
    </div>

   

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="small-box bg-green">
    <div class="inner">
      <h4 style="font-size: 20px;">
        <strong>Servicios   </strong>
      </h4>
      
    </div>
    <a href="servicio_new.php" class="small-box-footer">Nuevo Servicio  ᐅ</a>
    <a href="servicio_list.php" class="small-box-footer">Buscar Servicios  ᐅ</a>
    <a href="emp_serv_set.php" class="small-box-footer">Agregar Servicio a Empleado  ᐅ</a>
  </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="small-box bg-purple">
    <div class="inner">
      <h4 style="font-size: 20px;">
        <strong>Empleados</strong>
      </h4>
    </div>
    <a href="empleado_new.php" class="small-box-footer">Nuevo Empleado  ᐅ</a>
    <a href="empleado_list.php" class="small-box-footer">Buscar Empleados  ᐅ</a>
    <a href="emp_serv_list.php" class="small-box-footer">Ver Servicios de Empleados  ᐅ</a>
  </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="small-box bg-yellow">
    <div class="inner">
      <h4 style="font-size: 20px;">
        <strong>Noticias</strong>
      </h4>
    </div>
    <a href="noticia_new.php" class="small-box-footer">Nueva Noticia  ᐅ</a>
    <a href="noticia_list.php" class="small-box-footer">Buscar Noticias  ᐅ</a>
  </div>
</div>
<?php }?>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="small-box bg-red">
    <div class="inner">
      <h4 style="font-size: 20px;">
        <strong>Asistencia</strong>
      </h4>
    </div>
    <a href="fichar.php" class="small-box-footer">Fichar  ᐅ</a>
    <?php if($_SESSION['rol_usuario']==1){ ?>
    <a href="asistencia_list_today.php" class="small-box-footer">Asistencias de hoy  ᐅ</a>
    <a href="asistencia_list.php" class="small-box-footer">Buscar Asistencias  ᐅ</a>
    <?php }else{ ?>
      <a href="asistencia_list.php" class="small-box-footer">Mis asistencias  ᐅ</a>
      <?php } ?>
  </div>
</div>



  </div>
</div>




<?php
require 'footer.php'; 
}
ob_end_flush();
?>