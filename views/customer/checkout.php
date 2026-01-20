<?php
session_start();
require_once "../../models/cartModel.php";
require_once "../../models/orderModel.php";

$items = getCart($_SESSION['id']);
$total = array_sum(array_column($items,'price'));

placeOrder($_SESSION['id'],$items,$total);
clearCart($_SESSION['id']);

echo "Order placed successfully!";
?>