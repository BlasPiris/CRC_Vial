<?php 

//CONEXION CON BBDD
require './config/Conexion.php';

//FECHA EN FORMATO ESPAÑOL
setlocale(LC_TIME, "spanish");

//FUNCION QUE GENERA SELECT CON SERVICIOS ACTIVOS
function mostrarServiciosSelect(){
    $sql="SELECT * FROM servicios WHERE mostrar_web=1 AND servicio_activo=1";
	$result=ejecutarConsulta($sql);
    while ($reg=$result->fetch_object()){
        echo '<option value="'.$reg->servicio.'">'.$reg->servicio.'</option>';
    }
}

//FUNCION QUE MONTA EL CARRUSEL DE SERVICIOS EN INDEX
function mostrarServiciosIndex(){
	$sql="SELECT * FROM servicios WHERE mostrar_web=1 AND servicio_activo=1";
	$result=ejecutarConsulta($sql);
    ?>
   
   <div id="carouselExampleControls1" class=" news carousel slide" data-bs-ride="carousel">
    <div class="titulo-seccion">
            <h2>NUESTROS SERVICIOS</h2>
            <p>Ofrecemos a nuestros clientes una gran variedad de servicios<p>
    </div>
    <div class="carousel-inner">
      <?php while ($reg=$result->fetch_object()){
          if(!isset($active)){
              $active="active";
          }else{
            $active="";
          } ?>
            <div class="servicios carousel-item <?php echo $active ?>">
                <div class="container-fluid">
                    <div class="row align-items-start  d-flex align-items-center text-center servicios-item">
                    <div class="col-md-6">
                           <h3 class="display-5">
                               <a href="servicios.php#<?php echo  $reg->id_servicio ?>"><?php echo  $reg->servicio ?></a>
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <img src="../VIAL_APP/img/<?php echo  $reg->imagen ?>" alt="Image" class="img-fluid">
                        </div>
                        
                    </div>
                </div>
            </div>
    <?php }?>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    <?php
}

//FUNCION QUE MONTA EL CARRUSEL DE LAS NOTICIAS DEL INDEX
function ultimaNoticiaIndex(){
    $sql="SELECT * FROM `noticias` WHERE `mostrar_web`=1 ORDER BY `fecha_publicacion` DESC LIMIT 10 ";
	$result=ejecutarConsulta($sql);
    ?>

<div id="carouselExampleControls" class=" news carousel slide" data-bs-ride="carousel">
    <div class="titulo-seccion">
            <h2>Últmas noticias</h2>
    </div>
    <div class="carousel-inner">
      <?php while ($reg=$result->fetch_object()){
          if(!isset($active)){
              $active="active";
          }else{
            $active="";
          } ?>
            <div class="carousel-item <?php echo $active ?>">
                <div class="container-fluid">
                    <div class="row align-items-start m-3">
                        <div class="col-md-6">
                            <img src="../VIAL_APP/img/<?php echo  $reg->imagen ?>" alt="Image" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                        <p><?php echo strftime("%d de %B de %Y",strtotime($reg->fecha_publicacion));?></p>
                            <h4 class="section-title"><?php echo  $reg->titulo ?></h4>
                            <p><?php echo  $reg->contenido ?></p>
                        </div>
                    </div>
                </div>
            </div>
    <?php }?>
</div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon bg-danger " aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon bg-danger" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
     
    <?php
}

//FUNCION QUE MUESTRA LAS NOTICIAS EN PAGINA DE NOTICIAS
function mostrarNoticias(){
	$sql="SELECT * FROM `noticias` WHERE `mostrar_web`=1 ORDER BY `fecha_publicacion` DESC LIMIT 10";
	$result=ejecutarConsulta($sql);
    $left=true;
    while ($reg=$result->fetch_object()){
        if(!isset($hr)){
            $hr=true;
        }else{
            echo '<hr>';
        }
        ?>
       <div class="container-fluid mb-2">
                    <div class="row align-items-start">
                        <div class="col-md-5">
                            <img src="../VIAL_APP/img/<?php echo  $reg->imagen ?>" alt="Image" class="img-fluid">
                        </div>
                        <div class="col-md-7">
                        <p><?php echo strftime("%d de %B de %Y",strtotime($reg->fecha_publicacion));?></p>
                            <h4 class="section-title"><?php echo  $reg->titulo ?></h4>
                            <p><?php echo  $reg->contenido ?></p>
                        </div>
                    </div>
                </div>
        <?php
    }
}

//FUNCION QUE MUESTRA LOS EMPLEADOS EN QUIENES SOMOS
function mostrarProfesionales(){
    $sql="SELECT * FROM empleados WHERE visualizar_web=1 AND estado_laboral=1";
	$result=ejecutarConsulta($sql);
    while ($reg=$result->fetch_object()){
    ?>
     <div class="col-sm-6 col-lg-3 ">
        <div class="profesionales-item">
            <div class="profesionales-img"> 
                <?php if($reg->imagen==""){
                     echo '<img src="../VIAL_APP/img/nophoto_user.jpg" alt="profesionales">';
                }else{
                    echo '<img src="../VIAL_APP/img/'.$reg->imagen.'" alt="profesionales">';
                }
                
                ?>
            </div>
            <div class="profesionales-text">
                <h3><?php echo $reg->nombre." ".$reg->apellidos ?></h3>
            </div>
        </div>
    </div>
    <?php
    }
}


//FUNCION QUE MUESTRA LOS SERVICIOS EN LA PAGINA DE SERVICIOS
function mostrarServicios(){
	$sql="SELECT * FROM servicios WHERE mostrar_web=1 AND servicio_activo=1";
	$result=ejecutarConsulta($sql);
    $left=true;
    while ($reg=$result->fetch_object()){
        if(!isset($hr)){
            $hr=true;
        }else{
            echo '<hr>';
        }
        ?>
       <div class="servicios-sec">
                <div class="container">
                    <div class="row align-items-center" id="<?php echo $reg->id_servicio?>">
                    <?php if($left==false){ ?>
                        <div class="col-md-6 order-1 order-md-1 ">
                            <div class="servicios-sec-img">
                                <img src="../VIAL_APP/img/<?php echo $reg->imagen  ?>" alt="Service" class="img-fluid rounded-pill">
                            </div>
                        </div>
                        <?php }?>
                        <div class="col-md-6  order-2 ">
                            <div class="servicios-sec-text">
                                <h2 class="section-title"><?php echo $reg->servicio  ?></h2>
                                <p>
                                <?php echo $reg->descripcion ?>
                                </p>
                            </div>
                        </div>
                        <?php if($left==true){?>
                        <div class="col-md-6 order-1 order-md-2 ">
                            <div class="servicios-sec-img">
                                <img src="../VIAL_APP/img/<?php echo $reg->imagen  ?>" alt="Service" class="img-fluid rounded-pill">
                            </div>
                        </div>
                        <?php }
                          if($left==false){$left=true;}else{$left=false;} ?>
                    </div>
                </div>
            </div>
        <?php
    }
}



?>