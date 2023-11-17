var tableColaboradores;

document.addEventListener('DOMContentLoaded', function(){
	tableColaboradores = $('#tableColaboradores').DataTable({
		"aProcessing":true,
		"aServerSide":true,
		"language": {
			"url":"//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax":{
			"url":"http://localhost/rh/Colaboradores/getColaboradores",
			"dataSrc":""
		},
		"columns":[
			{"data":"idtrabajador"},
			{"data":"nombres"},
			{"data":"apellidos" },
			{"data":"puesto"},
			{"data":"telefono"},
			{"data":"options"}
		],
		"resonsive":"true",
		"bDestroy":true,
		"iDisplayLength":10,
		"order":[[0,"desc"]]
	});
});



function perfiles(comp){
	var idtrabajador = comp.id;
	var request =(window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	var datos = new FormData();
	datos.append("id", idtrabajador);
	var ajaxUrl ='http://localhost/rh/perfiles/getperfil/';
	window.location.assign(ajaxUrl+idtrabajador);
	/*request.open("POST",ajaxUrl,true);
	request.send(datos);
	/*request.onreadystatechange = function(){
		if (request.readyState == 4 && request.status == 200) {
		 var w = window.open();
        $(w.document.body).html(request);
		}
	}*/

}