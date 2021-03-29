<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notify Account</title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
            display: flex;
            min-height: 90vh;
            justify-content: center;
            align-items: center;
            background: #eee3e7;
        }

        .wrapper {
            width: 600px;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 40px;
            font-weight: 500;
            border-radius: 5px;
            background-color: #e6e6ea;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        a:hover {
            text-decoration: underline;
            color: red;
        }

        a {
            text-decoration: none;
            font-size: 20px;
            color: #111;
            position: absolute;
            top: 8px;
        }

        .exit {
            left: 10px;
        }

        .login {
            right: 20px;
        }

        a i {
            font-size: 16px;
            margin-right: 5px;
        }

        .fail {
            color: red;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <a href="?controller=NonCustomer&task=register" class="exit"><i class="fas fa-arrow-left"></i>Quay lại</a>
        <a href="?controller=NonCustomer&task=login" class="login">Đăng nhập</a>
        <?php
        if($notify == "success") {
            echo "<span class='success'>Thành công</span>";
        } else {
            echo "<span class='fail'>Thất bại!</span>";
        }
        ?>
    </div>
</body>
</html>