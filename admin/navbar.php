<?php 
    session_start(); 
    if(!(isset($_SESSION["Email"]))) header("location:index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');

        nav {       
            height: 12vh;
            padding: 0 25px;

            display: flex;
            flex-direction: row; 
            justify-content: space-between;           
            align-items: center;

            background: #545540;  
            color: white;          
        }

        nav a,
        button {
            font: inherit;
            color: white;
        }

        nav a {
            text-decoration: none;
        }

        nav button {
            background: transparent;
            border: none;
        }

        .shop-name {
            font-family: "Montserrat", sans-serif;
            font-size: 30px; 
        }

        .nav a:hover {
            color: #C2C2C0;
        }

        .left button {
            margin-right: 20px;
        }
        
    </style> 
</head>

<body>
    <nav>
        <div class="left">
            <button class="shop-name"><a href="../index.php">Re-zone</a></button>           
            <button class="nav products"><a href="ds_sanpham.php?">Sản phẩm</a></button>  
            <button class="nav customers"><a href="ds_khachhang.php">Khách hàng</a></button>  
        </div>    

        <div class="right">
            <?php if(isset($_SESSION["Name"])) {
                ?>
                <span>Hi <?php echo $_SESSION["Name"]; ?> | </span>
                <?php
            } ?>  

            <button class="nav logout"><a href="logout.php">Logout</a></button>    
        </div>           
    </nav>    
</body>
</html>