<?php  
    if (session_start())
        session_destroy();
    if(isset($_POST["login"])) {
        $email = $_POST["email"];
        $pass = $_POST["pass"];

        $sql = "select * from user_info where email='$email' and password='$pass'";
        require_once("config.php");
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
    <title>Login | Re-zone</title>    

    <style>
        main {            
            flex-direction: column;
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
        <?php 
            require_once("navbar.php"); 
        ?>
    </header>           
    
    <!-- Conntent -->
    <main>       
        <?php
            if(isset($_POST["login"])) {
                if (mysqli_num_rows($result) == 0) {
                    echo "<p class='error'>Invalid email/password.</p>"; 
                    mysqli_close($conn);                                
                }   
            }                    
        ?>
        <form action="login.php" method="post">            
            <h2>Login</h2>

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
            
            <center><p>Don't have an account? <a href="register.php">Sign up</a> </p></center>
        </form>         
        <br>
       
    </main>
</body>
</html>






