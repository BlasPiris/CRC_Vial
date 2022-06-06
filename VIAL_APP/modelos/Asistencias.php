<?php 
//CONEXION CON BBDD
require "../config/Conexion.php";

class Asistencias{


public function __construct(){}


//SELECT DE TODAS LAS ASISTENCIAS
public function listar(){
	$sql="SELECT id_fichaje,nombre,apellidos,tipo_fichaje,fecha_hora FROM fichaje f,empleados e
	 WHERE f.id_empleado=e.id_empleado ";
	return ejecutarConsulta($sql);
}

//SELECT DE ASISTENCIAS DE HOY
public function listar_hoy(){
	$fecha_hoy = date('Y-m-d');
	$sql="SELECT id_fichaje,nombre,apellidos,tipo_fichaje,fecha_hora FROM fichaje f,empleados e
	 WHERE f.id_empleado=e.id_empleado AND fecha_hora >= '$fecha_hoy 00:00:00' AND fecha_hora <= '$fecha_hoy 23:59:59' ";
	return ejecutarConsulta($sql);
}

//SELECT DE ASISTENCIAS POR EMPLEADO Y POR FECHAS
public function asistencia_emp($ini="",$fin="",$emp){
	if($emp!="all"){
		$empleado="AND f.id_empleado=$emp";
	}else{
		$empleado="";
	}
	if($ini!="" && $fin!=""){
		$interval="AND fecha_hora >= '$ini 00:00:00' AND fecha_hora <= '$fin 23:59:59'";
	}else{
		$interval="";
	}
		$sql="SELECT id_fichaje,nombre,apellidos,tipo_fichaje,fecha_hora FROM fichaje f,empleados e
		WHERE f.id_empleado=e.id_empleado $empleado $interval";
	return ejecutarConsulta($sql);
}

//SELECT DE EMPLEADOS
public function empleados(){
	$sql="SELECT id_empleado, nombre, apellidos FROM empleados WHERE estado_laboral = 1";
	return ejecutarConsulta($sql);
}

}
 ?>

