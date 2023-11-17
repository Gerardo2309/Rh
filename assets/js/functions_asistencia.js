window.onload=function() {
Search_fecha();
}

document.getElementById('datfin').onchange = function () {
Search_fecha();
};


function Search_fecha() {
		var datfini = document.querySelector('#datini').value;
		var datffin  = document.querySelector('#datfin').value;
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var formData = new FormData(formSearchAsis);
		$('#tableAsistencia').dataTable({
			"aProcessing":true,
			"aServerSide":true,
			"language": {
				"url":"//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
			},
			"ajax":{
				"url":"http://localhost/rh/Asistencia/getasistencia/",
        		"method": 'POST', //usamos el metodo POST
        		"data":{datini:datfini, datfin:datffin}, 
        		"dataSrc":""
			},
			"columns":[
				{"data":"id"},
				{"data":"nombres"},
				{"data":"apellidos"},
				{"data":"puesto"},
				{"data":"fecha"},
				{"data":"entrada"},
				{"data":"salida"},
			],
			"resonsive":"true",
			"bDestroy":true,
			"iDisplayLength":10,
			"order":[[0,"desc"]]
		});	
			
}


function openModal(){
	document.querySelector('.modal-header').classList.replace("headerUpdate","headerRegister");
	document.querySelector('#btnActionForm').classList.replace("btn-primary","btn-info");
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Cargar Asistencia";
	document.querySelector('#formAsistencia').reset();

	$('#modalformAsistencia').modal('show');
}


 var formAsistencia = document.querySelector('#formAsistencia');
	formAsistencia.onsubmit = function(e){
		e.preventDefault();

		var strFile = document.querySelector('#txtExcel').files[0];

		if (strFile == null){
			swal("Atencion", "Todos los campos son obligatorios", "error");
			return false;
		} 
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var ajaxUrl = 'http://localhost/rh/Asistencia/setAsistencia';
		var formData = new FormData(formAsistencia);
		request.open("POST",ajaxUrl,true);
		request.send(formData);
		request.onreadystatechange = function(){
			if (request.readyState == 4 && request.status == 200) {
				var objData = JSON.parse(request.responseText);
				if (objData.status) {

					swal("¡Correcto!", objData.msg ,"success");
					$('#modalformAsistencia').modal("hide");
					formAsistencia.reset();
					$('#tableAsistencia').DataTable().ajax.reload();

				}else{
					swal("Error", objData.msg, "error");
				}
			}
		}
	}




