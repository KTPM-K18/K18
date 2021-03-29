<?php

class View{

    var $url;

    public function showViewHome(){
        include "./templates/$this->url/page/home.html";
    }

    public function showViewProducts(){
        include "./templates/$this->url/page/products.html";
    }

    public function showViewTopProducts(){
        include "./templates/$this->url/page/top.html";
    }

    public function showViewSaleProducts(){
        include "./templates/$this->url/page/sale.html";
    }

    public function showViewProductDetail(){
        include "./templates/$this->url/page/product_detail.html";
    }
}