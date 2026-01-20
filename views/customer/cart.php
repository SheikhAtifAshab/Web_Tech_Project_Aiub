<?php
session_start();
require_once "../../models/cartModel.php";
$items = getCart($_SESSION['id']);
?>

<h2>Your Cart</h2>

<?php foreach($items as $i): ?>
    <?= $i['name'] ?> - <?= $i['price'] ?><br>
<?php endforeach; ?>

<a href="checkout.php"><button>Checkout</button></a>