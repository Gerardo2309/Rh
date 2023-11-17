var formSolicitud = document.querySelector('#formSolicitud');
	formSolicitud.onsubmit = function(e){
		e.preventDefault();
		var strRFC = document.querySelector('#txtRfc').value;
		var strNombre = document.querySelector('#txtNombre').value;
		var strApellidoP = document.querySelector('#txtApellidoP').value;
		var strApellidoM = document.querySelector('#txtApellidoM').value;
		var strPuesto = document.querySelector('#txtPuesto').value;
		var strDireccion = document.querySelector('#txtDireccion').value;
		var intMob = document.querySelector('#intmob').value;
		var strEmail = document.querySelector('#txtEmail').value;
		var strFile = document.querySelector('#txtFile').files[0];
		if (strRFC == '' || strNombre == '' || strApellidoP == ''
			|| strApellidoM == ''|| strPuesto == ''|| intMob == ''|| strEmail == ''|| strFile == '' || strDireccion == ''){
			swal("Atencion", "Todos los campos son obligatorios", "error");
			return false;
		} 
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var ajaxUrl = 'http://localhost/rh/Fsolicitud/setFsolicitudes';
		var formData = new FormData(formSolicitud);
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