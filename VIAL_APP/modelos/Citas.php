<?php 
//CONEXION CON BBDD
require "../config/Conexion.php";

class Citas{

public function __construct(){}

//SELECT DE TODAS LAS CITAS
public function listar(){
	$sql="SELECT d.id_cita,c.nombre as nom_cli, c.apellidos as ape_cli, s.servicio, e.nombre as nom_emp, e.apellidos as ape_emp ,d.fecha_cita,d.hora_cita
	FROM citas d, clientes c, empleados e, servicios s 
	WHERE d.id_cliente=c.id_cliente AND d.id_servicio=s.id_servicio AND d.id_empleado=e.id_empleado;";
	return ejecutarConsulta($sql);
}

//SELECT TODAS LAS SOLICITUDES CITAS
public function listar_prev(){
	$sql="SELECT * FROM solicitud_cita";
	return ejecutarConsulta($sql);
}

//SELECT DE UNA CITA
public function buscar($id){
	$sql="SELECT d.id_cita,c.id_cliente, s.id_servicio, e.id_empleado ,d.fecha_cita,d.hora_cita
	FROM citas d, clientes c, empleados e, servicios s 
	WHERE d.id_cliente=c.id_cliente AND d.id_servicio=s.id_servicio AND d.id_empleado=e.id_empleado AND d.id_cita LIKE $id";
	return ejecutarConsulta($sql);
}

//SELECT CITAS POR FECHAS
public function listar_fec($ini,$fin){
	$sql="SELECT d.id_cita,c.nombre as nom_cli, c.apellidos as ape_cli, s.servicio, e.nombre as nom_emp, e.apellidos as ape_emp ,d.fecha_cita,d.hora_cita
	FROM citas d, clientes c, empleados e, servicios s 
	WHERE d.id_cliente=c.id_cliente AND d.id_servicio=s.id_servicio AND d.id_empleado=e.id_empleado AND d.fecha_cita >= '$ini' AND d.fecha_cita <= '$fin';";
	return ejecutarConsulta($sql);
}

//SELECT CITAS HOY
public function listar_hoy(){
	$fecha_hoy = date('Y-m-d');
	$sql="SELECT d.id_cita,c.nombre as nom_cli, c.apellidos as ape_cli, s.servicio, e.nombre as nom_emp, e.apellidos as ape_emp ,d.fecha_cita,d.hora_cita
	FROM citas d, clientes c, empleados e, servicios s 
	WHERE d.id_cliente=c.id_cliente AND d.id_servicio=s.id_servicio AND d.id_empleado=e.id_empleado AND d.fecha_cita LIKE '$fecha_hoy'";
	return ejecutarConsulta($sql);
}

//SELECT CITAS POR CLIENTE
public function listar_cli($ini="",$fin="",$cli){
	if($ini=="" && $fin==""){
		$sql="SELECT d.id_cita,c.nombre as nom_cli, c.apellidos as ape_cli, s.servicio, e.nombre as nom_emp, e.apellidos as ape_emp ,d.fecha_cita,d.hora_cita
	FROM citas d, clientes c, empleados e, servicios s 
	WHERE d.id_cliente=c.id_cliente AND d.id_servicio=s.id_servicio AND d.id_empleado=e.id_empleado AND c.id_cliente=$cli;";

	}else{
		$sql="SELECT d.id_cita,c.nombre as nom_cli, c.apellidos as ape_cli, s.servicio, e.nombre as nom_emp, e.apellidos as ape_emp ,d.fecha_cita,d.hora_cita
	FROM citas d, clientes c, empleados e, servicios s 
	WHERE d.id_cliente=c.id_cliente AND d.id_servicio=s.id_servicio AND d.id_empleado=e.id_empleado AND d.fecha_cita >= '$ini' AND d.fecha_cita <= '$fin' AND c.id_cliente=$cli;";
	}
	return ejecutarConsulta($sql);
}


//SELECT CITAS POR SERVICIO
public function listar_ser($ini="",$fin="",$ser){
	if($ini=="" && $fin==""){
		$sql="SELECT d.id_cita,c.nombre as nom_cli, c.apellidos as ape_cli, s.servicio, e.nombre as nom_emp, e.apellidos as ape_emp ,d.fecha_cita,d.hora_cita
	FROM citas d, clientes c, empleados e, servicios s 
	WHERE d.id_cliente=c.id_cliente AND d.id_servicio=s.id_servicio AND d.id_empleado=e.id_empleado AND s.id_servicio=$ser;";

	}else{
		$sql="SELECT d.id_cita,c.nombre as nom_cli, c.apellidos as ape_cli, s.servicio, e.nombre as nom_emp, e.apellidos as ape_emp ,d.fecha_cita,d.hora_cita
	FROM citas d, clientes c, empleados e, servicios s 
	WHERE d.id_cliente=c.id_cliente AND d.id_servicio=s.id_servicio AND d.id_empleado=e.id_empleado AND d.fecha_cita >= '$ini' AND d.fecha_cita <= '$fin' AND s.id_servicio=$ser;";
	}
	return ejecutarConsulta($sql);
}

//SELECT CITAS POR EMPLEADO
public function listar_emp($ini="",$fin="",$emp){
	if($ini=="" && $fin==""){
		$sql="SELECT d.id_cita,c.nombre as nom_cli, c.apellidos as ape_cli, s.servicio, e.nombre as nom_emp, e.apellidos as ape_emp ,d.fecha_cita,d.hora_cita
	FROM citas d, clientes c, empleados e, servicios s 
	WHERE d.id_cliente=c.id_cliente AND d.id_servicio=s.id_servicio AND d.id_empleado=e.id_empleado AND e.id_empleado=$emp;";
	}else{
		$sql="SELECT d.id_cita,c.nombre as nom_cli, c.apellidos as ape_cli, s.servicio, e.nombre as nom_emp, e.apellidos as ape_emp ,d.fecha_cita,d.hora_cita
	FROM citas d, clientes c, empleados e, servicios s 
	WHERE d.id_cliente=c.id_cliente AND d.id_servicio=s.id_servicio AND d.id_empleado=e.id_empleado AND d.fecha_cita >= '$ini' AND d.fecha_cita <= '$fin' AND e.id_empleado=$emp;";
	}
	return ejecutarConsulta($sql);
}

//SELECT DE CLIENTES
public function clientes(){
	$sql="SELECT id_cliente, nombre, apellidos FROM clientes";
	return ejecutarConsulta($sql);
}

//SELECT DE SERVICIOS
public function servicios(){
	$sql="SELECT id_servicio, servicio FROM servicios WHERE servicio_activo LIKE 1";
	return ejecutarConsulta($sql);
}

//SELECT DE EMPLEADOS
public function empleados(){
	$sql="SELECT id_empleado, nombre, apellidos FROM empleados WHERE estado_laboral LIKE 1";
	return ejecutarConsulta($sql);
}

//SELECT DE EMPLEADOS QUE REALIZAN UN SERVICIO
public function empleadosServicio($id){
	$sql="SELECT e.id_empleado, nombre, apellidos FROM empleados e,servicios_empleados s WHERE e.id_empleado=s.id_empleado AND s.id_servicio LIKE $id AND estado_laboral='1'";
	return ejecutarConsulta($sql);
}

//INSERT DE CITA
public function nuevo($cliente,$servicio,$empleado,$fecha,$hora){
	echo $sql="INSERT INTO `citas` (`id_cliente`, `id_servicio`, `id_empleado`, `fecha_cita`, `hora_cita`)
	VALUES ('$cliente','$servicio','$empleado','$fecha','$hora')";
	return ejecutarConsulta($sql);
}

//UPDATE DE CITA
public function editar($id,$cliente,$servicio,$empleado,$fecha,$hora){
	echo $sql="UPDATE `citas` SET `id_cliente`='$cliente',`id_servicio`='$servicio',`id_empleado`='$empleado',`fecha_cita`='$fecha',`hora_cita`='$hora' 
	WHERE `id_cita` LIKE $id" ;
	return ejecutarConsulta($sql);
}

//DELETE DE CITA
public function borrar($id){
	echo $sql="DELETE FROM citas WHERE id_cita LIKE $id";
	return ejecutarConsulta($sql);
}

//DELETE DE CITA PREVIA
public function borrarPrev($id){
	echo $sql="DELETE FROM solicitud_cita WHERE id_solicitud LIKE $id";
	return ejecutarConsulta($sql);
}

//DELETE DE CITA PREVIA CON MAS DE 15 DIAS DE SOLICITUD
public function borrarPrevAll(){
	$fecha=date("Y-m-d H:i:s",strtotime(date("Y-m-d H:i:s")." - 2 week"));
	 $sql="DELETE FROM solicitud_cita WHERE `fec_solicitud`< '$fecha' ";
	return ejecutarConsulta($sql);
}







}



 ?>

