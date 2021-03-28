<?php 
	class CustomerView {

		public function formRegister() {
			require_once ("./templates/customer/form/registry.html");
		}

        public function notification($notify)
        {
            require_once("./templates/partials/notify/notify_account.php");
        }

        public function formLogin()
        {
            require_once ("./templates/customer/form/login.html");
        }

        public function formForgotPassword()
        {
            require_once("./templates/customer/form/forgotPassword.html");
        }

    }

 ?>