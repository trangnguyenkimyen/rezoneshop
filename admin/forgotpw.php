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
    <title>Admin Forgotten Password | Re-zone</title>
    
    <style>
        main {            
            flex-direction: column;
        }

        .cancel-btn {           
            text-decoration: none;
            padding: 12px 40px;                       
            background: transparent;
            font-size: inherit;          
            border: 1px solid ;
            border-radius: 20px;

            cursor: pointer;           
        }

        .btn-wrapper {
            margin-bottom: 0;
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
        <form action="forgotpw.php" method="post">
            <h2>Forgotten Password</h2>

            <div class="form-group">                
                <input type="email" name="email" placeholder="Email" class="form-control" required autocomplete="off"> <br>
            </div>

            <div class="btn-wrapper">
                <button type="submit" name="submit" class="button">
                    Submit
                </button>
                <a href="index.php" class="cancel-btn">Cancel</a>                                
            </div>                         
        </form> 
        <br>   
        <?php
            if (isset($_POST["submit"])) {
                $email = $_POST["email"];
                $sql = "select * from admin_info where email = '$email'";
                require_once("../config.php");
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $pass = $row["password"];
                    
                    echo "<p>Your password is ".$pass."</p>";                
                }
                else {
                    echo "<p>Invalid email.</p>"; 
                }
                mysqli_close($conn);
            }              
        ?>
    </main>
</body>
</html>

