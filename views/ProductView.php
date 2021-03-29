<?php

require_once "View.php";

class ProductView extends View{
    function showViewManage(){
        $this->showViewHome();
    }
}