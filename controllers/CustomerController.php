<?php
require_once "Controller.php";
require_once "./models/CustomerModel.php";
require_once "./views/CustomerView.php";

	class CustomerController extends Controller
	{
		public $view;
		public $model;
        var $id_name = 'id_users';

		public function __construct()
		{
			$this->view = new CustomerView();
			$this->model = new CustomerModel();
		}

		public function showCarts(){
			$this->view->showViewCarts();
		}

		public function showInfor(){
		    $id = $_COOKIE['id'];
		    $data = $this->model->selectAt("users", "$this->id_name = $id");
			$this->view->showViewInfor($data);
		}

		public function updateInfo() {
            $id = $_COOKIE['id'];
            $result = $this->model->updateInfo("$this->id_name = $id");
            if($result){
                header('location:?task=showHome');
            }else{
                echo "That bai!";
            }
        }

		public function notification() {
			$notify = $_REQUEST['notify'];
			$this->view->notification($notify);
		}

        public function addProduct() {
            $data = $this->model->getProduct($_REQUEST['idProduct']);
//            .....
            $this->view->addProduct($data, $_POST['amount']);
        }

		public function logOut(){
			setcookie("id", $_COOKIE['id'],time()-3600,"/");
			setcookie("admin", $_COOKIE['admin'] ,time()-3600,"/");
			header("Location: ?task=showHome");
		}
	}

 ?>