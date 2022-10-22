<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css_product.css">
    <link rel="icon" href="logo.svg" type="image/icon type">
    <title>Search | Re-zone</title>    
    
    <style>
        main {
            padding: 40px 0;
        }

        .search {
            font-size: inherit;
            color: inherit;
            width: 100%;
            border: none;               
            padding-bottom: 10px;         
        }
        
        .wrapper-search:focus-within {  
            border-bottom: 1px solid #545540;
        }

        .search:focus {
            outline: none;
        }

        ::placeholder {
            font-size: inherit;
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
        }

        .svg-search:hover {
            fill: black;
        }

        .search-popular {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .wrapper-search {                        
            margin: 0 auto 40px auto;
            display: flex;
            flex-direction: row;
            width: 40%;
            border-bottom: 1px solid #C2C2C0;
        }

        .suggestion {
            position: relative;                         
            margin-bottom: 20px;  
            margin-right: 20px;    
        }

        .suggestion img, .img-second {            
            width: 280px;
            height: 300px;
            object-fit: cover;
        }

        .suggestion a {
            text-decoration: none;
            color: inherit;           
        }

        .suggestion p {
            margin-top: 20px;         
        }

        .letter-spacing {
            letter-spacing: 1.5px;
            font-size: 13px;
        }

        .img-second {
            background: rgba(169, 169, 169, 0.5);
            display:flex;
            align-items: center;
            justify-content: center;

            position: absolute;            
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;

            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }       
        
        .img-second p {
            font-size: 25px;
            font-weight: bold;
            color: white;
        }

        .suggestion:hover .img-second {
            opacity: 1;
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
            
        <?php
        if(isset($_GET["submit"])) {
            require_once "config.php";            

            if(isset($_GET["search"])) {
                $search = $_GET["search"];            
                $sql = "select * from product where product_name like '%$search%'";
                $count = "select count(*) as 'soluong' from product where product_name like '%$search%'";
                $result = mysqli_query($conn, $sql);
                
                if(mysqli_num_rows($result) == 0) {
                    $sql = "select * from product where color like '%$search%'";  
                    $count = "select count(*) as 'soluong' from product where color like '%$search%'"; 
                    $result = mysqli_query($conn, $sql);

                    if(mysqli_num_rows($result) == 0) {
                        $sql = "select * from product where sex like '$search'";  
                        $count = "select count(*) as 'soluong' from product where sex like '$search'";
                        $result = mysqli_query($conn, $sql);

                        if(mysqli_num_rows($result) == 0) {
                            $sql = "select * from product where category_name like '%$search%'"; 
                            $count = "select count(*) as 'soluong' from product where category_name like '%$search%'";
                            $result = mysqli_query($conn, $sql);   

                            if(mysqli_num_rows($result) == 0) {
                                $sql = "select * from product where brand like '%$search%'";     
                                $count = "select count(*) as 'soluong' from product where brand like '%$search%'";
                                $result = mysqli_query($conn, $sql);   

                                if(mysqli_num_rows($result) == 0) {
                                    $sql = "select * from product where season like '%$search%'";
                                    $count = "select count(*) as 'soluong' from product where season like '%$search%'";
                                    $result = mysqli_query($conn, $sql);      
                                }
                            }
                        }
                    }                    
                } 
                $result_count = mysqli_query($conn, $count);  
                echo "SEARCH: ".$search;                      
            }

            if(isset($_GET["brand"])) {
                $brand = $_GET["brand"];
                
                if($brand == "balenciaga") {
                    $brand = "Balenciaga";
                }
                if($brand == "lv") {
                    $brand = "Louis Vuitton";
                }
                if($brand == "burberry") {
                    $brand = "Burberry";
                }
                if($brand == "dior") {
                    $brand = "Dior";
                }
                if($brand == "dg") {
                    $brand = "DOLCE & GABBANA";
                }
                
                $sql = "select * from product where brand = '$brand'"; 
                $count = "select count(*) as 'soluong' from product where brand = '$brand'";
                $result = mysqli_query($conn, $sql);               
                $result_count = mysqli_query($conn, $count);
                
                echo "BRAND: ".$brand;
            }                         
            
            $row_count = mysqli_fetch_assoc($result_count);

            ?>
            ( <?php  echo $row_count["soluong"]; ?> results ) <br>
            <?php
            
            if(mysqli_num_rows($result) > 0) {                
                while($row = mysqli_fetch_assoc($result)) {     
                    ?>                                                                                                      
                    <div class="box">
                        <div class="img"> <a href="product.php?id= <?php echo $row["id"] ?>">
                            <img src="img/<?php echo $row["img"];?>"/><br/>
                            </a>
                        </div>
                        <div class="p_name">
                            <b><?php echo $row["product_name"];?></b><br/>
                        </div>                              
                    </div>
                <?php                                                       
                }
            }
            
            mysqli_close($conn);
        }
        else {    
        ?>

        <p class="letter-spacing">POPULAR BRANDS</p>
        <div class="search-popular">
            <div class="suggestion">
                <a href="search.php?submit=&brand=balenciaga">
                    <img src="img/search-B.png">
                    <div class="img-second">
                        <p class="letter-spacing">BALENCIAGA</p>
                    </div>                                                
                </a>                    
            </div>

            <div class="suggestion">
                <a href="search.php?submit=&brand=lv">
                    <img src="img/search-LV.jpg">
                    <div class="img-second">
                        <p class="letter-spacing">LOUIS VUITTON</p>
                    </div>                                                
                </a>                    
            </div>
            
            <div class="suggestion">
                <a href="search.php?submit=&brand=burberry">
                    <img src="img/search-burberry.png">
                    <div class="img-second">
                        <p class="letter-spacing">BURBERRY</p>
                    </div>                                                
                </a>                    
            </div>  

            <div class="suggestion">
                <a href="search.php?submit=&brand=dior">
                    <img src="img/search-Dior.jpg">
                    <div class="img-second">
                        <p class="letter-spacing">DIOR</p>
                    </div>                                                
                </a>                    
            </div>

            <div class="suggestion">
                <a href="search.php?submit=&brand=dg">
                    <img src="img/search-DG.jpg">
                    <div class="img-second">
                        <p class="letter-spacing">DOLCE & GABBANA</p>
                    </div>                                                
                </a>                    
            </div>                                              
        </div>  
        
        <?php
            }
        ?>        
    </main>    
</body>
</html>

