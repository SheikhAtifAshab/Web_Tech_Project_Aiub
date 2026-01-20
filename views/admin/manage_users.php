<?php
session_start();
if($_SESSION['role']!='admin') exit();
require_once "../../models/userModel.php";
$sellers = getPendingSellers();
?>

<h2>Approve Sellers</h2>

<?php foreach($sellers as $s): ?>
    <?= $s['name'] ?> - <?= $s['shop_name'] ?>
    <a href="../../controllers/adminController.php?approve=<?= $s['id'] ?>">Approve</a>
    <br>
<?php endforeach; ?>