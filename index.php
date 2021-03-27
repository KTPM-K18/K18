<?php
$task = $_REQUEST['task'];
$controller = $_REQUEST['controller'];
$conName = ucfirst($controller)."Controller";
require_once "controllers/".$conName.".php";
$con = new $conName;
$con->$task();
?>
