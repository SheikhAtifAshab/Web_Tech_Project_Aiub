<?php
require_once("dbConnect.php");

function addToCart($user,$product){
    $conn=dbConnect();
    return mysqli_query($conn,
        "INSERT INTO cart(user_id,product_id) VALUES('$user','$product')");
}

function getCart($user){
    $conn=dbConnect();
    $res=mysqli_query($conn,
        "SELECT p.*,c.quantity FROM cart c JOIN products p ON c.product_id=p.product_id WHERE c.user_id='$user'");
    return mysqli_fetch_all($res,MYSQLI_ASSOC);
}

function clearCart($user){
    $conn=dbConnect();
    return mysqli_query($conn,"DELETE FROM cart WHERE user_id='$user'");
}
?>