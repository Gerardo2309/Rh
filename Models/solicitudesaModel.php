<?php 

	class solicitudesaModel extends Mysql{

			public function __construct(){
				parent::__construct();
			}

		public function selectSolicitudesA(){
			$sql = "SELECT * FROM fsolicitud WHERE status = 1";
			$request = $this->select_all($sql);
			return $request;
		}

		public function insertdocSa($idtrabajador, $sucursal, $documentos){
			$arrfecha[7] = date('Y-m-d');
			$this->strIdTrabajador = $idtrabajador;
			$this->strSucursal[8] = $sucursal;
			$this->strfiles = $documentos;
			$sql = "SELECT idtrabajador, nombres, apellidos, puesto, telefono, correo, direccion, archivo  FROM fsolicitud WHERE idtrabajador ='{$this->strIdTrabajador}' ";
			$request = $this->select_all($sql);
			if (!empty($request)) {
				$archivo = $request[0]['archivo'];
				unset($request[0]['archivo']);
				$i = 0;
				foreach ($request[0] as $dato) {
					$datos[$i] = $dato;
					$i++;
				}
				$query_insert = "INSERT INTO trabajadores(idtrabajador,nombres,apellidos,puesto,telefono,correo,direccion,fechaingreso,sucursal) VALUES(?,?,?,?,?,?,?,?,?)";
				$arrData = array_merge($datos,$arrfecha,$this->strSucursal);
				$request_insert = $this->insert($query_insert,$arrData);
				$query_inserdoct = "INSERT INTO doctrabajadores(idtrabajador,doc1, doc2, doc3, doc4, doc5, perfil) VALUES(?,?,?,?,?,?,?)"; 
				$arrDoc = array_merge(array($this->strIdTrabajador, $archivo),$this->strfiles);
				$request_insertdoc = $this->insert($query_inserdoct,$arrDoc);
				$return = $request_insertdoc;
			}else{
				$return = "ERROR EN NO ENCONTRAMOS EL DATO";
			}
			return $return;
		}
		
		public function DropSA(string $idtrabajador){
			$this->strIdTrabajador = $idtrabajador;
			$sql = "DELETE FROM fsolicitud WHERE idtrabajador ='{$this->strIdTrabajador}'";
			$request = $this->delete($sql);
			return $request;
		}

	}

?>