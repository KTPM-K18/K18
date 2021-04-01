<?php

require_once "View.php";

class ProductView extends View{

    function __construct(){
        $this->url = 'product';
    }

    public function showViewManage($data){
        include "./templates/$this->url/page/home.html";
    }

    function showViewUpdate($data){
        include "./templates/$this->url/form/update.html";
    }
}