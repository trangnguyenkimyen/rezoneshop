<?php
    if (isset($_GET["id"])) {   
        require_once "../config.php";                        
        $id = $_GET["id"];
        $sql = "delete from user_info where id = '$id'";
        $result = mysqli_query($conn, $sql);
        
        if ($result > 0) {
            mysqli_close($conn);             
            header("location: ds_khachhang.php");
            exit();
        }
        else {
            echo "Error: ".mysqli_error($conn);
        }        
        mysqli_close($conn);                                                         
    }  
?>