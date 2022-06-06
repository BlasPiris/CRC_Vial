var tabla;

//FUNCION INICIAL
function init(){
   listar();
   $.get("../ajax/citas.php?servicios=yes", function(r){
	$("#ser").html(r);
	});

	$.get("../ajax/citas.php?empleados=yes", function(r){
		$("#emp").html(r);
	});

	$.get("../ajax/empleados.php?roles=yes", function(r){
		$("#rol").html(r);
	});
}

//FUNCION LISTAR EMPLEADOS
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
			url:'../ajax/empleados.php?listar=yes',
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

//FUNCION LISTAR SERVICIOS EMPLEADO
function serviciosEmpleado(){
	emp=$('#emp')[0].value
	tabla=$('#tbllistado_ser_emp').dataTable({
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
			url:'../ajax/empleados.php?serviciosEmpleado=yes&id='+emp,
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

//FUNCION LISTAR EMPLEADOS SERVICIO
function empleadosServicio(){
	ser=$('#ser')[0].value
	tabla=$('#tbllistado_ser_emp').dataTable({
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
			url:'../ajax/empleados.php?empleadosServicio=yes&id='+ser,
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

//FUNCION INSERTAR EMPLEADO
function insertarEmpleado(){
	let web
	let nombre=$("#nombre")[0].value;
	let apellidos=$("#apellidos")[0].value;
	let dni=$("#dni")[0].value;
	let telefono=$("#telefono")[0].value;
	let email=$("#email")[0].value;
	let usuario=$("#usuario")[0].value;
	let contrasena=$("#contrasena")[0].value;
	let imagen;
	let rol=$("#rol")[0].value;

	if($("#web").prop('checked')){ web=1;}else{web=0;}
		let formData = new FormData();

		if($('#imagen')[0].files[0]!=undefined){
         imagen = $('#imagen')[0].files[0];
        formData.append('file',imagen);
		console.log(imagen)
		}else{
			imagen="";
		}
	 if(nombre=="" || apellidos=="" || dni=="" || telefono=="" || email=="" || usuario=="" || contrasena==""){
		alert("Rellene todos los campos")
	 }else{
		$.ajax({
			url: '../ajax/empleados.php?img=yes',
			type: 'post',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response != 0) {
					if(response==1){
						response=""
					}
					$.ajax({
						type: "POST",
						url: "../ajax/empleados.php?new=yes",
						data: {nombre: nombre,apellidos:apellidos,dni:dni,telefono:telefono,email:email,usuario:usuario,contrasena:contrasena,rol:rol,web: web,img:response},
						success: function(response) {
							if(response==1){
								alert("Empleado insertado correctamente")
								window.location="empleado_list.php";
							}else{
								alert(response)
							}
						}
					  });
					  
				} else {
					alert('Formato de imagen incorrecto.');
				}
			}
		}); 
	 }
}

//FUNCION EDITAR EMPLEADO
function editarEmpleado(id){
	let web
	let nombre=$("#nombre")[0].value;
	let apellidos=$("#apellidos")[0].value;
	let dni=$("#dni")[0].value;
	let telefono=$("#telefono")[0].value;
	let email=$("#email")[0].value;
	let usuario=$("#usuario")[0].value;
	let contrasena=$("#contrasena")[0].value;
	let imagen;
	let rol=$("#rol")[0].value;

	if($("#web").prop('checked')){ web=1;}else{web=0;}
		let formData = new FormData();

		if($('#imagen')[0].files[0]!=undefined){
         imagen = $('#imagen')[0].files[0];
        formData.append('file',imagen);
		console.log(imagen)
		}else{
			imagen="";
		}
	 if(nombre=="" || apellidos=="" || dni=="" || telefono=="" || email=="" || usuario=="" ){
		alert("Rellene todos los campos")
	 }else{
		$.ajax({
			url: '../ajax/empleados.php?img=yes',
			type: 'post',
			data: formData,
			contentType: false,
			processData: false,
			success: function(response) {
				if (response != 0) {
					if(response==1){
						response=""
					}
					$.ajax({
						type: "POST",
						url: "../ajax/empleados.php?edit=yes",
						data: {id:id,nombre: nombre,apellidos:apellidos,dni:dni,telefono:telefono,email:email,usuario:usuario,contrasena:contrasena,rol:rol,web: web,img:response},
						success: function(response) {
							if(response==1){
								alert("Empleado editado correctamente")
								window.location="empleado_list.php";
							}else{
								alert(response)
							}
						}
					  });
					  
				} else {
					alert('Formato de imagen incorrecto.');
				}
			}
		}); 
	 }
}

//FUNCION EDITAR EMPLEADO
function formularioEditar(id){
	$.ajax({
		type: "POST",
		url: "../ajax/empleados.php?buscar=yes",
		data: {"id": id},
		success:function(data){
			let datosJson=JSON.parse(data)
			setTimeout(function(){
			$("#nombre").val(datosJson.aaData[0][1])
			$("#apellidos").val(datosJson.aaData[0][2])
			$("#dni").val(datosJson.aaData[0][3])
			$("#telefono").val(datosJson.aaData[0][7])
			$("#email").val(datosJson.aaData[0][6])
			$("#usuario").val(datosJson.aaData[0][4])
			$("#rol").val(datosJson.aaData[0][9])
			if(datosJson.aaData[0][10]==1){
				$("#web").prop('checked',true)
			}
			}, 5);
		},
	  });
}

//FUNCION ACTIVAR EMPLEADO
function activarEmpleado(id){
	$.ajax({
		url: '../ajax/empleados.php?activar='+id,
		success: function(respuesta) {
			alert("Empleado activado correctamente");
			location.reload();
		},
		error: function() {
			console.log("No se ha podido obtener la información");
		}
	});
}

//FUNCION DESACTIVAR EMPLEADO
function desactivarEmpleado(id){
	$.ajax({
		url: '../ajax/empleados.php?desactivar='+id,
		success: function(respuesta) {
			alert("Empleado dado de baja correctamente");
			location.reload();
		},
		error: function() {
			console.log("No se ha podido obtener la información");
		}
	});
}

//FUNCION BORRAR SERVICIO A EMPLEADO
function borrarServicioEmpleado(emp,ser){
	console.log("HOLA")
	$.ajax({
		url: '../ajax/empleados.php?delseremp=yes&ser='+ser+"&emp="+emp,
		success: function(respuesta) {
			alert("Se ha eliminado el servicio al empleado");
			location.reload();
		},
		error: function() {
			console.log("No se ha podido obtener la información");
		}
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
	
		if ($("#apellidos").val()=="") {
			$("#apellidos").css("border","1px solid red")
			valid=false;
		}else{
			$("#apellidos").css("border","1px solid #ced4da")
		}
	
		if ($("#dni").val().match(/^\d{8}[a-zA-Z]{1}$/)) {
			$("#dni").css("border","1px solid #ced4da")

		}else{
			$("#dni").css("border","1px solid red")
			valid=false;
		}
	
		if ($("#fec_nac").val()=="") {
			$("#fec_nac").css("border","1px solid red")
			valid=false;
		}else{
			$("#fec_nac").css("border","1px solid #ced4da")
		}
	
		if ($("#telefono").val().match(/^\d{9}$/)) {
			$("#telefono").css("border","1px solid #ced4da")
		}else{
			$("#telefono").css("border","1px solid red")
			valid=false;
		}

		if ($("#email").val().match(/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/)) {
			$("#email").css("border","1px solid #ced4da")
		}else{
			$("#email").css("border","1px solid red")
			valid=false;	
		}

		if ($("#usuario").val()=="") {
			$("#usuario").css("border","1px solid red")
			valid=false;
		}else{
			$("#usuario").css("border","1px solid #ced4da")
		}

		if ($("#contrasena").val()=="") {
			$("#contrasena").css("border","1px solid red")
			valid=false;
		}else{
			$("#contrasena").css("border","1px solid #ced4da")
		}
	
		if(!valid){
			$("#guardar").prop( "disabled", true );
		}else{
			$("#guardar").prop( "disabled", false );
		}
	
		},300)
	}

//FUNCION VALIDAR FORMULARIO EDITAR EMPLEADO
	function validarFormularioEdit(){
		setTimeout(function(){
			valid=true;
			if ($("#nombre").val()=="") {
				$("#nombre").css("border","1px solid red")
				valid=false;
			}else{
				$("#nombre").css("border","1px solid #ced4da")
			}
		
			if ($("#apellidos").val()=="") {
				$("#apellidos").css("border","1px solid red")
				valid=false;
			}else{
				$("#apellidos").css("border","1px solid #ced4da")
			}
		
			if ($("#dni").val().match(/^\d{8}[a-zA-Z]{1}$/)) {
				$("#dni").css("border","1px solid #ced4da")
	
			}else{
				$("#dni").css("border","1px solid red")
				valid=false;
			}
		
			if ($("#fec_nac").val()=="") {
				$("#fec_nac").css("border","1px solid red")
				valid=false;
			}else{
				$("#fec_nac").css("border","1px solid #ced4da")
			}
		
			if ($("#telefono").val().match(/^\d{9}$/)) {
				$("#telefono").css("border","1px solid #ced4da")
			}else{
				$("#telefono").css("border","1px solid red")
				valid=false;
			}
	
			if ($("#email").val().match(/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/)) {
				$("#email").css("border","1px solid #ced4da")
			}else{
				$("#email").css("border","1px solid red")
				valid=false;	
			}
	
			if ($("#usuario").val()=="") {
				$("#usuario").css("border","1px solid red")
				valid=false;
			}else{
				$("#usuario").css("border","1px solid #ced4da")
			}
	
		
		
			if(!valid){
				$("#guardar").prop( "disabled", true );
			}else{
				$("#guardar").prop( "disabled", false );
			}
		
			},300)
		}


init();