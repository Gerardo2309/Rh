var tableSolicitudesE;

document.addEventListener('DOMContentLoaded', function(){
	tableSolicitudesE = $('#tableSolicitudesE').DataTable({
		"aProcessing":true,
		"aServerSide":true,
		"language": {
			"url":"//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax":{
			"url":"http://localhost/rh/SolicitudesE/getSolicitudesE",
			"dataSrc":""
		},
		"columns":[
			{"data":"idtrabajador"},
			{"data":"nombres"},
			{"data":"apellidos" },
			{"data":"puesto"},
			{"data":"telefono"},
			{"data":"correo"},
			{"data":"archivo"},
			{"data":"options"}
		],
		"resonsive":"true",
		"bDestroy":true,
		"iDisplayLength":10,
		"order":[[0,"desc"]]
	});
});
            

function aceptar(comp){
			var idtrabajador = comp.id;
			var request =(window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			var ajaxUrl ='http://localhost/rh/SolicitudesE/getActionSE/'+idtrabajador;
			request.open("GET",ajaxUrl,true);
			request.send();
			request.onreadystatechange = function(){
				if (request.readyState == 4 && request.status == 200) {
					var objData = JSON.parse(request.responseText); 
					if (objData.status) {
						swal("Solicitud Aceptada", objData.msg ,"success");
						$('#tableSolicitudesE').DataTable().ajax.reload();
					}else{
						swal("Error", objData.msg, "error");
					}
				}
			}
		}


/*function fntDropSe(){
	var btnEliminar = document.querySelectorAll(".btnEliminar");
	btnEliminar.forEach(function(btnEliminar){
		btnEliminar.addEventListener('click', function(){

			var idtrabajador = this.getAttribute("rl");
			var request =(window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			var ajaxUrl = base_url+'SolicitudesE/getDropSe/'+idtrabajador;
			request.open("GET",ajaxUrl,true);
			request.send();

			request.onreadystatechange = function(){
				if (request.readyState == 4 && request.status == 200) {
					var objData = JSON.parse(request.responseText); 
					if (objData.status) {
						swal("Solicitud Borrada", "Se Elimino correctamente" ,"success");
						tableSolicitudesE.api().ajax.reload(function(){
							fntAceptSe();
							fntDropSe();
						});
					}else{
						swal("Error", objData.msg, "error");
					}
				}
			}

		});
	});
}*/

