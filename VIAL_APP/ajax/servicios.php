<?php 
//RECOGEMOS SESION
session_start();

//SOLICITAMOS MODELO
require_once "../modelos/Servicios.php";
$servicios=new Servicios();

//FUNCION QUE NOS MUESTRA TODOS LOS SERVICIOS
if(isset($_GET["listar"])){
	$rspta=$servicios->listar();
		//declaramos un array
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			if($reg->mostrar_web==0){
				$reg->mostrar_web="NO";
			}else{
				$reg->mostrar_web="SI";
			}
			if($reg->servicio_activo==0){
				$reg->servicio_activo="Inactivo";
				$botonActivo='<a class="btn btn-success btn-xs m-1" onclick="activarServicio('.$reg->id_servicio.')")> ✓</a>';
			}else{
				$reg->servicio_activo="Activo";
				$botonActivo='<a class="btn btn-danger btn-xs m-1" onclick="borrarServicio('.$reg->id_servicio.')")> ✘</a>';
			}
			$data[]=array(
				"0"=>'<a class="btn btn-warning btn-xs m-1" href="servicio_edit.php?id='.$reg->id_servicio.'"> ✎</a>'.$botonActivo,
				"1"=>$reg->servicio,
				"2"=>$reg->descripcion,
				"3"=>'<img src="../img/'.$reg->imagen.'"  height="auto" width="200px">',
				"4"=>$reg->mostrar_web,
				"5"=>$reg->servicio_activo,
				
				
				);
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);

}

//FUNCION QUE NOS DA LOS DATOS DE UN SERVICIO
if(isset($_GET["buscar"])){
	$rspta=$servicios->servicio($_POST["id"]);
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>$reg->id_servicio,
				"1"=>$reg->servicio,
				"2"=>$reg->descripcion,
				"3"=>$reg->imagen,
				"4"=>$reg->mostrar_web,
				);
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);

}


//FUNCION QUE ACTIVA UN SERVICIO
if(isset($_GET["activar"])){
	$servicios->activar($_GET["activar"]);
}

//FUNCION QUE DESACTIVA UN SERVICIO
if(isset($_GET["borrar"])){
	$servicios->borrar($_GET["borrar"]);
}

//FUNCION QUE ENVIA NUEVO SERVICIO A LA BBDD
if(isset($_GET["new"])){
	$servicios->nuevo($_POST["nombre"],$_POST["descripcion"],$_POST["img"],$_POST["web"]);
}

//FUNCION QUE EDITA UN SERVICIO EN LA BBDD
if(isset($_GET["edit"])){
	$servicios->editar($_POST["id"],$_POST["nombre"],$_POST["descripcion"],$_POST["img"],$_POST["web"]);
}

//FUNCION QUE SUBE IMAGEN DEL SERVICIO
if(isset($_GET["img"])){
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

//FUNCION QUE NOS GENERA EL SELECT DE SERVICIOS
if(isset($_GET["servicios"])){
	$rspta=$servicios->servicios();
	while ($reg=$rspta->fetch_object()) {
		echo '<option selected value=' . $reg->id_servicio.'>'.$reg->servicio.'</option>';
	}
}

//FUNCION QUE NOS GENERA EL SELECT DE EMPLEADOS
if(isset($_GET["empleados"])){
	$rspta=$servicios->empleadosServicio($_GET['id']);
		while ($reg=$rspta->fetch_object()) {
		echo '<option value=' . $reg->id_empleado.'>'.$reg->nombre.' '.$reg->apellidos.'</option>';
	}
}

//FUNCION QUE NOS AÑADE UN SERVICIO A UN EMPLEADO
if(isset($_GET["addSerEmp"])){
	$rspta=$servicios->addSerEmp($_GET['ser'],$_GET['emp']);
}
?>