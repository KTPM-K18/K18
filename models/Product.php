<?php
require_once "Model.php";

class Product extends Model{
    var $table = 'products';
    var $id = 'id_products';

    
    function insertProduct($name, $color, $size, $amount, $price, $img, $sale, $purchase){
        $field = "`id_products`, `name`, `color` , `size`, `amount`, `price`, `img`, `sale`, `purchase`";
        $value = "NULL,'$name','$color','$size','$amount','$price','$img', '$sale', '$purchase'";
        echo "$value";
        return $this->insert($this->table, $field, $value);
    }

    function selectProduct(){
        return $this->select($this->table);
    }

    function selectProductAt($id){
        return $this->selectAt($this->table,"$this->id = $id");
    }

    function deleteProduct($id){
        return $this->delete($this->table, "$this->id = $id");
    }

    function updateProduct($id,$name,$color,$size,$amount,$price,$img,$sale,$purchase){
        $value = " name='$name', color='$color', size='$size', amount='$amount', price='$price', img='$img', sale='$sale', purchase='$purchase'";
        return $this->update($this->table, $value, "$this->id=$id");
    }
}