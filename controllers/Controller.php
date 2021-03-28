<?php
require_once "./models/Model.php";
require_once "./views/View.php";

class Controller{
    var $view;
    var $model;

    public function __construct() {
        $this->view = new View();
        $this->model = new Model();
    }

    public function showHome() {
        $this->view->showViewHome();
    }

    public function test() {
        echo "test";
    }
}
?>