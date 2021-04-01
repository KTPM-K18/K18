<?php

require_once "Controller.php";
require_once "./models/NonCustomerModel.php";
require_once "./views/NonCustomerView.php";

class NonCustomerController extends Controller{
	public function __construct()
	{
		$this->view = new NonCustomerView();
        $this->model = new NonCustomerModel();
	}

	public function register() {
		$this->view->formRegister();
	}

	public function saveAccount() {
		$result = $this->model->saveAccount();
		if ($result == true) {
			header("Location: ?task=notification&notify=success");
        } else {
		    header("Location: ?task=notification&notify=fail");
        }
	}

	public function notification() {
		$notify = $_REQUEST['notify'];
		$this->view->notification($notify);
	}

	public function login(){
		if(isset($_COOKIE['id'])){
			header("location:?task=showHome");
		}
        $this->view->formLogin();
    }

    public function getAccount() {
		$data = $this->model->getAccount();
		if ($data != NULL && count($data) > 0) {
			setcookie("id", $data[0]['id_users'],time()+3600,"/");
			setcookie("admin", $data[0]['admin'],time()+3600,"/");
		    if($_COOKIE['admin'] != 1){
				header("Location: ?task=showHome");
			}else{
				header("Location: ?task=showManage");
			}
        } else {
            header("Location: ?task=notification&notify=fail");
        }
    }

    public function forgotPassword() {
		$this->view->formForgotPassword();
    }
}
