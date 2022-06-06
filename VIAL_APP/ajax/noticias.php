<?php 
//RECOGEMOS SESION
session_start();

//SOLICITAMOS MODELO
require_once "../modelos/Noticias.php";
$noticias=new Noticias();

//FUNCION QUE NOS MUESTRA TODAS LAS NOTICIAS
if(isset($_GET["listar"])){
	$rspta=$noticias->listar();
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			if($reg->mostrar_web==0){
				$reg->mostrar_web="NO";
			}else{
				$reg->mostrar_web="SI";
			}
			
				$botonActivo='<a class="btn btn-danger btn-xs m-1" onclick="borrarNoticia('.$reg->id_noticia.')")> ✘</a>';

			$data[]=array(
				"0"=>'<a class="btn btn-warning btn-xs  m-1" href="noticia_edit.php?id='.$reg->id_noticia.'"> ✎</a>'.$botonActivo,
				"1"=>$reg->titulo,
				"2"=>$reg->contenido,
				"3"=>'<img src="../img/'.$reg->imagen.'"  height="auto" width="200px">',
				"4"=>$reg->mostrar_web,
				
				
				);
		}
		$results=array(
             "sEcho"=>1,
             "iTotalRecords"=>count($data),
             "iTotalDisplayRecords"=>count($data),
             "aaData"=>$data); 
		echo json_encode($results);

}

//FUNCION QUE BUSCA LOS DATOS DE UNA NOTICIA
if(isset($_GET["buscar"])){
	$rspta=$noticias->noticia($_POST["id"]);
		$data=Array();
		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
				"0"=>$reg->id_noticia,
				"1"=>$reg->titulo,
				"2"=>$reg->contenido,
				"3"=>$reg->imagen,
				"4"=>$reg->mostrar_web,
				);
		}
		$results=array(
             "sEcho"=>1,
             "iTotalRecords"=>count($data),
             "iTotalDisplayRecords"=>count($data),
             "aaData"=>$data); 
		echo json_encode($results);

}


//FUNCION QUE BORRA UNA NOTICIA DE LA BBDD
if(isset($_GET["borrar"])){
	$noticias->borrar($_GET["borrar"]);
}

//FUNCION QUE MANDA UNA NUEVA NOTICIA A LA BBDD
if(isset($_GET["new"])){
	echo $noticias->nuevo($_POST["titulo"],$_POST["contenido"],$_POST["img"],$_POST["web"]);
}

//FUNCION QUE EDUTA UNA NOTICIA DE LA BBDD
if(isset($_GET["edit"])){
	$noticias->editar($_POST["id"],$_POST["titulo"],$_POST["contenido"],$_POST["img"],$_POST["web"]);
}

//FUNCION QUE SUBE LA FOTO DE LA NOTICIA
if(isset($_GET["img"])){
	if (($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/jpg")
    || ($_FILES["file"]["type"] == "image/png")
    || ($_FILES["file"]["type"] == "image/gif")) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "../img/".$_FILES['file']['name'])) {
        echo $_FILES['file']['name'];
    } else {
        echo 0;
    }
} else {
    echo 0;
}
}


?>