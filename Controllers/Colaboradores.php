<?php 

	class Colaboradores extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function Colaboradores(){

			$data['page_id']= 3;
			$data['page_tag']= "Colaboradores";
			$data['page_title']= "Colaboradores";
			$data['page_name']= "colaboradores";
			$this->views->getView($this,"colaboradores",$data);



		}

		public function getColaboradores(){
			$arrData = $this->model->selectColaboradores();

			for ($i=0; $i <count($arrData); $i++) { 
				$arrData[$i]['options'] = '<div class="text-center"> 
					<button class="btn btn-primary btn-sm " onclick="perfiles(this)" id="'.$arrData[$i]['idtrabajador'].'"title="Perfil"><i class="lni lni-pencil"></i></button>
				</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

	/*public function getperfil(string $idtrabajador){
		$stridtrabajador = strClean($idtrabajador);
			if ($stridtrabajador > 0) {
				$arrData = $this->model->selectPerfil($stridtrabajador);
				if (empty($arrData)) {
					$arrResponse = array('status' => false, 'msg' => 'Dato no encontrado.');
				}else{

					return $this->views->getView($this,"perfiles",$arrData);
				}
				//echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			//die();
	}


		/*public function getrol(int $idtrabajador){
			$intIdRol = intval(strClean($idtrabajador));
			if ($intIdRol > 0) {
				$arrData = $this->model->selectRol($intIdRol);
				if (empty($arrData)) {
					$arrResponse = array('status' => false, 'msg' => 'Dato no encontrado.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

		public function setRol(){
			$strRol = strClean($_POST['name']);
			$strDescripcion = strClean($_POST['description']);
			$intStatus = intval($_POST['status']);
			$request_rol = $this->model->insertRol($strRol,$strDescripcion,$intStatus);

			if ($request_rol > 0) {
				$arrResponse = array('status' => true, 'msg' => 'Datos Guardados Correctamente.');
			}else if($request_rol == 'exist'){
				$arrResponse = array('status' => false, 'msg' => '¡Atencion! El Rol ya exste.');
			}else{
				$arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();

		}*/
	}

?>