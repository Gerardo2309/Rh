var tableNomina;

document.addEventListener('DOMContentLoaded', function(){
	tableNomina = $('#tableNomina').DataTable({
		"aProcessing":true,
		"aServerSide":true,
		"language": {
			"url":"//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
		},
		"ajax":{
			"url":"http://localhost/rh/nomina/getNomina",
			"dataSrc":""
		},
		"columns":[
			{"data":"id"},
			{"data":"nombres"},
			{"data":"apellidos" },
			{"data":"sfiscal"},
			{"data":"pefectivo"},
			{"data":"global"},
		],
		"resonsive":"true",
		"bDestroy":true,
		"iDisplayLength":10,
		"order":[[0,"desc"]]
	});
});






function openModalCxC(){
	document.querySelector('.modal-header').classList.replace("headerUpdate","headerRegister");
	document.querySelector('#btnActionForm').classList.replace("btn-primary","btn-info");
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('#titleModal').innerHTML = "Nuevo CxC";
	document.querySelector('#formCxC').reset();

	$('#modalformCxC').modal('show');
}



function bustran(){
	/*$('#bustrab').select2({dropdownParent: $('#modalformCxC'),
  ajax: {
    url: 'http://localhost/rh/nomina/getColaboradores',
    processResults: function (data) {
      // Transforms the top-level key of the response object from 'items' to 'results'
      return {
        results: data
      };
    }
  }
});*/

	$.ajax({
		type: "GET",
	    dataType: "json",
	    url:"http://localhost/rh/nomina/getColaboradores",
	    data: { get_param: 'value' },
	    success: function(data){
	        for (var i = 0; i < data.length; ++i) {
	        	$('#bustrab').append("<option value = '"+data[i].idtrabajador+"'>"+data[i].nombres+" "+data[i].apellidos+"</option>");
	        }
	        	$('#bustrab').select2({
	        		dropdownParent: $('#modalformCxC')
	        	});
	    }
	});
}


 var formCxC = document.querySelector('#formCxC');
	formCxC.onsubmit = function(e){
		e.preventDefault();
		var strRFC = document.querySelector('#bustrab').value;
		var intMonto = document.querySelector('#intMonto').value;
		var strPlazos = document.querySelector('#txtPlazos').value;
		var slTipo = document.querySelector('#sltipo').value;

		if (strRFC == '' || intMonto == '' || strPlazos == ''
			|| slTipo == ''){
			swal("Atencion", "Todos los campos son obligatorios", "error");
			return false;
		} 
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var ajaxUrl = 'http://localhost/rh/nomina/setCxC';
		var formData = new FormData(formCxC);
		request.open("POST",ajaxUrl,true);
		request.send(formData);
		request.onreadystatechange = function(){
			if (request.readyState == 4 && request.status == 200) {
				var objData = JSON.parse(request.responseText);
				if (objData.status) {
					swal("¡Correcto!", objData.msg ,"success");
				}else{
					swal("Error", objData.msg, "error");
				}
			}
		}
	}