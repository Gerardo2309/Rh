<?php 

	class asistenciaModel extends Mysql{

		public function __construct(){
			parent::__construct();
		}


		public function selectAsistencia($inicio, $fin){
		
			$this->finicio = $inicio;
			$this->fin = $fin;

			$sql_trabajador = "SELECT idtrabajador, nombres, apellidos, puesto FROM trabajadores";
			$request_trab = $this->select_all($sql_trabajador);

			foreach($request_trab as $trabajador){   
				$sql_asistencia = "SELECT * FROM asistencia WHERE idtrabajador = '{$trabajador['idtrabajador']}' AND fecha BETWEEN '{$this->finicio}' AND '{$this->fin}'  ";
				$request_asis = $this->select_all($sql_asistencia); 
				if (!empty($request_asis)) {
					foreach($request_asis as $asistencia){  
					    $arrData[] = array(
					    	"id"=>$trabajador['idtrabajador'], 
					    	"nombres"=>$trabajador['nombres'],
					    	"apellidos"=>$trabajador['apellidos'],
					    	"puesto"=>$trabajador['puesto'],
					    	"fecha"=>$asistencia['fecha'],
					    	"entrada"=>$asistencia['entrada'],
					    	"salida"=>$asistencia['salida'],
					    );
					}        
				}else{
					$arrData=[];
				}
			}

			

			return $arrData;
		}

		public function insertAsistencia($trabajador, $fecha, $entrada, $salida){
			$return = "";
			$this->inttrabajador = $trabajador;
			$this->datfecha = $fecha;
			$this->timentrada = $entrada;
			$this->timsalida = $salida;

			$query_insert = "INSERT INTO asistencia(idtrabajador,fecha,entrada,salida) VALUES(?,?,?,?)";
			$arrData = array($this->inttrabajador, $this->datfecha,$this->timentrada, $this->timsalida);
			$request_insert = $this->insert($query_insert,$arrData);
			if ($request_insert) {
				$return = 1;
			}else{
				$return = 0;
			}
			return $return;

		}




	}

?>