<?php
    require_once "config.php";
    $sql = "DELETE FROM cart
    WHERE id = ?";
    $stmt = mysqli_prepare($conn,$sql);
    $cart_id = $_GET['cart_id'];
    mysqli_stmt_bind_param($stmt,'s',$cart_id);
    mysqli_stmt_execute($stmt);
    //echo "<a href='bag.php'>shopping bag</a>";    
    header('location: bag.php');
    exit();
?>