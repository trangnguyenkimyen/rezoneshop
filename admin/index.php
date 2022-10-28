<?php
    $error = false;

    if(isset($_POST["login"])) {
        $email = $_POST["email"];
        $pass = $_POST["pass"];

        $sql = "select * from admin_info where email='$email' and password='$pass'";
        require_once("../config.php");
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {             
            $row = mysqli_fetch_assoc($result);
            session_start();
            $_SESSION["Email_Admin"] = $row["email"];
            $_SESSION["Pass"] = $row["password"];                                            
            $_SESSION["Name"] = $row["name"]; 
            
            mysqli_close($conn);                          
            header("location: ds_sanpham.php");   
            exit();         
        }
        else {
            $error = true;
            $reason = "<p class='error'>Invalid email/password.</p>";
        }
        mysqli_close($conn);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css"> 
    <link rel="stylesheet" href="../css_login.css">  
    <link rel="stylesheet" href="css_login_admin.css"> 
    <link rel="icon" href="../logo.svg" type="image/icon type">  
    <title>Admin Login | Re-zone</title>
    
    <style>
        main {           
            flex-direction: column;
        }

        .btn-wrapper {
            margin-bottom: 0;
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
        <p class="shop-name"><a href="../index.php">Re-zone</a></p>
    </header>

    <!-- Conntent -->
    <main>       
        <?php
            if ($error == true) echo $reason;
        ?>

        <form action="index.php" method="post">
            <h2>Admin Login</h2>

            <div class="form-group">                
                <input type="email" name="email" placeholder="Email" class="form-control" required autocomplete="off"> <br>
            </div>

            <div class="form-group">                
                <input type="password" name="pass" placeholder="Password" class="form-control" required autocomplete="off"> <br>
            </div>
            
            <div class="btn-wrapper">
                <button type="submit" name="login" class="button">
                    Login
                </button>                     
                <a href="forgotpw.php" class="forgotpw">Forgot password?</a>                     
            </div>                        
        </form> 
        <br>        
    </main>
</body>
</html>


