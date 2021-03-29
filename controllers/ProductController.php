<?php

require_once "controllers/Controller.php";
require_once "models/ProductModel.php";
require_once "views/ProductView.php";

class ProductController{
    var $model;
    var $view;

    function __construct(){
        $this->model = new ProductModel();
        $this->view = new ProductView();
    }

    public function showManage(){
        $this->view->showViewManage();
    }
}