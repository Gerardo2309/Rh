<?php 

	class Login extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function Login(){

			$data['page_id']= 10;
			$data['page_tag']= "Login";
			$data['page_title']= "Login";
			$data['page_name']= "Login";
			$this->views->getView($this,"login",$data);
		}

		public function getlogin(){
			$strUser = strClean($_POST['txtuser']);
			$strPassword = strClean($_POST['txtpassword']);
			$request = $this->model->selectLogin($strUser, $strPassword);
			if ($request['opc']==1) {
				$arrResponse = array('status' => true, 'msg' => $request['msg']);
			}else{
				$arrResponse = array('status' => false, 'msg' => $request['msg']);
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			die();

		} 
	}
?>