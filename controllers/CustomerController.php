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
	}

 ?>