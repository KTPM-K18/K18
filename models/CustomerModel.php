<?php
require_once "Model.php";

class CustomerModel extends Model {
    protected $id;
    protected $fullname;
    protected $gender;
    protected $birthday;
    protected $address;
    protected $fullname_err;
    var $id_product = "id_products";

    public function __construct()
    {
        parent::__construct();
        $this->id = $this->fullname = $this->gender = $this->birthday = $this->address = "";
        $this->fullname_err = "";
    }

    public function updateInfo($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST['fullname'])) {
                $this->fullname_err = "Full name is required!";
            } else {
                $this->fullname = $_POST['fullname'];
            }

            if (!empty($_POST['gender'])) {
                $this->gender = $_POST['gender'];
            }

            if (!empty($_POST['date'])) {
                $this->birthday = $_POST['date'];
            }

            if (!empty($_POST['address'])) {
                $this->address = $_POST['address'];
            }
        }

        $value = " fullname='".$this->fullname."', gender='".$this->gender."', birthday='".$this->birthday."',
         address='".$this->address."' ";
        return $this->update('users', $value, $id);
    }

    public function getProduct($idProduct)
    {
        return $this->selectAt("products","$this->id_product = $idProduct");
    }
}