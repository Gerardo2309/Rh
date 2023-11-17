<?php 

	class solicitudeseModel extends Mysql{

			public function __construct(){
				parent::__construct();
			}

		public function selectSolicitudesE(){
			$sql = "SELECT * FROM fsolicitud WHERE status = 0";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectActionSE(string $idtrabajador){
			$return = "";
			$this->strIdTrabajador = $idtrabajador;
			$this->intstatus = 1;
			$sql = "SELECT * FROM fsolicitud WHERE idtrabajador ='{$this->strIdTrabajador}' ";
			$request = $this->select($sql);
			if (!empty($request)) {
				$query_update = "UPDATE fsolicitud SET status = ?  WHERE idtrabajador = ?";
				$arrData = array($this->intstatus , $this->strIdTrabajador);
				$request_update = $this->update($query_update,$arrData);
				$return = $request_update;
			}else{
				$return = "No Existe";
			}
			return $return;

		}
		
		public function DropSe(string $idtrabajador){
			$this->strIdTrabajador = $idtrabajador;
			$sql = "DELETE FROM fsolicitud WHERE idtrabajador ='{$this->strIdTrabajador}'";
			$request = $this->delete($sql);
			return $request;
		}

	}

?>