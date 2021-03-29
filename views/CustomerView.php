<?php 
require_once "View.php";

	class CustomerView extends View{
        public function __construct(){
            $this->url = "customer";
        }
        public function showViewCarts(){
            include "./templates/$this->url/page/cart.html";
        }
        public function showViewInfor(){
            include "./templates/$this->url/page/info.html";
        }
    }

 ?>