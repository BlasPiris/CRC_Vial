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
            <h1 class="display-5">NOTICIAS</h1>
            <a class="btn btn-success" id="btnagregar" href="noticia_new.php">+ Agregar nueva Noticia</a>
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
              <th>Titulo</th>
              <th>Contenido</th>
              <th>Imagen Web</th>
              <th>Mostrar en Web</th>
            </thead>
            <tbody> 
            </tbody>
            <tfoot>
              <th>Opciones</th>
              <th>Titulo</th>
              <th>Contenido</th>
              <th>Imagen Web</th>
              <th>Mostrar en Web</th>
            </tfoot>   
          </table>
        </div>
      </div>
    </div>
</div>      
       
<?php 


require 'footer.php';
 ?>
 <script src="scripts/noticias.js"></script>
 <?php 
}
ob_end_flush();
  ?>

