<?php 
//CONEXION CON BBDD
require "../config/Conexion.php";

class Login{

	public function __construct(){}


	//SELECT DE USUARIO PARA ACCESO
	public function verificar($user,$clave){
    	$sql="SELECT * FROM empleados WHERE usuario='$user' AND contraseña='$clave' AND estado_laboral='1'"; 
    	 return ejecutarConsultaSimpleFila($sql);  
    }

	//SELECT ULTIMO FICHAJE
	public function ultimoRegistro($id){
		$sql="SELECT * FROM fichaje WHERE id_empleado LIKE $id ORDER BY fecha_hora DESC LIMIT 1";
		return ejecutarConsultaSimpleFila($sql);   
	}
}




 ?>
