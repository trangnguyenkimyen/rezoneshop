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

        <title>Cập nhật khách hàng</title>
        
    </head>
    <body>
        <?php
            require_once "../config.php";
            if(isset ($_GET["id"])){
                $id = $_GET["id"];
                $sql = "select * from user_info where id = '$id'";
                $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
        
        ?>
        <form action="capnhat_khachhang.php" method="post">
            <h2> Cập nhật thông tin khách hàng </h2>

            <div class="form-group">
                User_name <br>
                <input type="text" value="<?php echo $row['user_name'];?>" name="user_name"><br>
            </div>

            <div class="form-group">
                Email <br>
                <input type="email" value="<?php echo $row['email'];?>" name = "email"> <br>
            </div>

            <div class="form-group">
                Password <br>
                <input type="text" value="<?php echo $row['password'];?>" name = "pw"> <br>
            </div>

            <div class="form-group">
                Phone_numb <br>
                <input type="text" value="<?php echo $row['phone_numb'];?>" name = "phone_numb"> <br>
            </div>

            <div class="form-group">
                Address <br>
                <input type="text" value="<?php echo $row['address'];?>" name = "address"> <br>
            </div>

            <input type="hidden" value="<?php echo $row['id'];?>" name = "id">

            <input type="submit" value="Lưu" name="capnhat_khachhang" class="button">
            <a href="ds_khachhang.php" class="button exit">Thoát</a>
        </form>
        <?php
            }
        }
        ?>
    </body>
</html>
    <?php
        if(isset($_POST["capnhat_khachhang"])) {
            $id = $_POST["id"];
            $user_name = $_POST["user_name"];
            $email = $_POST["email"];
            $pw = $_POST["pw"];
            $phone_numb = $_POST["phone_numb"];
            $address = $_POST["address"];
            require_once "../config.php";

            $sql = "update user_info set user_name ='$user_name', email ='$email', password ='$pw', phone_numb ='$phone_numb', address ='$address' where id = '$id'";
            $result = mysqli_query($conn, $sql); 
            if($result > 0) {                
                echo "Sửa thành công. Ấn "."<a href='ds_khachhang.php'>vào đây</a>"." để quay lại trang chủ.";
            }   
            else {
                echo "<p class='error'>Error: ". mysqli_error($conn)."</p>";
            }    
            mysqli_close($conn);                    
        }
    ?>