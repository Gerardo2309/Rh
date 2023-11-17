<?php 

class SolicitudesA extends Controllers{

	public function __construct(){
		parent::__construct();
	}

	public function SolicitudesA(){
		$data['page_id']= 6;
		$data['page_tag']= "Solicitudes Aceptadas";
		$data['page_title']= "Solicitudes Aceptadas";
		$data['page_name']= "Solicitudes Aceptadas";
		$this->views->getView($this,"solicitudesa",$data);

	}

		public function getSolicitudesA(){
			$arrData = $this->model->selectSolicitudesA();

			for ($i=0; $i <count($arrData); $i++) { 
				$arrData[$i]['options'] = '<div class="text-center"> 
					<button class="btn btn-primary btn-sm btnAceptarSA" onclick="openModalSolicitudesa(this)" id="'.$arrData[$i]['idtrabajador'].'"title="Aceptar">Terminar<i class="lni lni-checkmark"></i></button>
					<button class="main-btn danger-btn-outline rounded-md  btn-sm btn-hover btnEliminar" rl="'.$arrData[$i]['idtrabajador'].'"title="Rechazar"><i class="lni lni-close"></i></button>
				</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

	public function setSolicitudesA(string $idtrabajador){
		$strRFC = strClean($_POST['idtrabajador']);
		$strSucursal = strClean($_POST['txtSucursal']);
		$strFile1 = $_FILES['txtContrato'];
		$strFile2 = $_FILES['txtActNa'];
		$strFile3 = $_FILES['txtActNa'];
		$strFile4 = $_FILES['txtRFC'];
		$strFile5 = $_FILES['txtFoto'];
		$arrdoc = [];
		if ($strFile1 != '' && $strFile2 != '' && $strFile3 != '' && $strFile4 != '' && $strFile5 != '') {
			for ($i = 1; $i <= 5; $i++) {
				$nombre_base = basename(${"strFile$i"}['name']);
				$nombre_final = $strRFC."-".$nombre_base;
				$ruta = ruta()."/archivos/".$nombre_final;
				$subirarchivo = move_uploaded_file(${"strFile$i"}['tmp_name'],$_SERVER["DOCUMENT_ROOT"].$ruta);
				$arrdoc[$i-1] = $nombre_final;
			}
			if ($subirarchivo) {
				$request_Fsolicitudes = $this->model->insertdocSa($strRFC,$strSucursal,$arrdoc);

				if ($request_Fsolicitudes > 0) {
					$this->model->DropSA($strRFC);
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
	}
}

?>