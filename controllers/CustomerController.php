<?php
require_once "Controller.php";
require_once "./models/CustomerModel.php";
require_once "./views/CustomerView.php";

	class CustomerController extends Controller
	{
		public $view;
		public $model;

		public function __construct()
		{
			$this->view = new CustomerView();
			$this->model = new CustomerModel();
		}

		public function showCarts(){
			$this->view->showViewCarts();
		}
		public function showInfor(){
			$this->view->showViewInfor();
		}

		public function notification() {
			$notify = $_REQUEST['notify'];
			$this->view->notification($notify);
		}


		public function logOut(){
			setcookie("id", $_COOKIE['id'],time()-3600,"/");
			setcookie("admin", $_COOKIE['admin'] ,time()-3600,"/");
			header("Location: ?task=showHome");
		}
	}

 ?>