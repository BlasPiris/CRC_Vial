var tabla;

//FUNCION INICIAR TURNO
function init(){
   listar();
}

//FUNCION LISTAR NOTICIAS
function listar(){
	tabla=$('#tbllistado').dataTable({
		"aProcessing": true,
		"aServerSide": true,
		dom: 'Bfrtip',
		buttons: [
                  'copyHtml5',
                  'excelHtml5',
                  'csvHtml5',
                  'pdf'
		],
		"ajax":
		{
			url:'../ajax/noticias.php?listar=yes',
			type: "get",
			dataType : "json",
			error:function(e){
				console.log(e.responseText);
			},
		},
		"bDestroy":true,
		"iDisplayLength":10,
		"order":[[0,"desc"]]
	}).DataTable();
}

//FUNCION INSERTAR NOTICIAS
function insertarNoticia(){
	let web
	let titulo=$("#titulo")[0].value;
	let contenido=$("#contenido").val();
	let imagen;
	if($("#web").prop('checked')){ web=1;}else{web=0;}
		let formData = new FormData();

		if($('#imagen')[0].files[0]!=undefined){
         imagen = $('#imagen')[0].files[0];
        formData.append('file',imagen);
		console.log(imagen)
		}else{
			imagen="";
		}
		console.log(imagen)
	 if(titulo=="" || contenido=="" || imagen==""){
		alert("Rellene todos los campos")
	 }else{
		$.ajax({
			url: '../ajax/noticias.php?img=yes',
			type: 'post',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response != 0) {
					$.ajax({
						type: "POST",
						url: "../ajax/noticias.php?new=yes",
						data: {titulo: titulo,web: web, contenido: contenido,img:response},
						success: function(response) {
							console.log(response);
						}
					  });
					  window.location="noticia_list.php";
				} else {
					alert('Formato de imagen incorrecto.');
				}
			}
		}); 
	 }
}

//FUNCION EDITAR NOTICIA
function editarNoticia(id){
	let web
	let imagen
	let titulo=$("#titulo")[0].value;
	let contenido=$("#contenido").val();
	if($("#web").prop('checked')){ web=1;}else{web=0;}
	console.log(web)
		let formData = new FormData();

		if($('#imagen')[0].files[0]!=undefined){
         imagen = $('#imagen')[0].files[0];
        formData.append('file',imagen);
		}else{
			imagen="";
		}
	 if(titulo=="" || contenido==""){
		alert("Rellene todos los campos")
	 }else{

		if(imagen!=""){
			$.ajax({
				url: '../ajax/noticias.php?img=yes',
				type: 'post',
				data: formData,
				contentType: false,
				processData: false,
				success: function(response) {
					if (response != 0) {
						$.ajax({
							type: "POST",
							url: "../ajax/noticias.php?edit=yes",
							data: {id:id,titulo: titulo,web: web, contenido: contenido,img:response},
						  });
						  window.location="noticia_list.php";
					} else {
						alert('Formato de imagen incorrecto.');
					}
				}
			});
		}else{
			$.ajax({
				type: "POST",
				url: "../ajax/noticias.php?edit=yes",
				data: {id:id,titulo: titulo,web: web, contenido: contenido},
				});
			window.location="noticia_list.php";
		}
		 
	 }
}

//FUNCION VER DATOS NOTICIAS EDITAR
function formularioEditar(id){
	$.ajax({
		type: "POST",
		url: "../ajax/noticias.php?buscar=yes",
		data: {"id": id},
		success:function(data){
			let datosJson=JSON.parse(data)
			setTimeout(function(){
			$("#titulo").val(datosJson.aaData[0][1])
			$("#contenido").val(datosJson.aaData[0][2])
			console.log(datosJson.aaData[0][4])
			if(datosJson.aaData[0][4]==1){
				$("#web").prop('checked',true)
			}
			}, 5);
		},
	  });
}

//FUNCION BORRAR NOTICIAS
function borrarNoticia(id){
	$.ajax({
		url: '../ajax/noticias.php?borrar='+id,
		success: function(respuesta) {
			alert("Noticia borrada correctamente");
			location.reload();
		},
	});
}

//FUNCION VALIDAR FORMULARIOS
function validarFormularios(){
	setTimeout(function(){
		valid=true;
		if ($("#titulo").val()=="") {
			$("#titulo").css("border","1px solid red")
			valid=false;
		}else{
			$("#titulo").css("border","1px solid #ced4da")
		}

		var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
	
		if ($('#imagen')[0].files[0]==undefined || !allowedExtensions.exec($('#imagen').val())){
			document.querySelector("#imagen").nextSibling.style.border="1px solid red";
			valid=false;
		}else{
			document.querySelector("#imagen").nextSibling.style.border="1px solid #ced4da"
		}
	
		if ($("#contenido").val()!="") {
			$("#contenido").css("border","1px solid #ced4da")

		}else{
			$("#contenido").css("border","1px solid red")
			valid=false;
		}
	
		if(!valid){
			$("#guardar").prop( "disabled", true );
		}else{
			$("#guardar").prop( "disabled", false );
		}
	
		},300)
	}

//FUNCION VALIDAR FORMULARIO EDITAR
	function validarFormularioEdit(){
		setTimeout(function(){
			valid=true;
			if ($("#titulo").val()=="") {
				$("#titulo").css("border","1px solid red")
				valid=false;
			}else{
				$("#titulo").css("border","1px solid #ced4da")
			}
	
		
		
			if ($("#contenido").val()!="") {
				$("#contenido").css("border","1px solid #ced4da")
	
			}else{
				$("#contenido").css("border","1px solid red")
				valid=false;
			}
		
			if(!valid){
				$("#guardar").prop( "disabled", true );
			}else{
				$("#guardar").prop( "disabled", false );
			}
		
			},300)
		}




init();