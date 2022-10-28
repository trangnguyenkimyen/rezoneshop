<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link css chung: style.css -->
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.svg" type="image/icon type">
    <title>Bag | Re-zone</title>
    
    <style>
        main{
            width: 100%;           
            
          	flex: 1;
            padding-left: 35px;
            padding-right: 35px;
            padding-bottom: 50px;        
        }   
        
        body {          	
            display: flex;
            flex-direction: column;
        }

        .container{
            padding-top: 25px;
            padding-bottom: 25px;
            font-size: 15px;
            color: inherit;
            font-family: "Montserrat", sans-serif;            
        }
        
        button{
            background: transparent;
            border: none;
        } 
        
        .bag{
            width: 100%;
        }
        
        .shopping {            
            border-top:1px solid #000;
            border-bottom: 1px solid #000;
            width: 100%;
            height: 300px;        
        }

        .td{
            width: 100%;
            height: 250px; 
            margin-top: 25px;
        }
        
        .td-left{
            width: 300px;
            float:left;
        }

        .td-md{
            line-height: 1.5;
        }

        .td-bt{
            margin-top: 145px;            
        }

        .td-right{        
            float:right;
            margin-top: -15px;
        }

        .tt{
            position:absolute;right:180px; 
            margin-top: 30px;
            margin-bottom: 30px;        
        }

        .tt1{
            position:absolute;right:35px; 
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .chk{            
            border: none;
            float:right; 
            
            margin-top: 70px;
            margin-bottom: 50px;  

            cursor: pointer;
            background: black; 
            color: white;            
        }

        img {
            width: 250px;
            height: 250px;
            object-fit: cover;
        }

        .td-bt a {
            text-decoration: underline;
        }

        .center {
            text-align: center;
        }

        .center a {
            text-decoration: underline;
        }

        main a {
            text-decoration: none;
            color: inherit;
        }
        
    </style>
</head>

<body>
    <!-- Navigation bar -->
    <header>      
        <?php require_once("navbar.php"); ?>
        <div class="container">
            <b><center><button>SHOPPING BAG</button></center></b>
        </div>
    </header>           
    
    <!--Conntent -->
    <main>        
        <div class="bag" >            
            <?php
                if (isset($_SESSION["Id"])) {
                    $user_id = $_SESSION["Id"];                          
                    $sql = "SELECT c.id as 'cart_id', p.img, p.product_name, p.id, p.color, p.size, p.price 
                        FROM cart c, product p 
                        WHERE c.product_id = p.id 
                            AND c.user_id = '$user_id'
                            AND c.id NOT IN (SELECT o.cart_id FROM order_items o WHERE o.user_id = c.user_id)";  
                
                    require_once "config.php";
                    $result = mysqli_query($conn, $sql);
                    $amount = 0;
                    if (mysqli_num_rows($result) > 0) {                    
                        while ($row = mysqli_fetch_assoc($result)) {                            
                    ?>                                      

                    <div class="shopping">
                        <div class="td">
                            <div class="td-left">
                                <img src="img/<?php echo $row["img"]; ?>">
                            </div>

                            <div class="td-md">
                                <b><a href="product.php?id=<?php echo $row["id"] ?>"><?php echo $row["product_name"]; ?></a></b>
                                </br>
                                Item: <?php echo $row["id"];?>
                                </br>
                                Color: <?php echo $row["color"];?>
                                </br>
                                Size: <?php echo $row["size"];?>
                                </br>
                            </div>

                            <div class="td-bt"><a onclick="return Del('<?php echo $row['product_name'];?>')" href="delete_bag.php?cart_id=<?php echo $row['cart_id'] ?>">Remove</a> 
                            </div>
                            <b><div class="td-right"><?php echo $row["price"]; ?>$</div></b>
                        </div>                    
                    </div>

                    <?php
                    $amount = $amount+ $row["price"];
                    ?>
    
                    <?php
                        }                   
                    ?>
                
                    <div class="tt"><b>Total</b></div>
                    <b><div class="tt1"> <?= $amount ?>$</div></b>
                    <button class="chk" style="width: 180px; height:45px;">                        
                        <a onclick="return confirm('Do you want to check out ?')" href="order.php?user_id=<?php echo $_SESSION["Id"]; ?>">CHECKOUT</a>  
                    </button> 
            
                <?php                        
                    }
                    else echo "<p class='center'>Your shopping bag is empty.</p>";
                    mysqli_close($conn);  
                } 
                else {
                    echo "<p class='center'>Please login "."<a href='login.php'>here</a>"." before place in cart.</p>";
                }          
                ?>
        </div>
    </main>
    
    <footer>
        <?php require_once("footer.php");?>
    </footer>
</body>
</html>

<script>
    function Del(name){
        return confirm("Do you want to delete the product: "+ name +"?");
    }
</script>   