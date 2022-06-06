<?php 
//CONEXION CON BBDD
require "../config/Conexion.php";

class Noticias{

public function __construct(){}

//SELECT NOTICIAS
public function listar(){
	$sql="SELECT * FROM noticias";
	return ejecutarConsulta($sql);
}

//SELECT NOTICIA
public function noticia($id){
	$sql="SELECT * FROM noticias WHERE id_noticia LIKE $id";
	return ejecutarConsulta($sql);
}

//INSERT NOTICIA
public function nuevo($titulo,$contenido,$imagen,$mostrar){
	$sql="INSERT INTO `noticias`(`titulo`, `contenido`, `imagen`, `mostrar_web`) 
	VALUES ('$titulo','$contenido','$imagen','$mostrar')";
	 ejecutarConsulta($sql);
	return $sql;
}

//UPDATE NOTICIA
public function editar($id,$titulo,$contenido,$imagen="",$mostrar){
	if($imagen==""){
		echo $sql="UPDATE `noticias` SET `titulo`='$titulo',`contenido`='$contenido',`mostrar_web`='$mostrar' 
		WHERE `id_noticia` LIKE $id ";
	}else{
		echo $sql="UPDATE `noticias` SET `titulo`='$titulo',`contenido`='$contenido',`imagen`='$imagen',`mostrar_web`='$mostrar'
		 WHERE `id_noticia` LIKE $id";
	}
	
	return ejecutarConsulta($sql);
}

//DELETE NOTICIA
public function borrar($id){
	 $sql=" DELETE FROM `noticias` WHERE `id_noticia` LIKE $id";
	return ejecutarConsulta($sql);
}












}



 ?>

