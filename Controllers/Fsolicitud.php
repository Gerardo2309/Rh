<?php 

	class Fsolicitud extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function Fsolicitud(){
			$data['page_id']= 4;
			$data['page_tag']= "Solicitud ";
			$data['page_title']= "Registro";
			$data['page_name']= "solicitud";
			$this->views->getView($this,"fsolicitud",$data);

		}

		public function setFsolicitudes(){
			$strRFC = strClean($_POST['txtRfc']);
			$strNombre = strClean($_POST['txtNombre']);
			$strApellidoP = strClean($_POST['txtApellidoP']);
			$strApellidoM = strClean($_POST['txtApellidoM']);
			$strPuesto = strClean($_POST['txtPuesto']);
			$intMob = intval(strClean($_POST['intmob']));
			$strEmail = strClean($_POST['txtEmail']);
			$strDireccion = strClean($_POST['txtDireccion']);
			$strFile = $_FILES['txtFile']['name'];
			$intstatus = 0;
			if ($strFile != '') {
				$nombre_base = basename($strFile);
				$nombre_final = $strRFC."-".$nombre_base;
				$ruta = ruta()."/archivos/".$nombre_final;
				$subirarchivo = move_uploaded_file($_FILES['txtFile']['tmp_name'],$_SERVER["DOCUMENT_ROOT"].$ruta);
			
				if ($subirarchivo) {
					$request_Fsolicitudes = $this->model->insertFsolicitud($strRFC, $strNombre, $strApellidoP, $strApellidoM, $strPuesto, $intMob, $strEmail, $strDireccion, $nombre_final, $intstatus);
					if ($request_Fsolicitudes > 0) {
						$arrResponse = array('status' => true, 'msg' => 'Datos Guardados Correctamente.');
					}else if($request_Fsolicitudes == 'exist'){
						$arrResponse = array('status' => false, 'msg' => '¡Atencion! El Usuario ya exste.');
					}else{
						$arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
					}
					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
					die();
				}
			}
		}

	}

?>