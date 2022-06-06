<?php 
//SOLICITAMOS GLOBAL
require_once "global.php";

//SELECCIONAMOS ZONA HORARIA
date_default_timezone_set("Europe/Madrid");

//CREAMOS CONEXION
$conexion=new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

//CODIFICAMOS QUE LAS CONSULTAS ESTEN EN UTF-8
mysqli_query($conexion, 'SET NAMES "'.DB_ENCODE.'"');

//COMPROBAMOS QUE LA CONEXION A BBDD NO FALE
if (mysqli_connect_errno()) {
	echo("PARECE QUE HAY UN PROBLEMA PARA CONECTAR CON LA BBDD: ".mysqli_connect_error());
	exit();
}

//FUNCIONES AUTOMATIZADAS PARA TRABAJAR CON DATOS DE CONSULTA
if (!function_exists('ejecutarConsulta')) {

	//CONSULTA CON VARIOS REGISTROS
	function ejecutarConsulta($sql){ 
		global $conexion;
		$query=$conexion->query($sql);
		return $query;
	} 

	//CONSULTA DE UN SOLO REGISTRO
	function ejecutarConsultaSimpleFila($sql){
		global $conexion;
		$query=$conexion->query($sql);
		$row=$query->fetch_assoc();
		return $row;
	}

	//CONSULTA QUE DEVUELVE EL ULTIMO ID DE LA TABLA
	function ejecutarConsulta_retornarID($sql){
		global $conexion;
		$query=$conexion->query($sql);
		return $conexion->insert_id;
	}

}

 ?>