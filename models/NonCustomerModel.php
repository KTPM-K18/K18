<?php 

    require_once "Model.php";
	class NonCustomerModel extends Model
	{
	    private $full_name;
	    private $user_name;
	    private $password;
	    private $full_name_err;
	    private $user_name_err;
	    private $password_err;
	    private $check;
		
		public function __construct()
		{
			parent::__construct();
			$this->full_name = $this->user_name = $this->password = $this->check = "";
			$this->full_name_err = $this->user_name_err = $this->password_err = "";
		}

		// Lưu tài khoản vào database
		public function saveAccount() {
			if($_SERVER['REQUEST_METHOD'] == "POST") {          // Kiểm tra phương thức method của form
			    // Lấy dữ liệu của của form cho thằng full name
			    if (empty($_POST['lname']) || empty($_POST['fname'])) {
			        if (empty($_POST['lname'])) {               // ô last name trống
			            $this->full_name_err = "Last name is required!";
                    } else {            // ô first name trống
			            $this->full_name_err = "First name is required!";
                    }
                } else {
                    $this->full_name = $_POST['lname'] . $_POST['fname'];
                }

			    // Lấy dữ liệu của form cho thằng user name
                if (empty($_POST['user_name'])) {    // ô user name trống
                    $this->user_name_err = "User name is required!";
                } else {
                    $this->user_name = $_POST['user_name'];
                }

                // Lấy dữ liệu của form cho thằng password
                if (empty($_POST['password']) || empty($_POST['retype_password'])) {
                    $this->password_err = "Password is required!";
                } else {
                    if($_POST['password'] != $_POST['retype_password']) {
                        $this->check = "Password mismatch";
                    }
                    $this->password = $_POST['password'];
                }

                // Lưu vào database
                if(!empty($this->full_name) && !empty($this->user_name) && !empty($this->password)) {
                    $query = "insert into users (fullname, username, password)
                                values ('".$this->full_name."', '".$this->user_name."', '".$this->password."')";
                    return $this->conn->query($query);
                }
                return false;
            }
		}

        public function getAccount()
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (empty($_POST['user_name'])) {
                    $this->user_name_err = "User name is required!";
                } else {
                    $this->user_name = $_POST['user_name'];
                }

                if (empty($_POST['password'])) {
                    $this->password_err = "Password is required!";
                } else {
                    $this->password = $_POST['password'];
                }
            }

            // Lấy giữ liệu trên database
            if (!empty($this->user_name) && !empty($this->password)) {
                $query = "select * from users where username = '".$this->user_name."' and password = '".$this->password."'";
                $result = $this->conn->query($query);
                if($result->num_rows > 0) {
                    $data = [];
                    while ($row = $result->fetch_assoc()) {
                        $data[] = $row;
                    }
                    return $data;
                }
            }
            return 0;
        }
    }
 ?>