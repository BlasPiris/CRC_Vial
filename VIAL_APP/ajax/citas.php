<?php 
//RECOGEMOS SESION 
session_start();

//SOLICITAMOS MODELO
require_once "../modelos/Citas.php";
$citas=new Citas();

//FUNCION QUE LISTA TODAS LAS CITAS
if(isset($_GET["listar"])){
	$rspta=$citas->listar();
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>'<a class="btn btn-warning btn-xs m-1" href="cita_edit.php?id='.$reg->id_cita.'"> ✎</a>
				<a class="btn btn-danger btn-xs m-1" onclick="borrarCita('.$reg->id_cita.')")> ✘</a>',
				"1"=>$reg->nom_cli." ".$reg->ape_cli,
				"2"=>$reg->servicio,
				"3"=>$reg->nom_emp." ".$reg->ape_emp,
				"4"=>$reg->fecha_cita,
				"5"=>$reg->hora_cita,
				);
		}
		$results=array(
             "sEcho"=>1, 
             "iTotalRecords"=>count($data), 
             "iTotalDisplayRecords"=>count($data), 
             "aaData"=>$data); 
		echo json_encode($results);
}

//FUNCION QUE MUESTRA TODAS LAS CITAS PREVIAS SOLICITADAS POR CLIENTES
if(isset($_GET["listar_prev"])){
	$citas->borrarPrevAll();
	$rspta=$citas->listar_prev();
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>'<a class="btn btn-success btn-xs m-1" href="cita_new.php">🗓</a>
				<a class="btn btn-danger btn-xs m-1" onclick="borrarPrev('.$reg->id_solicitud.')")>✘</a>',
				"1"=>$reg->nom_ape,
				"2"=>$reg->telefono,
				"3"=>$reg->email,
				"4"=>$reg->servicio,
				"5"=>$reg->dia,
				"6"=>$reg->horario,
				"7"=>$reg->observacion,
				);
		}
		$results=array(
             "sEcho"=>1, 
             "iTotalRecords"=>count($data), 
             "iTotalDisplayRecords"=>count($data), 
             "aaData"=>$data); 
		echo json_encode($results);
}

//FUNCION QUE BUSCA LOS DATOS DE UNA CITA
if(isset($_GET["buscar"])){
	$rspta=$citas->buscar($_POST["id"]);
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>$reg->id_cliente,
				"1"=>$reg->id_servicio,
				"2"=>$reg->id_empleado,
				"3"=>$reg->fecha_cita,
				"4"=>$reg->hora_cita,
				);
		}
		$results=array(
             "sEcho"=>1, 
             "iTotalRecords"=>count($data), 
             "iTotalDisplayRecords"=>count($data), 
             "aaData"=>$data); 
		echo json_encode($results);
}

//FUNCION QUE LISTA LAS CITAS POR FECHA
if(isset($_GET["listar_fec"])){
	$rspta=$citas->listar_fec($_GET['ini'], $_GET['fin']);
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>'<a class="btn btn-warning btn-xs m-1" href="cita_edit.php?id='.$reg->id_cita.'" > ✎</a>
				<a class="btn btn-danger btn-xs m-1" onclick="borrarCita('.$reg->id_cita.')")> ✘</a>',
				"1"=>$reg->nom_cli." ".$reg->ape_cli,
				"2"=>$reg->servicio,
				"3"=>$reg->nom_emp." ".$reg->ape_emp,
				"4"=>$reg->fecha_cita,
				"5"=>$reg->hora_cita,
				);
		}
		$results=array(
             "sEcho"=>1, 
             "iTotalRecords"=>count($data), 
             "iTotalDisplayRecords"=>count($data), 
             "aaData"=>$data); 
		echo json_encode($results);
}

//FUNCION QUE LISTA TODAS LAS CITAS DE HOY
if(isset($_GET["listar_hoy"])){
	$rspta=$citas->listar_hoy();
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>'<a class="btn btn-warning btn-xs m-1" href="cita_edit.php?id='.$reg->id_cita.'"> ✎</a>
				<a class="btn btn-danger btn-xs m-1" onclick="borrarCita('.$reg->id_cita.')")> ✘</a>',
				"1"=>$reg->nom_cli." ".$reg->ape_cli,
				"2"=>$reg->servicio,
				"3"=>$reg->nom_emp." ".$reg->ape_emp,
				"4"=>$reg->fecha_cita,
				"5"=>$reg->hora_cita,
				);
		}
		$results=array(
             "sEcho"=>1, 
             "iTotalRecords"=>count($data), 
             "iTotalDisplayRecords"=>count($data), 
             "aaData"=>$data); 
		echo json_encode($results);
}

//FUNCION QUE MUESTRA LAS CITAS DE UN CLIENTE
if(isset($_GET["citaCliente"])){
	$rspta=$citas->listar_cli($_GET['ini'], $_GET['fin'],$_GET['id']);
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>'<a class="btn btn-warning btn-xs m-1" href="cita_edit.php?id='.$reg->id_cita.'"> ✎</a>
				<a class="btn btn-danger btn-xs m-1" onclick="borrarCita('.$reg->id_cita.')")> ✘</a>',
				"1"=>$reg->nom_cli." ".$reg->ape_cli,
				"2"=>$reg->servicio,
				"3"=>$reg->nom_emp." ".$reg->ape_emp,
				"4"=>$reg->fecha_cita,
				"5"=>$reg->hora_cita,
				);
		}
		$results=array(
             "sEcho"=>1, 
             "iTotalRecords"=>count($data), 
             "iTotalDisplayRecords"=>count($data), 
             "aaData"=>$data); 
		echo json_encode($results);

}

//FUNCION QUE MUESTRA TODAS LAS CITAS DE UN SERVICIO
if(isset($_GET["citaServicio"])){
	$rspta=$citas->listar_ser($_GET['ini'], $_GET['fin'],$_GET['id']);
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>'<a class="btn btn-warning btn-xs m-1" href="cita_edit.php?id='.$reg->id_cita.'"> ✎</a>
				<a class="btn btn-danger btn-xs m-1" onclick="borrarCita('.$reg->id_cita.')")> ✘</a>',
				"1"=>$reg->nom_cli." ".$reg->ape_cli,
				"2"=>$reg->servicio,
				"3"=>$reg->nom_emp." ".$reg->ape_emp,
				"4"=>$reg->fecha_cita,
				"5"=>$reg->hora_cita,
				);
		}
		$results=array(
             "sEcho"=>1, 
             "iTotalRecords"=>count($data), 
             "iTotalDisplayRecords"=>count($data), 
             "aaData"=>$data); 
		echo json_encode($results);
}

//FUNCION QUE MUESTRA TODAS LAS CITAS DE UN EMPLEADO
if(isset($_GET["citaEmpleado"])){
	$rspta=$citas->listar_emp($_GET['ini'], $_GET['fin'],$_GET['id']);
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			if($_GET["admin"]==1){
				$data[]=array(
					"0"=>'<a class="btn btn-warning btn-xs m-1" href="cita_edit.php?id='.$reg->id_cita.'"> ✎</a>
					<a class="btn btn-danger btn-xs m-1" onclick="borrarCita('.$reg->id_cita.')")> ✘</a>',
					"1"=>$reg->nom_cli." ".$reg->ape_cli,
					"2"=>$reg->servicio,
					"3"=>$reg->nom_emp." ".$reg->ape_emp,
					"4"=>$reg->fecha_cita,
					"5"=>$reg->hora_cita,
					);
			}else{
				$data[]=array(
					"0"=>'',
					"1"=>$reg->nom_cli." ".$reg->ape_cli,
					"2"=>$reg->servicio,
					"3"=>$reg->nom_emp." ".$reg->ape_emp,
					"4"=>$reg->fecha_cita,
					"5"=>$reg->hora_cita,
					);
			}
		}
		$results=array(
             "sEcho"=>1, 
             "iTotalRecords"=>count($data), 
             "iTotalDisplayRecords"=>count($data), 
             "aaData"=>$data); 
		echo json_encode($results);
}

//FUNCION QUE CREA EL SELECT DE CLIENTES
if(isset($_GET["clientes"])){
	$rspta=$citas->clientes();
	while ($reg=$rspta->fetch_object()) {
		echo '<option value=' . $reg->id_cliente.'>'.$reg->nombre.' '.$reg->apellidos.'</option>';
	}
}

//FUNCION QUE CREA EL SELECT DE SERVICIOS
if(isset($_GET["servicios"])){
	$rspta=$citas->servicios();
	while ($reg=$rspta->fetch_object()) {
		echo '<option selected value=' . $reg->id_servicio.'>'.$reg->servicio.'</option>';
	}
}

//FUNCION QUE CREA EL SELECT DE EMPLEADOS
if(isset($_GET["empleados"])){
	if(!isset($_GET['id'])){
		$rspta=$citas->empleados();
		while ($reg=$rspta->fetch_object()) {
		echo '<option value=' . $reg->id_empleado.'>'.$reg->nombre.' '.$reg->apellidos.'</option>';
		}
	}else{
		$rspta=$citas->empleadosServicio($_GET['id']);
		while ($reg=$rspta->fetch_object()) {
		echo '<option value=' . $reg->id_empleado.'>'.$reg->nombre.' '.$reg->apellidos.'</option>';
		}
	}	
}

//FUNCION QUE ENVIA UNA NUEVA CITA A LA BBDD
if(isset($_GET["new"])){
	$citas->nuevo($_POST["cliente"],$_POST["servicio"],$_POST["empleado"],$_POST["fecha"],$_POST["hora"]);
}

//FUNCION QUE MODIFICA UNA CITA A LA BBDD
if(isset($_GET["edit"])){
	$citas->editar($_POST["id"],$_POST["cliente"],$_POST["servicio"],$_POST["empleado"],$_POST["fecha"],$_POST["hora"]);
}

//FUNCION QUE BORRA UNA CITA A LA BBDD
if(isset($_GET["borrar"])){
	$citas->borrar($_GET["borrar"]);
}

//FUNCION QUE BORRA UNA CITA PREVIA A LA BBDD
if(isset($_GET["borrarPrev"])){
	$citas->borrarPrev($_GET["borrarPrev"]);
}


?>