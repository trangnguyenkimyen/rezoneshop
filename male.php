<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link css chung: style.css -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_fmale.css">
    <link rel="icon" href="logo.svg" type="image/icon type">
    <title>Male | Re-zone</title>
    
    <style>
        body {
            display: flex;
            flex-direction: column;
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
        $sql = "SELECT* from product";
        ?>
        <?php
            if(isset($_GET["page"])){
                $a=$_GET["page"];
            }
        ?>
        <div class="main_page">
            <?php
                if($a=="main-page"){ 
                    $sql = "SELECT id,img,product_name,price,sex FROM product WHERE sex ='Male';";
                    ?>
                    <!-- top --> 
                    <div class="top_fmale">
                        <img src="img/male_readytowear.png" />
                    </div>
                    <?php 
                }

                if($a=="tops"){
                    $sql = "SELECT id,img,product_name,price,sex FROM product WHERE sex ='Male' and category_name='Tops';";
                    ?>
                    <!-- top --> 
                    <div class="top_fmale">
                        <img src="img/male_tops_top.png" />
                    </div>   
                <?php 
                }

                if($a=="bottoms"){
                    $sql = "SELECT id,img,product_name,price,sex FROM product WHERE sex ='Male' and category_name='Bottoms';";
                    ?>
                    <!-- top --> 
                    <div class="top_fmale">
                        <img src="img/male_bottoms_top.png"/>
                    </div>  
                <?php
                }

                if($a=="suits"){
                    $sql = "SELECT id,img,product_name,price,sex FROM product WHERE sex ='Male' and category_name='Suits';";
                    ?>
                    <!-- top --> 
                    <div class="top_fmale">
                        <img src="img/male_suits_top.png" />
                    </div>
                <?php 
                }

                if($a=="sporty"){
                    $sql = "SELECT id,img,product_name,price,sex FROM product WHERE sex ='Male' and category_name='Sporty';";
                    ?>
                     <!-- top --> 
                     <div class="top_fmale">
                        <img src="img/male_activewear_top.png" />
                    </div>
                <?php 
                }
            ?>      

                <?php
                    require_once "config.php";
                    $result = mysqli_query($conn, $sql);
        
                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="box">
                            <div class="img"> <a href="product.php?id=<?php echo $row["id"] ?>">
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
                    else {
                        echo "0 results";
                    }
                    mysqli_close($conn); 
                
               
                ?>  
                </br>
        </div>

    </main>

    <footer>
        <?php require_once("footer.php");?>
    </footer>
</body>


</html>