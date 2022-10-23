<?php
    if(isset($_POST["submit"]))
    {
        //xử lý cập nhật dữ liệu vào database
        $product_name = $_POST["product_name"];
        $price = $_POST["price"];
        $date_added = $_POST["date_added"];

        $img = $_FILES["img"]["name"];
        $img_tmp = $_FILES["img"]["tmp_name"];
        // Thêm file ảnh mới vào thư mục img
        $path = '../img/'.$_FILES['img']['name'];
        move_uploaded_file($img_tmp,$path);

        $color = $_POST["color"];
        $sex = $_POST["sex"];
        $category_name = $_POST["category_name"];
        $brand = $_POST["brand"];
        $season = $_POST["season"];
        $size = $_POST["size"];
    
        require_once "../config.php";
        $sql = "INSERT INTO product (product_name, price, date_added, img, color, sex, category_name, brand, season, size)
        values('$product_name', '$price', '$date_added', '$img', '$color', '$sex', '$category_name', '$brand', '$season', '$size')";

        if (mysqli_query($conn, $sql) > 0) {
            echo "Thêm dữ liệu thành công"."<br>";
            echo "<a href='ds_sanpham.php'>Về trang chính</a>";
        }
        else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    else
    {
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_form_them.css">
    
    <title>Thêm sản phẩm</title>

</head>

<body>    
    <form action = "them_sanpham.php" method = "post" enctype="multipart/form-data"> 
        <h2>Thêm sản phẩm </h2>

        <div class="form-group">
            Product name: <br>
            <input type = "text" name = "product_name" required/><br>
        </div>  
        
        <div class="form-group">
            Price:<br>
            <input type = "number" name = "price" required/><br>
        </div>
        
        <div class="form-group">
            Date added: <br>
            <input type ="date" name ="date_added" required/><br>
        </div>

        <div class="form-group file">
            Image:<br>
            <input type ="file" name= "img" required/><br>
        </div>
        
        <div class="form-group">
            Color: <br>
            <input type ="text" name ="color" required/><br>
        </div>
        
        <div class="form-group">
            Brand: <br>
            <input type ="text" name ="brand" required/><br>
        </div>              
        
        <div class="form-group">
            Category: <br>
            <select name="category_name" required>            
                <option value="Tops">Tops</option>
                <option value="Bottoms">Bottoms</option>
                <option value="Sporty">Sporty</option>            
                <option value="Dresses">Dresses - Female</option>
                <option value="Suits">Suits - Male</option>
            </select>
        </div>                
        
        <div class="form-group">
            Season: <br>
            <select name="season" required>            
                <option value="Spring">Spring</option>
                <option value="Summer">Summer</option>
                <option value="Fall">Fall</option>            
                <option value="Winter">Winter</option>                
            </select>      
        </div>

        <div class="form-group radio">
            Sex:
            <input type="radio" name = "sex" value = "Female" checked>
            <label>Female</label>
            <input type="radio"name = "sex" value = "Male">
            <label>Male</label>
            <br>
        </div>  

        <div class="form-group radio">
            Size:
            <input type="radio" name = "size" value = "S" checked>
            <label>S</label>
            <input type="radio"name = "size" value = "M">
            <label>M</label>
            <input type="radio"name = "size" value = "L">
            <label>L</label>
            <input type="radio"name = "size" value = "XL">
            <label>XL</label>
            <br>
        </div>
        
        <input type ="submit" name = "submit" value = "Lưu" class="button"  />
        <a href="ds_sanpham.php" class="button exit">Thoát</a>        
    </form>
</body>
</html>

<?php
    }
?>