<?php 

	class colaboradoresModel extends Mysql{

			public function __construct(){
				parent::__construct();
			}

		public function selectColaboradores(){
			$sql = "SELECT * FROM trabajadores";
			$request = $this->select_all($sql);
			return $request;
		}

		/*public function selectPerfil(string $idtrabajador){
			$this->strIdTrabajador = $idtrabajador;
			$sql = "SELECT * FROM trabajadores WHERE idtrabajador = '{$this->strIdTrabajador}' ";
			$request = $this->select($sql);
			return $request;
		}

		/*public function selectRol(int $idrol){
			$this->intIdrol = $idrol;
			$sql = "SELECT * FROM rol WHERE idrol = $this->intIdrol";
			$request = $this->select($sql);
			return $request;
		}

		public function insertRol(string $rol, string $descripcion, int $status){
			$return = "";
			$this->strRol = $rol;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;

			$sql = "SELECT * FROM rol WHERE nombrerol ='{$this->strRol}' ";
			$request = $this->select_all($sql);
			if (empty($request)) {
				$query_insert = "INSERT INTO rol(nombrerol,descripcion,status) VALUES(?,?,?)";
				$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
				$request_insert = $this->insert($query_insert,$arrData);
				$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}*/

	}

?>