<?php 
require_once "View.php";
	class NonCustomerView extends View{

        public function __construct(){
            $this->url = "nonCustomer";
        }

		public function formRegister() {
			require_once ("./templates/$this->url/form/registry.html");
		}

        public function notification($notify)
        {
            require_once("./templates/partials/notify/notify_account.php");
        }

        public function formLogin()
        {
            require_once ("./templates/$this->url/form/login.html");
        }

        public function formForgotPassword()
        {
            require_once("./templates/$this->url/form/forgotPassword.html");
        }
    }

 ?>