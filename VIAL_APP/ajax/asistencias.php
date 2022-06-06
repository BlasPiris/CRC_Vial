<?php 
//RECOGEMOS SESION 
session_start();

//SOLICITAMOS MODELO
require_once "../modelos/Asistencias.php";
$asistencias=new Asistencias();


//FUNCION QUE LISTAMOS TODAS LAS ASISTENCIAS
if(isset($_GET["listar"])){
	$rspta=$asistencias->listar();
	$data=Array();
	while ($reg=$rspta->fetch_object()) {
		$data[]=array(
			"0"=>$reg->nombre." ".$reg->apellidos,
			"1"=>$reg->tipo_fichaje,
			"2"=>$reg->fecha_hora,
			);
	}
	$results=array(
		 "sEcho"=>1,
		 "iTotalRecords"=>count($data),
		 "iTotalDisplayRecords"=>count($data),
		 "aaData"=>$data); 
	echo json_encode($results);
}

//FUNCION QUE LISTAMOS LAS ASISTENCIAS DE HOY
if(isset($_GET["listar_hoy"])){
	$rspta=$asistencias->listar_hoy();
		//declaramos un array
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>$reg->nombre." ".$reg->apellidos,
				"1"=>$reg->tipo_fichaje,
				"2"=>$reg->fecha_hora,
				);
		}
		$results=array(
             "sEcho"=>1, 
             "iTotalRecords"=>count($data),
             "iTotalDisplayRecords"=>count($data),
             "aaData"=>$data); 
		echo json_encode($results);
}

//FUNCION QUE LISTAMOS LAS ASISTENCIAS POR EMPLEADO Y POR FECHA
if(isset($_GET["asistenciaEmpleado"])){
	$rspta=$asistencias->asistencia_emp($_GET['ini'], $_GET['fin'],$_GET['id']);
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>$reg->nombre." ".$reg->apellidos,
				"1"=>$reg->tipo_fichaje,
				"2"=>$reg->fecha_hora,
				);
			
		}
		$results=array(
             "sEcho"=>1, 
             "iTotalRecords"=>count($data),
             "iTotalDisplayRecords"=>count($data),
             "aaData"=>$data); 
		echo json_encode($results);

}

//FUNCION QUE CREA EL SELECT DE EMPLEADOS
if(isset($_GET["empleados"])){
	echo "<option value='all'>-- TODOS --</option>";
	$rspta=$asistencias->empleados();
	while ($reg=$rspta->fetch_object()) {
		echo '<option value=' . $reg->id_empleado.'>'.$reg->nombre.' '.$reg->apellidos.'</option>';
	}
}	
?>