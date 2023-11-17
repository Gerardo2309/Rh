<?php 

class Perfiles extends Controllers{

	public function __construct(){
		parent::__construct();
	}

	public function Perfiles(){

		$data['page_id']= 7;

	}

	public function getperfil(string $idtrabajador){
		$stridtrabajador = strClean($idtrabajador);
			if ($stridtrabajador > 0) {
				$data = $this->model->selectPerfil($stridtrabajador);
				if (empty($data)) {
					$arrResponse = array('status' => false, 'msg' => 'Dato no encontrado.');
				}else{
				// echo json_encode($arrData,JSON_UNESCAPED_UNICODE);

					$this->views->getView($this,"perfiles",$data);
				}
			}
			die();
	}

	public function setFotoP(){
		$strRFC = strClean($_POST['txtRfc']);
		$strFile = $_FILES['txtFotop']['name'];

		if ($strFile != '') {
			$nombre_base = "fperfil";
			$nombre_final = $strRFC."-".$nombre_base;
			$ruta = "/rh/assets/images/profile/".$nombre_final;
			$subirarchivo = move_uploaded_file($_FILES['txtFotop']['tmp_name'],$_SERVER["DOCUMENT_ROOT"].$ruta);
			
			if ($subirarchivo) {
				$request_Foto = $this->model->insertfoto($strRFC, $ruta);

				if ($request_Foto > 0) {
					$arrResponse = array('status' => true, 'msg' => 'Datos Guardados Correctamente.');
				}else if($request_Foto == 'exist'){
					$arrResponse = array('status' => false, 'msg' => '¡Atencion! El Usuario ya exste.');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
				die();
			}
		}
	}


	/*public function setSolicitudesA(string $idtrabajador){
		$stridtrabajador = strClean($idtrabajador);
		if ($stridtrabajador != '') {
			$request_SA = $this->model->insertSolicitudesA($stridtrabajador);
			if ($request_SA  == 0) {
				$arrResponse = array('status' => true, 'msg' => 'Datos Guardados Correctamente.');
				$request_SEDEl = $this->model->DropSA($stridtrabajador);
			}else if($request_SA  == 'exist'){
				$arrResponse = array('status' => false, 'msg' => '¡Atencion! El Rol ya exste.');
			}else{
				$arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
			}
			//print_r($request_SA);
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function getDropSA(string $idtrabajador){
		$stridtrabajador = strClean($idtrabajador);
		if ($stridtrabajador  != '') {
			$arrData = $this->model->DropSA($stridtrabajador);
			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Dato no encontrado.');
			}else{
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}*/
}

?>