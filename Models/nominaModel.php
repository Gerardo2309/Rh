<?php 

	class nominaModel extends Mysql{

			public function __construct(){
				parent::__construct();
			}

		public function selectColaboradores(){
			$sql = "SELECT * FROM trabajadores";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectcxc($idtrabajador){
			$this->strIdTrabajador = $idtrabajador;
			$sql_cxc = "SELECT monto,plazos,cobrado FROM cxc WHERE idtrabajador = '{$this->strIdTrabajador}'";
			$request_cxc = $this->select_all($sql_cxc);
			$sumArray = 0;

			foreach ($request_cxc as $value) {
				$sumArray+=$value['monto']/$value['plazos'];
			}
			return $sumArray;
		}

		public function selectcomida($idtrabajador){
			$this->strIdTrabajador = $idtrabajador;
			$sumArray = 0;
			$sql = "SELECT total FROM comida_trab WHERE idtrabajador = '{$this->strIdTrabajador}'";
			$request = $this->select_all($sql);

			foreach ($request as $subArray) {
				foreach ($subArray as $value) {
					$sumArray+=$value;
				}
			}
			
			return $sumArray ;

		}
		
		public function selectIsr($salario, $asistencia){
			$this->desalario = $salario*($asistencia+0.21);
			$sql = "SELECT * FROM cal_isr WHERE $this->desalario BETWEEN inferior2 AND lim_sup";
			$request = $this->select_all($sql);
			foreach($request as $v){
				$this->inferior = $v['inferior1'];
				$this->porcien = $v['porciento'];
				$this->cuota = $v['cuota'];
				$this->subcidio = $v['subcidio'];
			}
			$stp1 = $this->desalario-$this->inferior;
			$stp2 = $stp1 * ($this->porcien/100);
			$stp3 = $stp2 + $this->cuota;
			$stp4 = $this->subcidio - round($stp3, 2);
			$total = $this->subcidio+$this->desalario;
			return $total;
		}

		public function selectImss($salario, $SInfonavit){

			$this->desalario = $salario;
			$this->infostatus = $SInfonavit;
			$sbc = $this->desalario;
			$Pdinero = (180.68*15.21)*(0.250/100);
			$PenyBen = (180.68*15.21)*(0.375/100);
			$InvyVida = (180.68*15.21)*(0.625/100);
			$CasantyVej = (180.68*15.21)*(1.125/100);
			if ($this->infostatus == 1) {
				$Infonavit = ($sbc*15)*(5.00/100);
				$total = $Pdinero+$PenyBen+$InvyVida+$CasantyVej+$Infonavit;
				return $total;
			}else{
				$total = $Pdinero+$PenyBen+$InvyVida+$CasantyVej;
				return $total;
			}
		}


		public function insertCxC(string $idtrabajador, int $monto, string $plazos, string $tipo){
			$return = "";
			$this->strIdTrabajador = $idtrabajador;
			$this->intMonto = $monto;
			$this->intStatus = 1;
			$this->intCobrado = 0;
			$this->strPlazos = $plazos;
			$this->strTipo = $tipo;
			$this->datFech = date('Y-m-d');
			if ($this->strTipo == 'ppersonal') {
				$this->stridcxc = "pper".date('YmdHi');
			}else if ($this->strTipo == 'cimss') {
				$this->stridcxc = "imss".date('YmdHi');
			}
			$query_insert = "INSERT INTO cxc(fecha,idcxc,idtrabajador,monto,plazos,cobrado,tipo,status) VALUES(?,?,?,?,?,?,?,?)";
			$arrData = array($this->datFech, $this->stridcxc, $this->strIdTrabajador,$this->intMonto, $this->strPlazos, $this->intCobrado,$this->strTipo, $this->intStatus);
			$request_insert = $this->insert($query_insert,$arrData);
			if ($request_insert) {
				$return = 0;
			}else{
				$return = "error";
			}
				
			return $return;
		}

		public function selectAsistencia($idtrabajador){
			$this->strIdTrabajador = $idtrabajador;
			$sql = "SELECT fecha FROM asistencia WHERE idtrabajador = '{$this->strIdTrabajador}'";
			$request = $this->select_all($sql);
			$cantidad = count($request)+2;

			return $cantidad;
		}




		/*public function DropSA(string $idtrabajador){
			$this->strIdTrabajador = $idtrabajador;
			$sql = "DELETE FROM fsolicitud WHERE idtrabajador ='{$this->strIdTrabajador}'";
			$request = $this->delete($sql);
			return $request;
		}*/
			

	}

?>