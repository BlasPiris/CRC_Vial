 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>VIAL</title>
   <link href="img/logo_ico.png" rel="icon">
    <!-- CSS -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../extra/css/font-awesome.css">
    <link rel="stylesheet" href="../extra/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../extra/css/_all-skins.min.css">
    <link rel="stylesheet" href="./css/css.css">
    <link rel="stylesheet" type="text/css" href="../extra/datatables/jquery.dataTables.min.css">    
    <link href="../extra/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../extra/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../extra/css/bootstrap-select.min.css">
  </head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <div class="container-fluid">
    <a href="escritorio.php"><img class="navbar-brand" src="../img/logo.png" ></a>
      
      <li class="nav-item dropdown" style="list-style:none">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <?php echo $_SESSION['nombre']." (".$_SESSION['usuario'].")"; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="nav-link" href="fichar.php">Fichar</a></li>
            <li><a class="nav-link" href="../ajax/login.php?salir=yes">Salir</a></li>
          </ul>
        </li>

        
      
    </div>
  </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-light border">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span>Citas</span>
          </a>
          <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
          <?php if($_SESSION['rol_usuario']==1){ ?>
            <li> <a href="cita_previa.php" class="nav-link" >Solicitudes Cita Previa</a></li>
          <li><a href="cita_new.php" class="nav-link">Nueva Cita</a></li>
          <li><a href="cita_list_today.php" class="nav-link ">Citas de hoy</a></li>
            <li><a href="cita_list.php" class="nav-link ">Buscar Citas</a></li>
            <li><a href="cita_list_cliente.php" class="nav-link ">Buscar Citas por Cliente</a></li>
            <li><a href="cita_list_servicio.php" class="nav-link ">Buscar Citas por Servicio</a></li>
            <li><a href="cita_list_empleado.php" class="nav-link ">Buscar Citas por Empleado</a></li>
            <?php }else{ ?>
              <li><a href="cita_list_empleado.php" class="nav-link ">Mis citas</a></li>
              <?php } ?>
          </ul>
      </li>
      <?php if($_SESSION['rol_usuario']==1){ ?>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span>Clientes</span>
          </a>
          <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
          <li><a href="cliente_new.php" class="nav-link ">Nuevo Cliente</a></li>
            <li><a href="cliente_list.php" class="nav-link ">Buscar Clientes</a></li>
           
          </ul>
      </li>
     
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span>Servicios</span>
          </a>
          <ul class="dropdown-menu  " aria-labelledby="navbarDropdown">
          <li><a href="servicio_new.php" class="nav-link">Nuevo Servicio</a></li>
          <li><a href="servicio_list.php" class="nav-link ">Buscar Servicios</a></li>
          <li><a href="emp_serv_set.php" class="nav-link "> Agregar Servicio a Empleado </a></li>
          </ul>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span>Empleados</span>
          </a>
          <ul class="dropdown-menu  " aria-labelledby="navbarDropdown">
          <li><a href="empleado_new.php" class="nav-link ">Nuevo Empleado</a></li> 
          <li><a href="empleado_list.php" class="nav-link ">Buscar Empleados</a></li>
          <li><a href="emp_serv_list.php" class="nav-link ">Ver Servicios de Empleados</a></li>  
          </ul>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span>Noticias</span>
          </a>
          <ul class="dropdown-menu  " aria-labelledby="navbarDropdown">
          <li><a href="noticia_new.php" class="nav-link ">Nueva Noticia</a></li> 
          <li><a href="noticia_list.php" class="nav-link ">Buscar Noticias</a></li>
          </ul>
      </li>
      <?php  } ?>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <span>Asistencia</span>
          </a>
          <ul class="dropdown-menu  " aria-labelledby="navbarDropdown">
          <?php if($_SESSION['rol_usuario']==1){ ?>
          <li><a href="asistencia_list_today.php"  class="nav-link " >Asistencias de hoy</a></li>
          <li><a href="asistencia_list.php" class="nav-link " > Buscar Asistencias</a></li> 
          <?php }else{ ?>
            <li><a href="asistencia_list.php" class="nav-link " >Mis asistencias</a></li> 
            <?php } ?>
          </ul>
      </li>
      <li>
      <a href="fichar.php" class="nav-link">Fichar</a>
      </li>
      
      
    </div>
  </div>
</nav>

