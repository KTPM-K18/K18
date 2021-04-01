<?php
require_once "./models/Model.php";
require_once "./views/View.php";

class Controller{
    var $view;
    var $model;
    var $table='products';
    var $id='id_products';

    public function showHome() {
        $this->view->showViewHome();
    }
    public function showProducts(){
        $data = $this->model->select($this->table);
        $this->view->showViewProducts($data);
    }
    public function showTopProducts(){
        $this->view->showViewTopProducts();
    }
    public function showSaleProducts(){
        $this->view->showViewSaleProducts();
    }
    public function showProductsDetail(){
        $id = $_REQUEST["id"];
        $data = $this->model->selectAt($this->table,"$this->id = $id");
        $this->view->showViewProductDetail($data);
    }
}
?>