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

        nav button {
            background: transparent;
            border: none;
        }

        nav a {
            text-decoration: none;
        }

        .center {
            position: absolute;
            left: 43%;
        }

        .search {
            font-size: inherit;
            color: inherit; 
            background: transparent;      
            border: none;               
            padding-bottom: 10px;         
        }

        .wrapper-search {                        
            display: flex;
            flex-direction: row;

            width: 100%;
            border-bottom: 1px solid #C2C2C0;
        }

        .search:focus {
            outline: none;
        }

        ::placeholder {
            font-size: inherit;
            color: white;
        }

        .btn-search {
            background: transparent;
            border: none;
        }        

        .btn-search:hover {
            cursor: pointer;
        }

        .svg-search {
            width: 20px;
            height: 20px;
            color: white;
        }

        .shop-name {
            font-family: "Montserrat", sans-serif;
            font-size: 30px; 
        }

        .nav a:hover {
            color: #C2C2C0;
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
        
        <div class="center">
            <form action="search.php" method="get">
                <div class="wrapper-search">
                    <input type="text" name="search" class="search" placeholder="Search">
                    <button name="submit" class="btn-search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="svg-search" viewBox="0 0 16 16">
                            <title>Search</title>
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </button>
                </div>  
            </form>
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