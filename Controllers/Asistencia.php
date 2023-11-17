<?php 

	class Asistencia extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function Asistencia(){

			$data['page_id']= 9;
			$data['page_tag']= "Asistencia";
			$data['page_title']= "Asistencia";
			$data['page_name']= "asistenncia";
			$this->views->getView($this,"Asistencia",$data);
		}


		public function getAsistencia(){
			$datfini = $_POST['datini'];
			$datffin = $_POST['datfin'];
			if (!empty($datfini)&&!empty($datffin)){
				$arrData = $this->model->selectAsistencia($datfini, $datffin);
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
				die();
			}
		}


		public function setAsistencia(){
			$strFile = $_FILES['txtExcel']['name'];
			$tipo = $_FILES['txtExcel']['type'];
			$archivotmp = $_FILES['txtExcel']['tmp_name'];
			$lineas = file($archivotmp);
			$i = 0;
			foreach ($lineas as $linea) {
			    $cantidad_registros = count($lineas);
			    $cantidad_regist_agregados =  ($cantidad_registros - 1);

			    if ($i != 0) {

			        $datos = explode(",", $linea);
			       
			        $trabajador  = $datos[0];
			        $fechatemp  = $datos[3];
			        $entrada  = $datos[4];
			        $salida = $datos[5];

					$fecha = date("Y-m-d", strtotime($fechatemp));
			       	
			        $request_Excel = $this->model->insertAsistencia($trabajador, $fecha, $entrada, $salida);
			    }
			    $i++;
			}


			if ($request_Excel > 0) {
					$arrResponse = array('status' => true, 'msg' => 'Se Guardaron '.$cantidad_regist_agregados.' Datos Correctamente.');
			}else if($request_Excel == 'exist'){
					$arrResponse = array('status' => false, 'msg' => '¡Atencion! El Usuario ya exste.');
			}else if ($request_Excel == 0) {
					$arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();
		}
	}
?>