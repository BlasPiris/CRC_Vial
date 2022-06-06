<?php 
//RECOGEMOS SESION
session_start();

//SOLICITAMOS MODELO
require_once "../modelos/Login.php";
$usuario=new Login();

//FUNCION QUE VERIFICA EL ACCESO A LA APLICACION Y GENERA LA SESION
if(isset($_GET["acceso"])){
		$rspta=$usuario->verificar($_POST['user'], hash("SHA256", $_POST['passwd']));
		if($rspta!=""){
			$_SESSION['id_empleado']=$rspta["id_empleado"];
			$_SESSION['nombre']=$rspta["nombre"];
			$_SESSION['apellidos']=$rspta["apellidos"];
			$_SESSION['usuario']=$rspta["usuario"];
			$_SESSION['rol_usuario']=$rspta["rol_usuario"];
			echo json_encode($rspta["id_empleado"]);
			$rspta=$usuario->ultimoRegistro($_SESSION['id_empleado']);
			if($rspta!=""){
				if($rspta["tipo_fichaje"]=="ENTRADA"){
					$_SESSION['estado']="ACTIVO";
				}else{
					$_SESSION['estado']="INACTIVO";
				}
				
				$_SESSION['fecha']=$rspta["fecha_hora"];
			}else{
				$_SESSION['estado']="INACTIVO";
				$_SESSION['fecha']="NO EXISTEN DATOS";
			}
		}
			
}

//FUNCION PARA SALIR DE LA APLICACION QUE CIERRA SESION
if(isset($_GET["salir"])){
	session_unset();
	session_destroy();
	header("Location: ../vistas/login.php");
}
?>