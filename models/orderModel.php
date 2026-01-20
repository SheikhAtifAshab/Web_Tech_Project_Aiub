<?php
require_once("dbConnect.php");

function placeOrder($user,$items,$total){
    $conn=dbConnect();
    mysqli_query($conn,"INSERT INTO orders(user_id,total,status) VALUES('$user','$total','pending')");
    $oid=mysqli_insert_id($conn);

    foreach($items as $i){
        mysqli_query($conn,
            "INSERT INTO order_items(order_id,product_id,price)
             VALUES('$oid','{$i['product_id']}','{$i['price']}')");
    }
}
?>