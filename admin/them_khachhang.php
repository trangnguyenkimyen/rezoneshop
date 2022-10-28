<?php 
    session_start(); 
    if(!(isset($_SESSION["Email_Admin"]))) {        
        header("location:index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_form_them.css">
        <link rel="icon" href="../logo.svg" type="image/icon type"> 

        <title>Thêm Khách Hàng</title>
        
        <style>
            .error {
                color: red;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <form action="them_khachhang.php" method="post">
            <h2>Thêm khách hàng</h2>

            <div class="form-group">
                User_name <br>
                <input type="text" name="user_name" class="form-control" required> <br>
            </div>

            <div class="form-group">
                Email <br>
                <input type="email" name="email" class="form-control" required> <br>
            </div>

            <div class="form-group">
                Password <br>
                <input type="text" name="pw" class="form-control" required> <br>
            </div>

            <div class="form-group"> 
                Phone_numb <br>
                <input type="text" name="phone_numb" class="form-control" required> <br>
            </div>

            <div class="form-group">
                Address <br>
                <input type="text" name="address" class="form-control" required> <br>
            </div>

            <input type="submit" value="Lưu" name="them_khachhang" class="button">
            <a href="ds_khachhang.php" class="button exit">Thoát</a>
        </form>
        <br>
    </body>
</html>

<?php
    if(isset($_POST["them_khachhang"]))
    {
        //xử lý cập nhật dữ liệu vào database
 
        $user_name = $_POST["user_name"];
        $email = $_POST["email"];
        $pw = $_POST["pw"];
        $phone_numb = $_POST["phone_numb"];
        $address = $_POST["address"];
        require_once "../config.php";
        
        $sql = "INSERT INTO user_info (user_name, email, password, phone_numb, address)
        values('$user_name', '$email', '$pw', '$phone_numb', '$address')";
        $result = mysqli_query($conn, $sql);
        if ($result > 0) {            
            echo "<center>Thêm thành công. Ấn "."<a href='ds_khachhang.php'>vào đây</a>"." để quay lại trang chủ.</center>"; 
        }     
        else {
            echo "<p class='error'>Error: ". mysqli_error($conn)."</p>";
        }     
        mysqli_close($conn);                  
    }
?>