<?php
    include_once('../config.php');
    if (isset($_REQUEST['id']) and $_REQUEST['id']!="") {
        $id = $_GET['id'];

        $sql = "SELECT * FROM product WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Xóa file ảnh trong thư mục img            
            $file_to_del = "../img/".$row["img"];
            unlink($file_to_del);
        }        

        $sql = "DELETE FROM product WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Xoá thành công! <br>";
            echo "<a href='ds_sanpham.php'>Về trang chính</a>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }
?>


