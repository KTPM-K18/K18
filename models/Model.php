<?php

const HOST = "localhost";
const USER = "root";
const PASS = "";
const DATABASE = "shopweb";

class Model{
    protected $conn;

    public function __construct() {
    	$this->conn = new mysqli(HOST, USER, PASS, DATABASE);
    	$this->conn->set_charset("utf-8");
        if ($this->conn->connect_error) {
            echo "Failed to connect to MySQL: " . $this->conn->connect_error;
            exit();
        }
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}