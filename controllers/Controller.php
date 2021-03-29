<?php
require_once "./models/Model.php";
require_once "./views/View.php";

class Controller{
    var $view;
    var $model;

    public function showHome() {
        $this->view->showViewHome();
    }
    public function showProducts(){
        $this->view->showViewProducts();
    }
    public function showTopProducts(){
        $this->view->showViewTopProducts();
    }
    public function showSaleProducts(){
        $this->view->showViewSaleProducts();
    }
    public function showProductDetail(){
        $this->view->showViewProductDetail();
    }
}
?>