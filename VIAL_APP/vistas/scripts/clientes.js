var tabla;

//FUNCION INICIAL

function init(){
   listar();

   validarFormularios();
}

//FUNCION LISTAR CLIENTES
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
			url:'../ajax/clientes.php?listar=yes',
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

//FUNCION INSERTAR CLIENTE
function insertarCliente(){
	let nombre=$("#nombre")[0].value;
	let apellidos=$("#apellidos")[0].value;
	let fec_nac=$("#fec_nac")[0].value;
	let dni=$("#dni")[0].value;
	let telefono=$("#telefono")[0].value;
	let email=$("#email")[0].value;

	if(nombre=="" || apellidos=="" || fec_nac=="" || dni=="" || telefono==""){
		alert("Rellene todos los campos")
	}else{
		$.ajax({
			type: "POST",
			url: "../ajax/clientes.php?new=yes",
			data: {nombre: nombre,apellidos: apellidos, fec_nac: fec_nac,dni: dni, telefono: telefono,email: email},
		  });
		  alert("Cliente insertado correctamente")
		  window.location="cliente_list.php";
	}
} 

//FUNCION EDITAR CLIENTE
function editarCliente(id){
	let nombre=$("#nombre")[0].value;
	let apellidos=$("#apellidos")[0].value;
	let fec_nac=$("#fec_nac")[0].value;
	let dni=$("#dni")[0].value;
	let telefono=$("#telefono")[0].value;
	let email=$("#email")[0].value;

	if(nombre=="" || apellidos=="" || fec_nac=="" || dni=="" || telefono==""){
		alert("Rellene todos los campos")
	}else{
		$.ajax({
			type: "POST",
			url: "../ajax/clientes.php?edit=yes",
			data: {id:id,nombre: nombre,apellidos: apellidos, fec_nac: fec_nac,dni: dni, telefono: telefono,email: email},
			success:function(data){
				console.log(data)
			}
		  });
		  alert("Cliente editado correctamente")
		  window.location="cliente_list.php";
	}
}

//FUNCION  DATOS CLIENTE EDITAR
function formularioEditar(id){
	$.ajax({
		type: "POST",
		url: "../ajax/clientes.php?buscar=yes",
		data: {"id": id},
		success:function(data){
			let datosJson=JSON.parse(data)
			setTimeout(function(){
			$("#nombre").val(datosJson.aaData[0][0])
			$("#apellidos").val(datosJson.aaData[0][1])
			$("#dni").val(datosJson.aaData[0][2])
			$("#fec_nac").val(datosJson.aaData[0][3])
			$("#telefono").val(datosJson.aaData[0][4]) 
			$("#email").val(datosJson.aaData[0][5])
			}, 5);
		},
	  });
}

//FUNCION BORRAR CLIENTE
function borrarCliente(id){
	$.ajax({
		url: '../ajax/clientes.php?borrar='+id,
		success: function(respuesta) {
			alert("Cliente borrado correctamente");
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

		if ($("#email").val().match(/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/) || $("#email").val()=="") {
			$("#email").css("border","1px solid #ced4da")
		}else{
			$("#email").css("border","1px solid red")
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