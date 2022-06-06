var tabla;

//FUNCION INCIAL
function init(){
   listar();
   $.post("../ajax/servicios.php?servicios=yes", function(r){
	$("#ser").html(r);

});

setTimeout(function(){
	mostrarEmpleadosServicio($("#ser").val())
	}, 70);
}

//FUNCION LISTAR SERVICIOS
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
			url:'../ajax/servicios.php?listar=yes',
			type: "post",
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

//FUNCION INSERTAR SERVICIOS
function insertarServicio(){
	let web
	let nombre=$("#nombre")[0].value;
	let descripcion=$("#descripcion").val();
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
	 if(nombre=="" || descripcion=="" || imagen==""){
		alert("Rellene todos los campos")
	 }else{
		$.ajax({
			url: '../ajax/servicios.php?img=yes',
			type: 'post',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response != 0) {
					$.ajax({
						type: "POST",
						url: "../ajax/servicios.php?new=yes",
						data: {nombre: nombre,web: web, descripcion: descripcion,img:response},
					  });
					  window.location="servicio_list.php";
				} else {
					alert('Formato de imagen incorrecto.');
				}
			}
		}); 
	 }
}

//FUNCION EDITAR SERVICIO
function editarServicio(id){
	let web
	let imagen
	let nombre=$("#nombre")[0].value;
	let descripcion=$("#descripcion").val();
	if($("#web").prop('checked')){ web=1;}else{web=0;}
	console.log(web)
		let formData = new FormData();

		if($('#imagen')[0].files[0]!=undefined){
         imagen = $('#imagen')[0].files[0];
        formData.append('file',imagen);
		}else{
			imagen="";
		}
	 if(nombre=="" || descripcion==""){
		alert("Rellene todos los campos")
	 }else{

		if(imagen!=""){
			$.ajax({
				url: '../ajax/servicios.php?img=yes',
				type: 'post',
				data: formData,
				contentType: false,
				processData: false,
				success: function(response) {
					if (response != 0) {
						$.ajax({
							type: "POST",
							url: "../ajax/servicios.php?edit=yes",
							data: {id:id,nombre: nombre,web: web, descripcion: descripcion,img:response},
						  });
						  window.location="servicio_list.php";
					} else {
						alert('Formato de imagen incorrecto.');
					}
				}
			});
		}else{
			$.ajax({
				type: "POST",
				url: "../ajax/servicios.php?edit=yes",
				data: {id:id,nombre: nombre,web: web, descripcion: descripcion},
				});
			window.location="servicio_list.php";
		}
		 
	 }
}

//FUNCION DATOS SERVICIO EDITAR SERVICIOS
function formularioEditar(id){
	$.ajax({
		type: "POST",
		url: "../ajax/servicios.php?buscar=yes",
		data: {"id": id},
		success:function(data){
			let datosJson=JSON.parse(data)
			setTimeout(function(){
			$("#nombre").val(datosJson.aaData[0][1])
			$("#descripcion").val(datosJson.aaData[0][2])
			console.log(datosJson.aaData[0][4])
			if(datosJson.aaData[0][4]==1){
				$("#web").prop('checked',true)
			}
			}, 5);
		},
	  });
}

//FUNCION DESACTIVAR SERVICIO
function borrarServicio(id){
	$.ajax({
		url: '../ajax/servicios.php?borrar='+id,
		success: function(respuesta) {
			alert("Servicio desactivado correctamente");
			location.reload();
		},
		error: function() {
			console.log("No se ha podido obtener la información");
		}
	});
}

//FUNCION ACTIVAR SERVICIO
function activarServicio(id){
	$.ajax({
		url: '../ajax/servicios.php?activar='+id,
		success: function(respuesta) {
			alert("Servicio activado correctamente");
			location.reload();
		},
		error: function() {
			console.log("No se ha podido obtener la información");
		}
	});
}

//FUNCION LISTAR SERVICIOS DE EMPLEADO
function mostrarEmpleadosServicio(option){
	$.get("../ajax/servicios.php?empleados=yes&id="+option, function(r){
		$("#emp_ser").html(r);
	});
}

//FUNCION AÑADIR SERVICIOS A EMPLEADO
function añadirServicioEmpleado(){
	let ser=$("#ser").val()
	let emp=$("#emp_ser").val()
	$.get("../ajax/servicios.php?addSerEmp=yes&ser="+ser+"&emp="+emp, function(r){
		alert("Servicio Añadido correctamente");
			location.reload();
});
}

//FUNCION VALIDAR FORMULARIO
function validarFormularios(){
	setTimeout(function(){
		valid=true;
		if ($("#nombre").val()=="") {
			$("#nombre").css("border","1px solid red")
			valid=false;
		}else{
			$("#nombre").css("border","1px solid #ced4da")
		}

		var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
	
		if ($('#imagen')[0].files[0]==undefined || !allowedExtensions.exec($('#imagen').val())){
			document.querySelector("#imagen").nextSibling.style.border="1px solid red";
			valid=false;
		}else{
			document.querySelector("#imagen").nextSibling.style.border="1px solid #ced4da"
		}
	
		if ($("#descripcion").val()!="") {
			$("#descripcion").css("border","1px solid #ced4da")

		}else{
			$("#descripcion").css("border","1px solid red")
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
			if ($("#nombre").val()=="") {
				$("#nombre").css("border","1px solid red")
				valid=false;
			}else{
				$("#nombre").css("border","1px solid #ced4da")
			}
	
		
		
			if ($("#descripcion").val()!="") {
				$("#descripcion").css("border","1px solid #ced4da")
	
			}else{
				$("#descripcion").css("border","1px solid red")
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