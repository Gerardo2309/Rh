var tableSolicitudesA;

document.addEventListener('DOMContentLoaded', function(){
	tableSolicitudesA = $('#tableSolicitudesA').DataTable({
		"aProcessing":true,
		"aServerSide":true,
		"language": {
			"url":"//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax":{
			"url":"http://localhost/rh/SolicitudesA/getSolicitudesA",
			"dataSrc":""
		},
		"columns":[
			{"data":"idtrabajador"},
			{"data":"nombres"},
			{"data":"apellidos" },
			{"data":"puesto"},
			{"data":"telefono"},
			{"data":"correo"},
			{"data":"options"}
		],
		"resonsive":"true",
		"bDestroy":true,
		"iDisplayLength":10,
		"order":[[0,"desc"]]
	});
});
            
var formSubirsa = document.querySelector('#formSubirsa');
	formSubirsa.onsubmit = function(e){
		e.preventDefault();
		var strRFC = document.querySelector('#idtrabajador').value;
		var strSuc = document.querySelector('#txtSucursal').value;
		var strFile1 = document.querySelector('#txtContrato').files[0];
		var strFile2 = document.querySelector('#txtActNa').files[0];
		var strFile3 = document.querySelector('#txtCurp').files[0];
		var strFile4 = document.querySelector('#txtRFC').files[0];
		var strFile5 = document.querySelector('#txtFoto').files[0];
		if (strRFC == null || strSuc == '' || strFile1 == null || strFile2 == null || strFile3 == null || strFile4 == null || strFile5 == null){
			swal("Atencion", "Todos los campos son obligatorios", "error");
			return false;
		} 
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var ajaxUrl = 'SolicitudesA/setSolicitudesA/'+idtrabajador;
		var formData = new FormData(formSubirsa);
		request.open("POST",ajaxUrl,true);
		request.send(formData);
		request.onreadystatechange = function(){
			if (request.readyState == 4 && request.status == 200) {
				var objData = JSON.parse(request.responseText);
				if (objData.status) {	
					$('#modalSolicitudesa').modal('hide');
					swal("¡Correcto!", objData.msg ,"success");
					formSubirsa.reset();
					$('#tableSolicitudesA').DataTable().ajax.reload();
				}else{
					swal("Error", objData.msg, "error");
				}
			}
		}
	}



function openModalSolicitudesa(comp){
	var idtrabajador = comp.id;
	document.querySelector('#idtrabajador').value = idtrabajador ;
	document.querySelector('.modal-header').classList.replace("headerUpdate","headerRegister");
	document.querySelector('#btnActionForm').classList.replace("btn-primary","btn-info");
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Subir documentos del colaborador "+idtrabajador;
	document.querySelector('#formSubirsa').reset();

	$('#modalSolicitudesa').modal('show');
}

