	<?php 
	class mysql extends Conexion{
		private $conexion;
		private $strquery;
		private $arrvalues;

		function __construct(){
			$this->conexion = new Conexion();
			$this->conexion = $this->conexion->conect();
		}

		public function insert(string $query, array $arrvalues){
			$this->strquery = $query;
			$this->arrvalues = $arrvalues;

			$insert = $this->conexion->prepare($this->strquery);
			$resInsert = $insert->execute($this->arrvalues);
			return $resInsert;
		}

		public function select(string $query){
			$this->strquery = $query;
			$result = $this->conexion->prepare($this->strquery);
			$result->execute();
			$data = $result->fetch(PDO::FETCH_ASSOC);
			return $data;
		}

		public function select_all(string $query){
			$this->strquery = $query;
			$result = $this->conexion->prepare($this->strquery);
			$result->execute();
			$data = $result->fetchall(PDO::FETCH_ASSOC);
			return $data;
		}

		public function update(string $query, array $arrvalues){
			$this->strquery = $query;
			$this->arrvalues = $arrvalues;
			$update = $this->conexion->prepare($this->strquery);
			$resExecute = $update->execute($this->arrvalues);
			return $resExecute;
		}

		public function delete($query){
			$this->strquery = $query;
			$result = $this->conexion->prepare($this->strquery);
			$del = $result->execute();
			return $del;
		}

	}


?>