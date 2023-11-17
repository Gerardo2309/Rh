<?php 

	class FsolicitudModel extends Mysql{

		public function __construct(){
			parent::__construct();
		}

		public function insertFsolicitud(string $rfc, string $nombre,string $apellidop, string $apellidom, string $puesto, int $telefono, string $correo, string $direccion, string $archivo, int $status){
			$return = "";
			$this->strRFC = $rfc;
			$this->strNombre = $nombre;
			$this->strApellidos = $apellidop." ".$apellidom;
			$this->strPuesto = $puesto;
			$this->intMob = $telefono;
			$this->strEmail = $correo;
			$this->strDireccion = $direccion;
			$this->strFile = $archivo;
			$this->intStatus = $status;

			$sql = "SELECT * FROM fsolicitud WHERE idtrabajador ='{$this->strRFC}' ";
			$request = $this->select_all($sql);
			if (empty($request)) {
				$query_insert = "INSERT INTO fsolicitud(idtrabajador,nombres,apellidos,puesto,telefono,correo,direccion,archivo,status) VALUES(?,?,?,?,?,?,?,?,?)";
				$arrData = array($this->strRFC, $this->strNombre, $this->strApellidos,$this->strPuesto, $this->intMob, $this->strEmail, $this->strDireccion, $this->strFile, $this->intStatus);
				$request_insert = $this->insert($query_insert,$arrData);
				$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}

	}

?>