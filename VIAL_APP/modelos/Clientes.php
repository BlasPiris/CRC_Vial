<?php 
//CONEXION CON BBDD
require "../config/Conexion.php";

class Clientes{

public function __construct(){}

//SELECT DE CLIENTES
public function listar(){
	$sql="SELECT * FROM clientes";
	return ejecutarConsulta($sql);
}

//SELECT DE CLIENTE
public function buscar($id){
	$sql="SELECT * FROM clientes WHERE id_cliente LIKE $id";
	return ejecutarConsulta($sql);
}

//INSERT DE CLIENTE
public function nuevo($nombre,$apellidos,$fec_nac,$dni,$telefono,$email=""){
	$hoy=date("Y-m-d");
	$sql="INSERT INTO `clientes`( `nombre`, `apellidos`, `dni`, `fecha_nac`, `telefono`, `email`, `fecha_registro`) 
	VALUES ('$nombre','$apellidos','$dni','$fec_nac','$telefono','$email','$hoy')";
	return ejecutarConsulta($sql);
}

//UPDATE DE CLIENTE
public function editar($id,$nombre,$apellidos,$fec_nac,$dni,$telefono,$email=""){
	echo $sql="UPDATE `clientes` SET `nombre`='$nombre',`apellidos`='$apellidos',`dni`='$dni',
	`fecha_nac`='$fec_nac',`telefono`='$telefono',`email`='$email' WHERE `id_cliente`=$id";
	return ejecutarConsulta($sql);
}

//DELETE DE CLIENTE
public function borrar($id){
	echo $sql="DELETE  FROM clientes WHERE id_cliente LIKE $id";
	return ejecutarConsulta($sql);
}

}
 ?>

