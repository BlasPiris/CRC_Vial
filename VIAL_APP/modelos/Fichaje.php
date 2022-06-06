<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Fichaje{


	//implementamos nuestro constructor
public function __construct(){

}

public function ultimoRegistro($id){
	$sql="SELECT * FROM fichaje WHERE id_empleado LIKE $id ORDER BY fecha_hora DESC LIMIT 1";
	return ejecutarConsulta($sql);
}

	//metodo insertar regiustro
	public function acceso($id){
		date_default_timezone_set('Europe/Madrid');
		$fechacreado=date('Y-m-d H:i:s');
		$sql="INSERT INTO `fichaje`(`id_empleado`, `tipo_fichaje`, `fecha_hora`)
		VALUES ('$id','ENTRADA','$fechacreado')";
		 ejecutarConsulta($sql);
		return $sql;
	}

	public function cierre($id){
		date_default_timezone_set('Europe/Madrid');
		$fechacreado=date('Y-m-d H:i:s');
		$sql="INSERT INTO `fichaje`(`id_empleado`, `tipo_fichaje`, `fecha_hora`)
		VALUES ('$id','SALIDA','$fechacreado')";
		return ejecutarConsulta($sql);
	}
}

 ?>
