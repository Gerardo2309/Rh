<?php 

	class perfilesModel extends Mysql{

			public function __construct(){
				parent::__construct();
			}

		public function selectPerfil(string $idtrabajador){
			$this->strIdTrabajador = $idtrabajador;
			$sql = "SELECT * FROM trabajadores WHERE idtrabajador = '{$this->strIdTrabajador}' ";
			$request = $this->select($sql);
			$sql_doc = "SELECT * FROM doctrabajadores WHERE idtrabajador = '{$this->strIdTrabajador}' ";
			$request_doc = $this->select($sql_doc);
			$request_arr = array_merge($request,$request_doc,);
			return $request_arr;
		}

		public function insertfoto(string $rfc, string $archivo){
			$this->strRFC = $rfc;
			$this->strFile = $archivo;
			$query_insert = "UPDATE doctrabajadores SET perfil = ?  WHERE idtrabajador = ?";
			$arrData = array( $this->strFile, $this->strRFC);
			$request_insert = $this->update($query_insert,$arrData);;
			return $request_insert;
		}
		
		/*public function DropSA(string $idtrabajador){
			$this->strIdTrabajador = $idtrabajador;
			$sql = "DELETE FROM fsolicitud WHERE idtrabajador ='{$this->strIdTrabajador}'";
			$request = $this->delete($sql);
			return $request;
		}*/

	}

?>