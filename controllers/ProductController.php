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

    public function showHome(){
        $data = $this->model->selectProduct();
        $this->view->showViewManage($data);
    }

    public function showUpdate(){
        $id = $_REQUEST['id'];
        $data = $this->model->selectProductAt($id);
        $this->view->showViewUpdate($data);
    }

    public function insertProduct() {
        $this->view->insertProduct();
    }

    public function insert(){
        $name = $_POST['name'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $amount = $_POST['amount'];
        $price = $_POST['price'];
        $img = $_POST['img'];
        $sale = $_POST['sale'];
        $purchase = $_POST['purchase'];

        $result = $this->model->insertProduct($name, $color, $size, $amount, $price, $img, $sale, $purchase);
        if($result){
            header('location:?task=showHome');
        }else{
            echo "That bai!";
        }
    }

    public function delete(){
        $id = $_REQUEST['id'];
        var_dump($id);
        $result = $this->model->deleteProduct($id);
        if($result){
            header('location:?task=showHome');
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
        $sale = $_POST['sale'];
        $purchase = $_POST['purchase'];

        $result = $this->model->updateProduct($id,$name,$color,$size,$amount,$price, $img, $sale, $purchase);
        if($result){
            header('location:?task=showHome');
        }else{
            echo "That bai!";
        }
    }

    public function logOut(){
        setcookie("id", $_COOKIE['id'],time()-3600,"/");
        setcookie("admin", $_COOKIE['admin'] ,time()-3600,"/");
        header("Location: ?task=showHome");
    }
}