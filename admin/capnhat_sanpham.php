<?php
    if(isset($_POST["sua"])) {
        //xử lý cập nhật dữ liệu vào database
        $id = $_POST["id"];
        $p_name = $_POST["p_name"];
        $price = $_POST["price"];
        $date_added = $_POST["date_added"];
        $first_img = $_POST["first_img"];

        $img = $_FILES['img']['name'];  
        $img_tmp = $_FILES['img']['tmp_name'];
        if ($img == "") {
            $img = $first_img;
        }
        else {
            // Xóa file ảnh ban đầu trong thư mục img            
            $file_to_del = "../img/".$first_img;
            unlink($file_to_del);
            // Thêm file ảnh mới vào thư mục img
            $path = '../img/'.$_FILES['img']['name'];
            move_uploaded_file($img_tmp,$path);
        }                  
      
        $color = $_POST["color"];
        $sex = $_POST["sex"];
        $category_name = $_POST["category_name"];
        $brand = $_POST["brand"];
        $season = $_POST["season"];
        require_once "../config.php";
        $sql = "update product set id = '$id', product_name ='$p_name', price ='$price', date_added = '$date_added', img ='$img', color ='$color', sex='$sex', category_name ='$category_name', brand = '$brand', season ='$season' where id = '$id'";
        if (mysqli_query($conn, $sql) > 0) {
            echo "Cập nhật dữ liệu thành công"."<br/>";
            echo "<a href='ds_sanpham.php'>Về trang chính</a>";
        }
        else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    else {
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_form_them.css">

    <title>Cập nhật sản phẩm</title>
</head>

<html>
    <head></head>
    <body>
        <?php 
         if(isset($_GET["id"])){
            $id = $_GET["id"];
            require_once "../config.php";
            $sql = "select * from product where id='$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result); 
        ?>
        
        <form action="capnhat_sanpham.php" method="post" enctype="multipart/form-data">
            <h2>Cập nhật thông tin sản phẩm</h2>
            
            <div class="form-group">
                Product name <br>
                <input type="text" name="p_name" class="form-control" required value="<?php echo $row['product_name']; ?>"> <br>
            </div>

            <div class="form-group">
                Price <br>
                <input type="text" name="price" class="form-control" required value="<?php echo $row['price']; ?>"> <br>
            </div>

            <div class="form-group">
                Date added <br>
                <input type="date" name="date_added" class="form-control" required value="<?php echo $row['date_added']; ?>"> <br>            
            </div>

            <div class="form-group file">
                Image
                <input style="border: none;" type="file" name="img"> <br>
            </div>
                            
            <div class="form-group">
                Color <br>
                <input type="text" name="color" class="form-control" required value="<?php echo $row['color']; ?>"> <br>
            </div>

            <div class="form-group">
                Brand <br>
                <input type="text" name="brand" class="form-control" required value="<?php echo $row['brand']; ?>"> <br>                
            </div>
                    
            <div class="form-group">
                Category <br>
                <select name="category_name" required>            
                    <option value="Tops" <?php if ($row['category_name'] == "Tops") echo "selected"; ?>>Tops</option>
                    <option value="Bottoms" <?php if ($row['category_name'] == "Bottoms") echo "selected"; ?>>Bottoms</option>
                    <option value="Sporty" <?php if ($row['category_name'] == "Sporty") echo "selected"; ?>>Sporty</option>            
                    <option value="Dresses" <?php if ($row['category_name'] == "Dresses") echo "selected"; ?>>Dresses - Female</option>
                    <option value="Suits" <?php if ($row['category_name'] == "Suits") echo "selected"; ?>>Suits - Male</option>
                </select>                
            </div>            

            <div class="form-group">
                Season <br>
                <select name="season" required>            
                    <option value="Spring" <?php if ($row['season'] == "Spring") echo "selected"; ?>>Spring</option>
                    <option value="Summer" <?php if ($row['season'] == "Summer") echo "selected"; ?>>Summer</option>
                    <option value="Fall" <?php if ($row['season'] == "Fall") echo "selected"; ?>>Fall</option>            
                    <option value="Winter" <?php if ($row['season'] == "Winter") echo "selected"; ?>>Winter</option>                
                </select>
            </div>

            <div class="form-group radio">
                Sex:               
                <input type="radio" id="female" name = "sex" value = "Female" <?php if ($row['sex'] == "Female") echo "checked"; ?> >
                <label for="female">Female</label>               
                <input type="radio" id="male" name = "sex" value = "Male" <?php if ($row['sex'] == "Male") echo "checked"; ?> >                                                    
                <label for="male">Male</label>
                <br>
            </div>

            <div class="form-group radio">
                Size:
                <input type="radio" name = "size" value = "S" <?php if ($row['size'] == "S") echo "checked"; ?>>
                <label>S</label>
                <input type="radio"name = "size" value = "M" <?php if ($row['size'] == "M") echo "checked"; ?>>
                <label>M</label>
                <input type="radio"name = "size" value = "L" <?php if ($row['size'] == "L") echo "checked"; ?>>
                <label>L</label>
                <input type="radio"name = "size" value = "XL" <?php if ($row['size'] == "XL") echo "checked"; ?>>
                <label>XL</label>
                <br>
            </div>

            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="first_img" value="<?php echo $row['img'] ?>">

            <input type="submit" name="sua" value="Lưu" class="button">
            <a href="ds_sanpham.php" class="button exit">Thoát</a>
        </form>
    </body>
</html>
<?php
         } 
        }   
?>