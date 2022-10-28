<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.svg" type="image/icon type">
    <title>Product | Rezone</title>
    <style> 
        table {
            width: 95%;
        }

        .img_product img{
            width: 650px;
            height: 750px;
            padding: 80px 0px 50px 80px;
            object-fit: cover;
        }

        .product_name{
            font-family:Monospace;
            font-size:28px;
            padding-bottom: 40px:
        }

        .product_color{
            font-family:Monospace;
            font-size:24px;
            padding-top: 10px;
        }

        .product_price{
            font-size: 24px;
            text-align: right;
            width: 100%;
        }

        .product_size{
            font-family:Monospace;
            font-size:24px;
        }

        .line-1{
            height: 2px;
            background: black;
            /* width: 650px;             */
        }

        .info_product{
            width: 100%;
        }

        .right td{
            text-align: right;

        }

        .left td{
            padding-left: 40px;
        }
        main button{
            background-color: black;
            border: none;
            width: 160px;
            height: 40px; 
            margin-top: 20px;   
        }

        main button a{
            text-decoration:none;
        }

        .place_inCart{
            text-decoration: none;
            color: white;
        }

        table tr td{
            padding:0;
            
        }

    </style>
</head>
<body>
    <header>
        <?php require_once("navbar.php");?>
    </header>
    <main>
    <?php
    if(isset($_GET["id"])){
    $id=$_GET["id"];
    $sql="select * from product where id= $id";
    require_once("config.php");
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0){ 
        while($row = mysqli_fetch_assoc($result)) {
    ?>

        <table>
            <tr>
                <td class ="img_product">
                    <img src="img/<?php echo $row['img'] ?>" />
                </td>
                <td class = "info_product"> 
                    <table class="left">
                        <tr>
                            <td>
                                <b class="product_name"><?php echo $row['product_name']?></b></br>
                            
                                <p class="product_color"> Color: <?php echo $row['color'] ?></p></br>
        
                                <p class="product_size"> Size: <?php echo $row['size'] ?></p></br>
                            
                                <div class="line-1"></div></br>
                            </td>
                        </tr>
                        <tr class="right">
                            <td>
                                <b class="product_price">$<?php echo $row['price']?></b></br>                                
                                <button type='button'><a <?php if (isset($_SESSION["Email"])) {?> onclick="return alert('Placing successfully!')" <?php } ?> href='add_to_bag.php?id=<?php echo $row['id']?>'><div class="place_inCart">Place in Cart</div></a></button>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
        <?php
        }
        }
    }
    else echo '0 Result';
        ?>
    </main>

    <footer>
        <?php require_once("footer.php");?>
    </footer>
</body>
</html>
