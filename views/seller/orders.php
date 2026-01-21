<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'seller') {
    header("Location: ../auth/login.php");
    exit();
}
<link rel="stylesheet" href="../css/style.css">


require_once "../../models/dbConnect.php";

$conn = dbConnect();
$sellerId = $_SESSION['id'];

/*
 We match seller products by seller_id
*/
$query = "
SELECT 
    o.id AS order_id,
    o.total_amount,
    o.address,
    o.created_at,
    oi.product_name,
    oi.price,
    oi.quantity
FROM orders o
JOIN order_items oi ON o.id = oi.order_id
JOIN products p ON p.name = oi.product_name
WHERE p.seller_id = '$sellerId'
ORDER BY o.created_at DESC
";

$res = mysqli_query($conn, $query);
?>

<!doctype html>
<html>
<head>
    <title>Seller Orders</title>
</head>
<body>
  
    
    <header class="site-header">
        <div class="header-container">
            <div class="logo-section">
                <a href="dashboard.php" class="logo-link">
                    <img src="../../assets/images/logo.png" alt="Logo" class="logo-img">
                    <span class="site-name">SELLER PANEL</span>
                </a>
            </div>
            
            <div class="header-buttons">
                <a href="dashboard.php" class="btn-header btn-login">Dashboard</a>
                <a href="add_product.php" class="btn-header btn-signup">Add Product</a>
                <a href="manage_products.php" class="btn-header btn-login">Manage Products</a>
                <a href="orders.php" class="btn-header btn-login">Orders</a>
                <a href="../auth/logout.php" class="btn-header btn-logout">Logout</a>
            </div>
        </div>
    </header>

   

<h2>Orders Containing Your Products</h2>

<table border="1" cellpadding="8">
<tr>
    <th>Order ID</th>
    <th>Product</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Total Order</th>
    <th>Delivery Address</th>
    <th>Date</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($res)): ?>
<tr>
    <td><?= $row['order_id'] ?></td>
    <td><?= htmlspecialchars($row['product_name']) ?></td>
    <td><?= $row['price'] ?> Tk</td>
    <td><?= $row['quantity'] ?></td>
    <td><?= $row['total_amount'] ?> Tk</td>
    <td><?= htmlspecialchars($row['address']) ?></td>
    <td><?= $row['created_at'] ?></td>
</tr>
<?php endwhile; ?>

</table>

<br>
<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>
