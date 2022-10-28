<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="icon" href="../logo.svg" type="image/icon type"> 
    <title>Quản lý sản phẩm</title>
        
    <style>
        body {
            font-family: Helvetica;
            font-size: 15px;
            color: #545540;        
        }

        main {
            padding: 0 10px;
        }   
        
        table {
            width: 100%;
        }

        .list {
            text-align: center;
            border-collapse: collapse;
            border-left: 0.5px solid; 
            border-right: 0.5px solid; 
        }

        .list tr {
            border-bottom: 0.5px solid;                               
                                           
        }            

        .list td {
            padding: 5px 0 5px 0;                
        }            

        .action {
            padding-left: 10px;
        }

        .action a {
            margin-left: 10px;
        }

        .img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .list .header {
            background: #545540;
            color: white;                
        }

        .count {
            color: #bdbdbd;       
        }

        svg {
            color: #545540;
        }
        
    </style>
</head>

<body>
    <header>
        <?php require_once "navbar.php"; ?>
    </header>

    <main>
        <center>
            <h2 style="color: #545540; margin: 10px 0; font-weight: bold">DANH SÁCH SẢN PHẨM</h2>
            <span class="count">          
                (
                    <?php                
                        require_once "../config.php";
                        $sql = "select count(id) as soluong from product";                        
                        $result  = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo $row["soluong"];
                            }
                        }                     
                    ?>  
                    RESULTS
                )                                                                                                                         
            </span>
        </center>     
        
        <table>
            <tr>
                <td style="text-align: left;">
                    <a href='them_sanpham.php' class='btn btn-primary' style='margin:10px 0;'><i class='fa fa-plus'></i> Thêm</a>
                </td>

                <td style="text-align: right;">
                    <form method="get">
                        <input type="text" name="tim" placeholder="Search...">
                        <button type="submit" name="search" style="border: none; background: transparent;">                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <title>Search</title>
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>                      
                    </form>
                </td>
            </tr>
        </table>  

        
        
        <table class="list">
            <tr class="header">
                <td>STT</td>
                <td width=20%>Product Name</td>
                <td>Price ($)</td>
                <td>Date Added</td>
                <td width=10%>Image</td>
                <td>Color</td>
                <td>Sex</td>
                <td>Category</td>
                <td width=10%>Brand</td>
                <td>Season</td>
                <td>Size</td>
                <td></td>
            </tr>
        <?php
            require_once "../config.php";
            $sql = 'select * from product';
            
            if (isset($_GET["search"])) {
                $tim = $_GET["tim"];
                $sql = "select * from product where product_name like '%$tim%'";
            }

            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            ?>
            <?php
                $stt = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo $row["product_name"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><?php echo $row["date_added"]; ?></td>
                        <td><img class="img" src="../img/<?php echo $row["img"]; ?>" ></td>
                        <td><?php echo $row["color"] ?></td>
                        <td><?php echo $row["sex"] ?></td>
                        <td><?php echo $row["category_name"] ?></td>
                        <td><?php echo $row["brand"] ?></td>
                        <td><?php echo $row["season"] ?></td>
                        <td><?php echo $row["size"] ?></td>
                        <td class="action">
                            <a href="capnhat_sanpham.php?id=<?php echo $row['id'] ?>"><span class='fa fa-pencil'></span></a>
                            <a onclick="return confirm('Are you sure you want to delete <?php echo $row['product_name']; ?>?')" href="delete_sanpham.php?id=<?php echo $row['id'] ?>"><span class='fa fa-trash'></span></a>
                        </td>                        
                    </tr>                    
            
                <?php
                }
            }
            else {
                echo "0 results";
            }
            mysqli_close($conn);
            ?>
        </table>
    </main>
</body>
</html> 