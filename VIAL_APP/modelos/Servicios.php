<?php 
//CONEXION CON BBDD
require "../config/Conexion.php";

class Servicios{

public function __construct(){}

//SELECT SERVICIOS
public function listar(){
	$sql="SELECT * FROM servicios";
	return ejecutarConsulta($sql);
}

//SELECT SERVICIO
public function servicio($id){
	$sql="SELECT * FROM servicios WHERE id_servicio LIKE $id";
	return ejecutarConsulta($sql);
}

//INSERT SERVICIO
public function nuevo($servicio,$descripcion,$imagen,$mostrar){
	echo $sql="INSERT INTO `servicios`(`servicio`, `descripcion`, `imagen`, `mostrar_web`) 
	VALUES ('$servicio','$descripcion','$imagen','$mostrar')";
	return ejecutarConsulta($sql);
}

//UPDATE SERVICIO
public function editar($id,$servicio,$descripcion,$imagen="",$mostrar){
	if($imagen==""){
		echo $sql="UPDATE `servicios` SET `servicio`='$servicio',`descripcion`='$descripcion',`mostrar_web`='$mostrar' 
		WHERE `id_servicio` LIKE $id ";
	}else{
		echo $sql="UPDATE `servicios` SET `servicio`='$servicio',`descripcion`='$descripcion',`imagen`='$imagen',`mostrar_web`='$mostrar'
		 WHERE `id_servicio` LIKE $id";
	}
	
	return ejecutarConsulta($sql);
}

//UPDATE DESACTIVAR
public function borrar($id){
	 $sql=" UPDATE `servicios` SET `servicio_activo`='0' WHERE `id_servicio` LIKE $id";
	return ejecutarConsulta($sql);
}

//UPDATE ACTIVAR
public function activar($id){
	$sql=" UPDATE `servicios` SET `servicio_activo`='1' WHERE `id_servicio` LIKE $id";
   return ejecutarConsulta($sql);
}

//SELECT SERVICIOS ACTIVOS
public function servicios(){
	$sql="SELECT id_servicio, servicio FROM servicios WHERE servicio_activo='1'";
	return ejecutarConsulta($sql);
}

//SELECT EMPLEADOS DE UN SERVICIO
public function empleadosServicio($id){
	$sql="SELECT * FROM `empleados` WHERE id_empleado NOT IN(SELECT id_empleado FROM servicios_empleados WHERE id_servicio LIKE $id) AND  estado_laboral=1";
	return ejecutarConsulta($sql);
}

//INSERT SERVICIO A EMPLEADO
public function addSerEmp($ser,$emp){
	$sql="INSERT INTO `servicios_empleados`(`id_empleado`, `id_servicio`) VALUES ('$emp','$ser')";
	return ejecutarConsulta($sql);
}







}



 ?>

