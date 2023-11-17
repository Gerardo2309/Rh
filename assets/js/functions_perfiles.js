document.getElementById('txtFotop').onchange = function () {
upload_foto();
};


function upload_foto() {
	 var formFotoperfil = document.querySelector('#formFotoperfil');
	formFotoperfil.onsubmit = function(e){
		e.preventDefault();
		var strRFC = document.querySelector('#txtRfc').value;
		var strFile = document.querySelector('#txtFotop').files[0];
	}
		var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
		var ajaxUrl = 'http://localhost/rh/Perfiles/setFotoP';
		var formData = new FormData(formFotoperfil);
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