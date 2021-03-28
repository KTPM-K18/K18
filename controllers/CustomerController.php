<?php
	require_once ("Controller.php");
	require_once "./models/ModelUser.php";
	require_once "./views/CustomerView.php";

	class CustomerController
	{
		protected $viewCus;
		protected $modelCus;

		public function __construct()
		{
			$this->viewCus = new CustomerView();
			$this->modelCus = new ModelUser();
		}

		public function notification() {
		    $notify = $_REQUEST['notify'];
		    $this->viewCus->notification($notify);
        }

		public function register() {
			$this->viewCus->formRegister();
		}

		public function saveAccount() {
			$result = $this->modelCus->saveAccount();
			if ($result == true) {
			    header("Location: ?controller=customer&task=notification&notify=success");
            } else {
			    header("Location: ?controller=customer&task=notification&notify=fail");
            }
		}

		public function login() {
            $this->viewCus->formLogin();
        }

        public function getAccount() {
		    $data = $this->modelCus->getAccount();
		    if ($data != NULL && count($data) > 0) {
		        header("Location: ?controller=&task=showHome");
            } else {
                header("Location: ?controller=customer&task=notification&notify=fail");
            }
        }

        public function forgotPassword() {
		    $this->viewCus->formForgotPassword();
        }
	}

 ?>