<?php 

	class SolicitudesE extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function SolicitudesE(){
			$data['page_id']= 5;
			$data['page_tag']= "Solicitudes Empleo";
			$data['page_title']= "Solicitudes Empleo";
			$data['page_name']= "Solicitudes Empleo";
			$this->views->getView($this,"solicitudese",$data);

		}

		public function getSolicitudesE(){
			$arrData = $this->model->selectSolicitudesE();

			for ($i=0; $i <count($arrData); $i++) { 

				$arrData[$i]['archivo'] = '<a href="'."http://".$_SERVER['HTTP_HOST'].ruta()."/archivos/".$arrData[$i]['archivo'].'">Ver CV</a>';
				$arrData[$i]['options'] = '<div class="text-center"> 
					<button class="btn btn-primary btn-sm btnAceptarSE" onclick="aceptar(this)" id="'.$arrData[$i]['idtrabajador'].'"title="Aceptar"><i class="lni lni-checkmark"></i></button>
					<button class="main-btn danger-btn-outline rounded-md  btn-sm btn-hover btnEliminar" rl="'.$arrData[$i]['idtrabajador'].'"title="Rechazar"><i class="lni lni-close"></i></button>
				</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function getActionSE(string $idtrabajador){
			$stridtrabajador = strClean($idtrabajador);
			if ($stridtrabajador != '') {
				$arrData = $this->model->selectActionSE($stridtrabajador);
				if (empty($arrData)) {
					$arrResponse = array('status' => false, 'msg' => 'Dato no encontrado.');
				}else{
					$arrResponse = array('status' => true, 'msg' => 'Usuario Aceptado Correctamente');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function getDropSe(string $idtrabajador){
			$stridtrabajador = strClean($idtrabajador);
			if ($stridtrabajador  != '') {
				$arrData = $this->model->DropSe($stridtrabajador);
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