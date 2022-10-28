<?php
    if (isset($_GET["user_id"])) {
        require_once "config.php";

        $user_id = $_GET["user_id"];
        $sql = "select * from cart where user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cart_id = $row["id"];
                $sql_insert = "insert into order_items (cart_id, user_id) values ('$cart_id', '$user_id')";
                $result_insert = mysqli_query($conn, $sql_insert);                 
            }
            mysqli_close($conn);            
            header("location: bag.php");
            exit();
        } 
        else echo "Error: ". mysqli_error($conn);
        mysqli_close($conn);                      
    }
?>