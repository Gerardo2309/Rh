<?php 

class Nomina extends Controllers{

	public function __construct(){
		parent::__construct();
	}

	public function Nomina(){
		$data['page_id']= 8;
		$data['page_tag']= "Nomina";
		$data['page_title']= "Nomina";
		$data['page_name']= "Nomina";
		$this->views->getView($this,"nomina",$data);

	}

		public function getColaboradores(){
			$arrData = $this->model->selectColaboradores();
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}


	public function getNomina(){
		$arrColaborador = $this->model->selectColaboradores();

		foreach($arrColaborador as $trabajador){  
				$asistencia = $this->model->selectAsistencia($trabajador['idtrabajador']); 
				$sfiscal = $this->model->selectIsr($trabajador['salario'], $asistencia );    
				$imss = $this->model->selectImss($trabajador['salario'], $trabajador['infonavit']);  
				$comida = $this->model->selectcomida($trabajador['idtrabajador']);
				$cxc = $this->model->selectcxc($trabajador['idtrabajador']);
				$efectivo = $trabajador['sueldo']-$sfiscal-$comida-$imss-$cxc;
			   $arrData[] = array(
			    "id"=>$trabajador['idtrabajador'], 
			    "nombres"=>$trabajador['nombres'],
			    "apellidos"=>$trabajador['apellidos'],
			    "sfiscal"=>	round($sfiscal, 2),
			  	"pefectivo"=>round($efectivo,2),
			   	"global"=> round($sfiscal+$efectivo,2)

			   );
		}

		
		//print_r( $arrData);
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}

	public function setCxC(){
		$strRFC = strClean($_POST['nombre']);
		$intMonto = intval(strClean($_POST['monto']));
		$strPlazos = strClean($_POST['plazos']);
		$slTipo = strClean($_POST['tipo']);

		if ($strRFC != '') {
			$request_CxC = $this->model->insertCxC($strRFC, $intMonto, $strPlazos, $slTipo);
			if ($request_CxC  == 0) {
				$arrResponse = array('status' => true, 'msg' => 'Datos Guardados Correctamente.');
			}else if($request_CxC  == 'error'){
				$arrResponse = array('status' => false, 'msg' => 'No es posible almacenar los datos.');

			}
			//print_r($request_CxC);
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	/*public function getDropSA(string $idtrabajador){
		$strRFC = strClean($idtrabajador);
		if ($strRFC  != '') {
			$arrData = $this->model->DropSA($strRFC);
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