<?php

require_once "View.php";

class ProductView extends View{

    function __construct(){
        $this->url = 'product';
    }
    
    function showViewManage($data){
        include "./templates/$this->url/page/manage.html";
    }

    function showViewUpdate($data){
        include "./templates/$this->url/form/update.html";
    }
}