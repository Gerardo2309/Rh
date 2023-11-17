<?php 

	class loginModel extends Mysql{

		public function __construct(){
			parent::__construct();
		}

		public function selectLogin(string $user, string $password){
			$return = "";
			$opc = 0;
			$this->strUser = $user;
			$this->strPassword = $password;
			$sql = "SELECT * FROM users WHERE user = '{$this->strUser}' ";
			$request = $this->select($sql);
			if(!empty($request)){
				$hash = $request['password'];
				// Crear la contraseña:
				//$hash = Password::hash('Gerardo2309');

				if (Password::verify($this->strPassword, $hash)) {

					$return = "Contraseña correcta!";
					$opc = 1;
				} else {
					$return = "Contraseña incorrecta!";
					$opc = 0;
				}
			}else{
				$return = "El Usuario no existe";
				$opc = 0;
			}
			$arrData = array(
			    "opc"=>$opc, 
			    "msg"=>$return
			   );

			return $arrData;
		}

	}
	class Password {
		const SALT = 'EstoEsUnSalt';
		public static function hash($password) {
			return hash('sha512', self::SALT . $password);
		}
		public static function verify($password, $hash) {
			return ($hash == self::hash($password));
		}
	}
?>