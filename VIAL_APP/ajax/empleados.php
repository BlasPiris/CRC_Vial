<?php 
//RECOGEMOS SESION
session_start();

//SOLICITAMOS MODELO
require_once "../modelos/Empleados.php";
$empleados=new Empleados();

//FUNCION QUE LISTA LOS EMPLEADOS
if(isset($_GET["listar"])){
	$rspta=$empleados->listar();
		$data=Array();
		while ($reg=$rspta->fetch_object()) {

			if($reg->visualizar_web==0){
				$reg->visualizar_web="NO";
			}else{
				$reg->visualizar_web="SI";
			}
			if($reg->estado_laboral==1){
				$reg->estado_laboral="Activo";
				$botonActivo='<a class="btn btn-danger btn-xs m-1" onclick="desactivarEmpleado('.$reg->id_empleado.')")> ✘</a>';
			}else{
				$reg->estado_laboral="Baja";
				$botonActivo='<a class="btn btn-success btn-xs m-1" onclick="activarEmpleado('.$reg->id_empleado.')")> ✓</a>';
			}
			if($reg->imagen==""){
				$reg->imagen="nophoto_user.jpg";
			}
			$data[]=array(
				"0"=>'<a class="btn btn-warning btn-xs m-1" href="empleado_edit.php?id='.$reg->id_empleado.'"> ✎</a>'.$botonActivo,
				"1"=>$reg->nombre." ".$reg->apellidos,
				"2"=>$reg->usuario,
				"3"=>'<img src="../img/'.$reg->imagen.'"  height="50px" width="50px">',
				"4"=>$reg->telefono,
				"5"=>$reg->email,
				"6"=>$reg->visualizar_web,
				"7"=>$reg->estado_laboral,
				"8"=>$reg->rol
				);
		}
		$results=array(
             "sEcho"=>1,
             "iTotalRecords"=>count($data),
             "iTotalDisplayRecords"=>count($data),
             "aaData"=>$data); 
		echo json_encode($results);
}

//FUNCION QUE LISTA TODOS LOS SERVICIOS DE UN EMPLEADO
if(isset($_GET["serviciosEmpleado"])){
	$rspta=$empleados->serviciosEmpleado($_GET["id"]);
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>'<a class="btn btn-danger btn-xs m-1" onclick="borrarServicioEmpleado('.$reg->id_empleado.','.$reg->id_servicio.')")> ✘</a>',
				"1"=>$reg->nombre." ".$reg->apellidos,
				"2"=>$reg->servicio,
				);
		}
		$results=array(
             "sEcho"=>1,
             "iTotalRecords"=>count($data),
             "iTotalDisplayRecords"=>count($data),
             "aaData"=>$data); 
		echo json_encode($results);
}

//FUNCION QUE LISTA TODOS LOS EMPLEADOS QUE OFRECEN UN SERVICIO
if(isset($_GET["empleadosServicio"])){
	$rspta=$empleados->empleadosServicio($_GET["id"]);
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>'<a class="btn btn-danger btn-xs m-1" onclick="borrarServicioEmpleado('.$reg->id_empleado.','.$reg->id_servicio.')")> ✘</a>',
				"1"=>$reg->nombre." ".$reg->apellidos,
				"2"=>$reg->servicio,
				);
		}
		$results=array(
             "sEcho"=>1,
             "iTotalRecords"=>count($data),
             "iTotalDisplayRecords"=>count($data),
             "aaData"=>$data); 
		echo json_encode($results);
}

//FUNCION QUE BORRA SERVICIO A EMPLEADO
if(isset($_GET["delseremp"])){
	$empleados->borrarServicioEmpleado($_GET["ser"],$_GET["emp"]);
}

//FUNCION QUE DA DE ALTA UN EMPLEADO
if(isset($_GET["activar"])){
	$empleados->activar($_GET["activar"]);
}

//FUNCION QUE DA DE BAJA UN EMPLEADO
if(isset($_GET["desactivar"])){
	$empleados->desactivar($_GET["desactivar"]);
}

//FUNCION MONTA EL SELECT CON LOS ROLES DE EMPLEADO
if(isset($_GET["roles"])){
	$rspta=$empleados->roles();
	while ($reg=$rspta->fetch_object()) {
		echo '<option selected value=' . $reg->id_rol.'>'.$reg->rol.'</option>';
	}
}

//FUNCION QUE BUSCA LOS DATOS DE UN EMPLEADO
if(isset($_GET["buscar"])){
	$rspta=$empleados->empleado($_POST["id"]);
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>$reg->id_empleado,
				"1"=>$reg->nombre,
				"2"=>$reg->apellidos,
				"3"=>$reg->dni,
				"4"=>$reg->usuario,
				"5"=>$reg->contraseña,
				"6"=>$reg->email,
				"7"=>$reg->telefono,
				"8"=>$reg->imagen,
				"9"=>$reg->rol_usuario,
				"10"=>$reg->visualizar_web,
				);
		}
		$results=array(
             "sEcho"=>1,
             "iTotalRecords"=>count($data),
             "iTotalDisplayRecords"=>count($data),
             "aaData"=>$data); 
		echo json_encode($results);
}


//FUNCION QUE ALMACENA LOS AVATARES DE LOS EMPLEADOS
if(isset($_GET["img"])){
	if(!isset($_FILES["file"]["type"])){
		echo 1;
	}else{
		if (($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/png")
		|| ($_FILES["file"]["type"] == "image/gif")) {
			
		if (move_uploaded_file($_FILES["file"]["tmp_name"], "../img/".$_FILES['file']['name'])) {
			echo $_FILES['file']['name'];
		} else {
			echo 0;
		}
	} else {
		echo 0;
	}
	}
}

//FUNCION QUE MANDA NUEVO EMPLEADO A LA BBDD
if(isset($_GET["new"])){
	echo($empleados->nuevo($_POST["nombre"],$_POST["apellidos"],$_POST["dni"],$_POST["telefono"],$_POST["email"],$_POST["usuario"],$_POST["contrasena"],$_POST["img"],$_POST["rol"],$_POST["web"]));
}

//FUNCION QUE EDITA UN EMPLEADO DE LA BBDD
if(isset($_GET["edit"])){
	echo($empleados->editar($_POST['id'],$_POST["nombre"],$_POST["apellidos"],$_POST["dni"],$_POST["telefono"],$_POST["email"],$_POST["usuario"],$_POST["contrasena"],$_POST["img"],$_POST["rol"],$_POST["web"]));
}

?>