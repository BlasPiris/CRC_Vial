<?php 
//RECOGEMOS SESION
session_start();

//SOLICITAMOS MODELO
require_once "../modelos/Clientes.php";
$clientes=new Clientes();

//FUNCION QUE LISTA TODOS LOS CLIENTES
if(isset($_GET["listar"])){
	$rspta=$clientes->listar();
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>'<a class="btn btn-warning btn-xs m-1" href="cliente_edit.php?id='.$reg->id_cliente.'"> ✎</a>
				<a class="btn btn-danger btn-xs m-1" onclick="borrarCliente('.$reg->id_cliente.')")> ✘</a>',
				"1"=>$reg->nombre." ".$reg->apellidos,
				"2"=>$reg->dni,
				"3"=>$reg->fecha_nac,
				"4"=>$reg->telefono,
				"5"=>$reg->email,
				"6"=>$reg->fecha_registro,
				);
		}
		$results=array(
             "sEcho"=>1,
             "iTotalRecords"=>count($data),
             "iTotalDisplayRecords"=>count($data),
             "aaData"=>$data); 
		echo json_encode($results);
}

//FUNCION QUE BUSCA LOS DATOS DE UN CLIENTE
if(isset($_GET["buscar"])){
	$rspta=$clientes->buscar($_POST["id"]);
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>$reg->nombre,
				"1"=>$reg->apellidos,
				"2"=>$reg->dni,
				"3"=>$reg->fecha_nac,
				"4"=>$reg->telefono,
				"5"=>$reg->email,
				"6"=>$reg->fecha_registro,
				);
		}
		$results=array(
             "sEcho"=>1,
             "iTotalRecords"=>count($data),
             "iTotalDisplayRecords"=>count($data),
             "aaData"=>$data); 
		echo json_encode($results);

}

//FUNCION QUE MANDA LOS DATOS DE NUEVO CLIENTE A LA BBDD
if(isset($_GET["new"])){
	$clientes->nuevo($_POST["nombre"],$_POST["apellidos"],$_POST["fec_nac"],$_POST["dni"],$_POST["telefono"],$_POST["email"]);
}

//FUNCION QUE MODIFICA UN CLIENTE EN LA BBDD
if(isset($_GET["edit"])){
	$clientes->editar($_POST["id"],$_POST["nombre"],$_POST["apellidos"],$_POST["fec_nac"],$_POST["dni"],$_POST["telefono"],$_POST["email"]);
}

//FUNCION QUE BORRA UN CLIENTE DE LA BBDD
if(isset($_GET["borrar"])){
	$clientes->borrar($_GET["borrar"]);
}



?>