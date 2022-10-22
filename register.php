<?php
    if(isset($_POST["submit"])) {
        $user_name = $_POST["user_name"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $phone_numb = $_POST["phone_numb"];
        $address = $_POST["address"];

        Câu sql kiểm tra email
        $sql = "select * from user_info where email='$email'";
        require_once("config.php");
        $result = mysqli_query($conn, $sql);
        
        // =================== CÁCH 2 ==================
        // $sql = "select * from user_info where email=?";
        // require_once "config.php";
        // $stmt = mysqli_prepare($conn, $sql);
        // mysqli_stmt_bind_param($stmt, 's', $email);
        // mysqli_stmt_execute($stmt);
        // $result = mysqli_stmt_get_result($stmt);

        // Nếu email không bị trùng thì thêm user mới
        if (mysqli_num_rows($result) == 0) {
            $sql = "insert into user_info (user_name, email, password, phone_numb, address)
            values ('$user_name', '$email', '$pass', '$phone_numb', '$address')
            ";
            require_once("config.php");
            $result = mysqli_query($conn, $sql);

            $sql = "select * from user_info where email='$email' and password='$pass'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {             
                $row = mysqli_fetch_assoc($result);
                session_start();
                $_SESSION["Email"] = $row["email"];
                $_SESSION["Pass"] = $row["password"];                                            
                $_SESSION["User_name"] = $row["user_name"];                                            
            } 
            if(isset($_SESSION["Email"])) {   
                mysqli_close($conn);     
                header("location: index.php");
            }           
        }  
    }         
    else {              
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css_login.css">
    <link rel="icon" href="logo.svg" type="image/icon type">
    <title>Sign Up | Re-zone</title>    
    
    <style>
        main {            
            flex-direction: column;           
        }

        form {
            width: 50%;
        }

        .error {
            color: red;
            margin: 0;
            padding: 0;
            margin-bottom: 20px;
        }

    </style>
</head>

<body>
    <!-- Navigation bar -->
    <header>
        <?php require_once("navbar.php"); ?>
    </header>           
    
    <!-- Conntent -->
    <main>       
        <?php
            if(isset($_POST["submit"])) {
               if (mysqli_num_rows($result) > 0) {
                    echo "<p class='error'>This email address is already associated with an account.</p>";                                 
                }   
            }                    
        ?>        

        <form action="register.php" method="post">
            <h2>Create an Account</h2>

            <div class="form-group">                
                <input type="text" name="user_name" placeholder="User Name" class="form-control" required> <br>
            </div>

            <div class="form-group">                
                <input type="email" name="email" placeholder="Email" class="form-control" required> <br>
            </div>

            <div class="form-group">                
                <input type="password" name="pass" placeholder="Password" class="form-control" required> <br>
            </div>

            <div class="form-group">                
                <input type="text" name="phone_numb" placeholder="Phone Number" class="form-control" required> <br>
            </div>

            <div class="form-group">                
                <input type="text" name="address" placeholder="Address" class="form-control" required> <br>
            </div>
            
            <div class="btn-wrapper">
                <button type="submit" name="submit" class="button">
                    Create Account
                </button>
            </div>            
            
            <center><p>Already have an account? <a href="login.php">Login</a> </p></center>
        </form> 
        <br>
        
    </main>
</body>
</html>

<?php
    }
    ?>

