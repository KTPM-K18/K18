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

    public function select($table){
        $query = "SELECT * FROM $table";
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
            $data = [];
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        return $data;
    }

    public function selectAt($table, $id){
        $query = "SELECT * FROM $table WHERE $id";
        $result = $this->conn->query($query);
        if($result->num_rows > 0){
            $data = [];
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        return $data;
    }

    public function insert($table, $field, $value){
        $query = "INSERT INTO $table ($field) VALUES ($value)";
        $result = $this->conn->query($query);
        if($result){
            return 1;
        }
        return 0;
    }

    public function delete($table, $id){
        $query = "DELETE FROM $table WHERE $id";
        $result = $this->conn->query($query);
        if($result){
            return 1;
        }
        return 0;
    }

    public function update($table, $value, $id){
        $query = "UPDATE $table SET $value WHERE $id";
        $result = $this->conn->query($query);
        if($result){
            return 1;
        }
        return 0;
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}