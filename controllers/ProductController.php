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
        $data = $this->model->selectProduct();
        $this->view->showViewManage($data);
    }

    public function showUpdate(){
        $id = $_REQUEST['id'];
        $data = $this->model->selectProductAt($id);
        $this->view->showViewUpdate($data);
    }

    public function insert(){
        $name = $_POST['name'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $amount = $_POST['amount'];
        $price = $_POST['price'];
        $img = $_POST['img'];

        $result = $this->model->insertProduct($name, $color, $size, $amount, $price, $img);
        if($result){
            header('location:?controller=Product&task=showManage');
        }else{
            echo "That bai!";
        }
    }

    public function delete(){
        $id = $_REQUEST['id'];
        var_dump($id);
        $result = $this->model->deleteProduct($id);
        if($result){
            header('location:?controller=Product&task=showManage');
        }else{
            echo "That bai!";
        }
    }

    public function update(){
        $id = $_REQUEST['id'];
        $name = $_POST['name'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $amount = $_POST['amount'];
        $price = $_POST['price'];
        $img = $_POST['img'];

        $result = $this->model->updateProduct($id,$name,$color,$size,$amount,$price, $img);
        if($result){
            header('location:?controller=Product&task=showManage');
        }else{
            echo "That bai!";
        }
    }
}