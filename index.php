<?php

$task='showHome';
if(isset($_COOKIE['id'])){
    if($_COOKIE['admin'] == 1){
        $controller='Product';
    }else{
        $controller='Customer';
    }
}else{
    $controller='NonCustomer';
}

if(isset($_REQUEST['task'])){
    $task=$_REQUEST['task'];
}
$conName = ucfirst($controller)."Controller";
require_once "controllers/".$conName.".php";
$con = new $conName;
$con->$task();
?>
