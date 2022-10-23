<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">    
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
            text-align: center;
            border-collapse: collapse;
            width: 100%;
            border-left: 0.5px solid; 
            border-right: 0.5px solid; 
        }

        tr {
            border-bottom: 0.5px solid;                               
                                           
        }            

        td {
            padding: 5px 0 5px 0;                
        }            

        .action {
            padding-left: 10px;
        }

        .action a {
            margin-left: 10px;
        }

        .img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .header {
            background: #545540;
            color: white;                
        }

        .count {
            color: #bdbdbd;       
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

                        // if (isset($_GET["search"])) {
                        //     $tim = $_GET["tim"];
                        //     $sql.=" where movie_name like '%$tim%'";
                        // }
                        
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

        <a href='them_sanpham.php' class='btn btn-primary' style='margin:10px 0;'><i class='fa fa-plus'></i> Thêm</a>
        
        <table>
            <tr class="header">
                <td>STT</td>
                <td width=20%>Product Name</td>
                <td>Price ($)</td>
                <td>Date Added</td>
                <td>Image</td>
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
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            ?>
            <?php
                $stt = 1;
                while($row = mysqli_fetch_assoc($result)) {
                    
                    echo "<tr>";
                        echo"<td>".$stt++."</td>";
                        echo"<td>".$row["product_name"]."</td>";
                        echo"<td>".$row["price"]."</td>";
                        echo"<td>".$row["date_added"]."</td>";
                        
                        
                        //<img src="img/<?php echo $row['img'];
                    
                        echo"<td><img class='img' src='../img/".$row["img"]."'/></td>";
                        echo"<td>".$row["color"]."</td>";
                        echo"<td>".$row["sex"]."</td>";
                        echo"<td>".$row["category_name"]."</td>";
                        echo"<td>".$row["brand"]."</td>";
                        echo"<td>".$row["season"]."</td>";
                        echo"<td>".$row["size"]."</td>";
                        echo"<td class='action'><a href='capnhat_sanpham.php?id=".$row['id']."'><span class='fa fa-pencil'></span></a>
                                <a href='delete_sanpham.php?id=".$row['id']."'><span class='fa fa-trash'></span></a>";
                    echo "</tr>";
                }
                ?>
            
                <?php
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