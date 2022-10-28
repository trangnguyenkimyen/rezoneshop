<?php
    session_start();
    if (isset($_GET["id"])) {
        require_once "config.php";
        if (isset($_SESSION["Email"])) {
            $user_id = $_SESSION["Id"];
            $product_id = $_GET["id"];

            $sql = "insert into cart (user_id, product_id) values ('$user_id', '$product_id')";            
            $result = mysqli_query($conn, $sql);
            if ($result > 0) {
                mysqli_close($conn);                
                header("location: product.php?id=$product_id");
                exit();
            }
        }
        else {
            mysqli_close($conn);            
            header("location: bag.php");
            exit();
        }        
    }
    
?>



