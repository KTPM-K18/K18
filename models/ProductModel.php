<?php
require_once "Model.php";
require_once "Product.php";
$head = "location:?controller=Product&task=showManage";

class ProductModel{
    var $product;

    function __construct(){
        $this->product = new Product();
    }

    function insertProduct($name, $color, $size, $amount, $price, $img){
        return $this->product->insertProduct($name, $color, $size, $amount, $price, $img);
    }

    function selectProduct(){
        return $this->product->selectProduct();
    }

    function selectProductAt($id){
        return $this->product->selectProductAt($id);
    }

    function deleteProduct($id){
        return $this->product->deleteProduct($id);
    }

    function updateProduct($id,$name,$color,$size,$amount,$price,$img){
        return $this->product->updateProduct($id,$name,$color,$size,$amount,$price,$img);
    }
}