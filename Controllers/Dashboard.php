<?php 

	class Dashboard extends Controllers{

		public function __construct(){
			parent::__construct();
		}

		public function dashboard(){
			$data['page_id']= 2;
			$data['page_tag']= "Dashboard - Reservas";
			$data['page_title']= "Dashboard - Reservas";
			$data['page_name']= "dashboard";
			$this->views->getView($this,"dashboard",$data);

		}
	}

?>