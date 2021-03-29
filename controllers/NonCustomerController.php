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

	public function notification() {
		$notify = $_REQUEST['notify'];
		$this->view->notification($notify);
    }

	public function register() {
		$this->view->formRegister();
	}

	public function saveAccount() {
		$result = $this->model->saveAccount();
		if ($result == true) {
			header("Location: ?controller=NonCustomer&task=notification&notify=success");
        } else {
		    header("Location: ?controller=NonCustomer&task=notification&notify=fail");
        }
	}

	public function login(){
        $this->view->formLogin();
    }

    public function getAccount() {
		$data = $this->model->getAccount();
		if ($data != NULL && count($data) > 0) {
		    header("Location: ?controller=Customer&task=showHome");
        } else {
            header("Location: ?controller=NonCustomer&task=notification&notify=fail");
        }
    }

    public function forgotPassword() {
		$this->view->formForgotPassword();
    }
}
