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
          <h1 class="display-5">EDITAR NOTICIA</h1>
        </div>
        
      <form action="" name="formulario" id="formulario" method="POST">
    <div class="row align-items-center">

      <div class="form-group col-lg-5 col-md-5 col-xs-12 mb-2">
      <label>Titulo noticia</label>
        <input type="text" id="titulo" class="form-control" onkeydown="validarFormularioEdit()">
      </div>

      <div class="form-group col-lg-5 col-md-5 col-xs-12">
      <label for="">Imagen para Web</label>
        <input class="form-control filestyle" data-buttonText="Seleccionar foto" type="file" name="imagen" id="imagen" onchange="validarFormularioEdit()">
    </div>

      <div class="form-group col-lg-2 col-md-2 col-xs-12 mb-2">
      <label>Mostrar en Web</label>
        <input type="checkbox" class="form-check-input" id="web">
      </div>

      <div class="form-group col-lg-12 col-md-12 col-xs-12 mb-2">
      <label>Contenido de la Noticia</label>
        <textarea class="form-control"  rows="3" id="contenido" onkeydown="validarFormularioEdit()"></textarea>
      </div>


      

    </div>

    

    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 m-4">
      <button type='button' id="guardar" class="btn btn-primary"  onclick="editarNoticia(<?php echo $_GET['id']?>)"> 🖪 Guardar Noticia</button>
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
 <script src="scripts/noticias.js"></script>
 <script>formularioEditar(<?php echo $_GET['id']?>)</script>
 <script>validarFormularioEdit()</script>
 <?php 
}

ob_end_flush();
  ?>

