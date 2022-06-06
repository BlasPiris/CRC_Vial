var tabla;

//FUNCION INICIAL
function init(){
   listar();
   listar_hoy();
   listar_previas();

   $.get("../ajax/citas.php?clientes=yes", function(r){
	$("#cli").html(r);
	});

	$.get("../ajax/citas.php?servicios=yes", function(r){
		$("#ser").html(r);
	});

	$.get("../ajax/citas.php?empleados=yes", function(r){
		$("#emp").html(r);
	});

	setTimeout(function(){
	    console.log($("#ser").val())
		mostrarEmpleadosServicio($("#ser").val())
		}, 200);

	validarFormularios();
}

//FUNCION LISTAR CITAS PREVIAS
function listar_previas(){
	tabla=$('#tbllistado_citasprev').dataTable({
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
			url:'../ajax/citas.php?listar_prev=yes',
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

//FUNCION LISTAR CITAS
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
			url:'../ajax/citas.php?listar=yes',
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

//FUNCION LISTAR CITAS POR FECHA
function listarFechas(){
	fec_ini=$('#fec_ini')[0].value
	fec_fin=$('#fec_fin')[0].value
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
			url:'../ajax/citas.php?listar_fec=yes&ini='+fec_ini+'&fin='+fec_fin,
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

//FUNCION LISTAR CITAS DE HOY
function listar_hoy(){
	tabla=$('#tbllistado_today').dataTable({
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
			url:'../ajax/citas.php?listar_hoy=yes',
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

//FUNCION LISTAR CITAS DE CLIENTE
function citaCliente(){
	fec_ini=$('#fec_ini')[0].value
	fec_fin=$('#fec_fin')[0].value
	cli=$('#cli')[0].value
	tabla=$('#tbllistado_cliente').dataTable({
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
			url:'../ajax/citas.php?citaCliente=yes&ini='+fec_ini+'&fin='+fec_fin+"&id="+cli,
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

//FUNCION LISTAR CITAS DE SERVICIO
function citaServicio(){
	fec_ini=$('#fec_ini')[0].value
	fec_fin=$('#fec_fin')[0].value
	ser=$('#ser')[0].value
	tabla=$('#tbllistado_cliente').dataTable({
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
			url:'../ajax/citas.php?citaServicio=yes&ini='+fec_ini+'&fin='+fec_fin+"&id="+ser,
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

//FUNCION LISTAR CITAS DE EMPLEADO
function citaEmpleado(id=0){
	fec_ini=$('#fec_ini')[0].value
	fec_fin=$('#fec_fin')[0].value
	if(id==0){
	emp=$('#emp')[0].value
	admin=1;
	}else{
		emp=id;
		admin=0;
	}
	tabla=$('#tbllistado_cliente').dataTable({
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
			url:'../ajax/citas.php?citaEmpleado=yes&ini='+fec_ini+'&fin='+fec_fin+"&id="+emp+"&admin="+admin,
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

//FUNCION VER EMPLEADOS DE UN SERVICIO
function mostrarEmpleadosServicio(option){

	$.get("../ajax/citas.php?empleados=yes&id="+option, function(r){
		$("#emp_ser").html(r);
	});
}

//FUNCION INSERTAR CITAS 
function insertarCita(){

	let cliente=$("#cli")[0].value;
	let servicio=$("#ser")[0].value;
	let empleado=$("#emp_ser")[0].value;
	let fecha=$("#fecha")[0].value;
	let hora=$("#hora")[0].value;
	if(cliente=="" || servicio=="" || empleado=="" || fecha=="" || hora==""){
		alert("Rellene todos los campos")
	}else{
		$.ajax({
			type: "POST",
			url: "../ajax/citas.php?new=yes",
			data: {cliente: cliente,servicio: servicio, empleado: empleado,fecha: fecha, hora: hora},
		  });
		  alert("Cita añadida correctamente")
		  location.replace("cita_list.php");
	}
}

//FUNCION EDITAR CITA
function editarCita(id){
	let cliente=$("#cli")[0].value;
	let servicio=$("#ser")[0].value;
	let empleado=$("#emp_ser")[0].value;
	let fecha=$("#fecha")[0].value;
	let hora=$("#hora")[0].value;

	if(cliente=="" || servicio=="" || empleado=="" || fecha=="" || hora==""){
		alert("Rellene todos los campos")
	}else{
		$.ajax({
			type: "POST",
			url: "../ajax/citas.php?edit=yes",
			data: {id:id,cliente: cliente,servicio: servicio, empleado: empleado,fecha: fecha, hora: hora},
		  });
		  alert("Cita editada correctamente")
		  window.location="cita_list.php";
	}
}


//FUNCION VER DATOS CITA MODIFICAR
function formularioEditar(id){
	$.ajax({
		type: "POST",
		url: "../ajax/citas.php?buscar=yes",
		data: {"id": id},
		success:function(data){
			let datosJson=JSON.parse(data)
			mostrarEmpleadosServicio(datosJson.aaData[0][1]);
			setTimeout(function(){
			$("#cli").val(datosJson.aaData[0][0])
			$("#ser").val(datosJson.aaData[0][1])
			//$("#emp_ser").val(datosJson.aaData[0][2])
			$("#fecha").val(datosJson.aaData[0][3])
			$("#hora").val(datosJson.aaData[0][4]) 
			}, 5);
		},
	  });
}


//FUNCION BORRAR CITA
function borrarCita(id){
	$.ajax({
		url: '../ajax/citas.php?borrar='+id,
		success: function(respuesta) {
			alert("Cita borrada correctamente");
			location.reload();
		},
		error: function() {
			
		}
	});
}

//FUNCION BORRAR CITA PREVIA
function borrarPrev(id){
	$.ajax({
		url: '../ajax/citas.php?borrarPrev='+id,
		success: function(respuesta) {
			alert("Solicitud borrada correctamente");
			location.reload();
		},
		error: function() {
			
		}
	});
}

//FUNCION VALIDAR FORMULARIO
function validarFormularios(){
setTimeout(function(){
	valid=true;
	if ($("#cli").val()==null) {
		$("#cli").css("border","1px solid red")
		valid=false;
	}else{
		$("#cli").css("border","1px solid #ced4da")
	}

	if ($("#ser").val()==null) {
		$("#ser").css("border","1px solid red")
		valid=false;
	}else{
		$("#ser").css("border","1px solid #ced4da")
	}

	if ($("#emp_ser").val()==null) {
		$("#emp_ser").css("border","1px solid red")
		valid=false;
	}else{
		$("#emp_ser").css("border","1px solid #ced4da")
	}

	if ($("#fecha").val()=="") {
		$("#fecha").css("border","1px solid red")
		valid=false;
	}else{
		$("#fecha").css("border","1px solid #ced4da")
	}

	if ($("#hora").val()=="") {
		$("#hora").css("border","1px solid red")
		valid=false;
	}else{
		$("#hora").css("border","1px solid #ced4da")
	}

	if(!valid){
		$("#guardar").prop( "disabled", true );
	}else{
		$("#guardar").prop( "disabled", false );
	}

	},300)
}


init();