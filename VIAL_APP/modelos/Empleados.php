<?php 
//CONEXION CON BBDD
require "../config/Conexion.php";

class Empleados{

public function __construct(){
}

//SELECT DE EMPLEADOS
public function listar(){
	$sql="SELECT * FROM empleados e, roles_usuario r WHERE e.rol_usuario=r.id_rol ";
	return ejecutarConsulta($sql);
}

//SELECT DE SERVICIOS DE UN EMPLEADO
public function serviciosEmpleado($emp){
	$sql="SELECT s.servicio,e.nombre,e.apellidos,s.id_servicio,e.id_empleado FROM servicios s, empleados e, servicios_empleados r 
	WHERE r.id_empleado=e.id_empleado AND r.id_servicio=s.id_servicio AND e.id_empleado=$emp";
	return ejecutarConsulta($sql);
}

//SELECT DE EMPLADOS DE UN SERVICIO
public function empleadosServicio($ser){
	$sql="SELECT s.servicio,e.nombre,e.apellidos,s.id_servicio,e.id_empleado FROM servicios s, empleados e, servicios_empleados r 
	WHERE r.id_empleado=e.id_empleado AND r.id_servicio=s.id_servicio AND s.id_servicio=$ser";
	return ejecutarConsulta($sql);
}

//SELECT SERVICIOS
public function servicios(){
	$sql="SELECT id_servicio, servicio FROM servicios WHERE servicio_activo ='1'";
	return ejecutarConsulta($sql);
}

//SELECT EMPLEADOS
public function empleados(){
	$sql="SELECT id_empleado, nombre, apellidos FROM empleados WHERE estado_laboral=1 ";
	return ejecutarConsulta($sql);
}

//SELECT EMPLEADO
public function empleado($id){
	$sql="SELECT * FROM empleados WHERE id_empleado LIKE $id";
	return ejecutarConsulta($sql);
}

//SELECT ROLES
public function roles(){
	$sql="SELECT * FROM `roles_usuario`";
	return ejecutarConsulta($sql);
}

//UPDATE ACTIVAR
public function activar($id){
	$sql=" UPDATE `empleados` SET `estado_laboral`='1' WHERE `id_empleado` LIKE $id";
   return ejecutarConsulta($sql);
}

//UPDATE DESACTIVAR
public function desactivar($id){
	$sql=" UPDATE `empleados` SET `estado_laboral`='0' WHERE `id_empleado` LIKE $id";
   return ejecutarConsulta($sql);
}

//INSERT EMPLEADO
public function nuevo($nombre,$apellidos,$dni,$telefono,$email,$usuario,$contrasena,$img="",$rol,$web){
	$hoy=date("Y-m-d");
	$contrasena=hash("SHA256", $contrasena);
	$user_valid=$this->comprobarUsuario($usuario)["count(usuario)"];
	if($user_valid==0){
	$sql="INSERT INTO `empleados`(`nombre`, `apellidos`, `dni`, `usuario`, `contraseña`, `email`, `telefono`, `fecha_registro`, `estado_laboral`, `imagen`, `rol_usuario`, `visualizar_web`) 
	VALUES ('$nombre','$apellidos','$dni','$usuario','$contrasena','$email','$telefono','$hoy','1','$img','$rol','$web')";
	ejecutarConsulta($sql);
	$resultado=1;
	}else{
	$resultado="El usuario ya existe";
	}

	return $resultado;
}

//UPDATE EMPLEADO
public function editar($id,$nombre,$apellidos,$dni,$telefono,$email,$usuario,$contrasena="",$img="",$rol,$web){
	$hoy=date("Y-m-d");
	if($contrasena!=""){
		$contrasena=hash("SHA256", $contrasena);
		$contrasena=",`contraseña`='$contrasena'";
	}

	if($img!=""){
		$img=",`imagen`='$img'";
	}

	$user_valid=$this->comprobarUsuario($usuario,$id)["count(usuario)"];
	if($user_valid==0){

	$sql="UPDATE `empleados` SET `nombre`='$nombre',`apellidos`='$apellidos',`dni`='$dni',`usuario`='$usuario' $contrasena,`email`='$email',
	`telefono`='$telefono' $img, `rol_usuario`='$rol',`visualizar_web`='$web' WHERE id_empleado=$id";

	ejecutarConsulta($sql);
	$resultado=1;
	}else{
	$resultado="El usuario ya existe";
	}

	return $resultado;
}


//SELECT USER EMPLEADO
public function comprobarUsuario($usuario,$id=""){
	if($id!=""){
		$id="AND id_empleado!=$id";
	}
	$sql="SELECT count(usuario) FROM empleados WHERE usuario='$usuario' $id ";
	return ejecutarConsultaSimpleFila($sql);
}

//DELETE EMPLEADO
public function borrarServicioEmpleado($ser,$emp){
	$sql=" DELETE FROM `servicios_empleados` WHERE `id_empleado`= $emp AND `id_servicio`= $ser";
	return ejecutarConsulta($sql);
}








}



 ?>

