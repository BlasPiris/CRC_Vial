<?php 
//RECOGEMOS SESION
session_start();

//SOLICITAMOS MODELO
require_once "../modelos/Fichaje.php";
$fichaje=new Fichaje();

//FUNCION QUE REALIZA UN FICHAJE DE ENTRADA
if(isset($_GET['inicio'])){
	echo $rspta=$fichaje->acceso($_POST['id']);
	session_destroy();
}

//FUNCION QUE REALIZA UN FICHAJE DE SALIDA
if(isset($_GET['fin'])){
	$rspta=$fichaje->cierre($_POST['id']);
	session_destroy();
}
?>