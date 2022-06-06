
var tabla;

//FUNCION INICIAL
function init(){
   listar_hoy();
	$.get("../ajax/asistencias.php?empleados=yes", function(r){
		$("#emp").html(r);
	});
}

//FUNCION LISTAR ASISTENCIAS
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
			url:'../ajax/asistencias.php?listar=yes',
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

//FUNCION LISTAR ASISTENCIAS HOY
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
			url:'../ajax/asistencias.php?listar_hoy=yes',
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

//FUNCION BUSCAR ASISTENCIAS EMPLEADO
function asistenciasEmpleado(id=0){
	fec_ini=$('#fec_ini')[0].value
	fec_fin=$('#fec_fin')[0].value
	if(id==0){
		emp=$('#emp')[0].value
		admin=1;
		}else{
			emp=id;
			admin=0;
		}
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
			url:'../ajax/asistencias.php?asistenciaEmpleado=yes&ini='+fec_ini+'&fin='+fec_fin+"&id="+emp+"&admin="+admin,
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

init();