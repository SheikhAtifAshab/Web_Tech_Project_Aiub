<?php
session_start();
if ($_SESSION['role'] != 'seller') {
    header("Location: ../auth/login.php");
    exit();
}
require_once "../../models/productModel.php";
$products = getSellerProducts($_SESSION['id']);
?>
<link rel="stylesheet" href="../css/style.css">
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

</body>
<h2>Manage Products</h2>

<table border="1">
<tr>
    <th>Image</th>
    <th>Name</th>
    <th>Price</th>
    <th>Status</th>
    <th>Update</th>
    <th>Delete</th>
</tr>

<?php foreach ($products as $p): ?>
<tr>
    <td><img src="<?= $p['image'] ?>" width="80"></td>
    <td><?= $p['name'] ?></td>
    <td><?= $p['price'] ?></td>
    <td><?= $p['status'] ?></td>

    <td>
        <form action="../../controllers/productController.php" method="POST">
            <input type="hidden" name="product_id" value="<?= $p['product_id'] ?>">
            <input type="text" name="name" value="<?= $p['name'] ?>">
            <input type="text" name="price" value="<?= $p['price'] ?>">
            <input type="text" name="description" value="<?= $p['description'] ?>">
            <button name="updateProduct">Update</button>
        </form>
    </td>

    <td>
        <form action="../../controllers/productController.php" method="POST">
            <input type="hidden" name="product_id" value="<?= $p['product_id'] ?>">
            <button name="deleteProduct">Delete</button>
        </form>
    </td>
</tr>
<?php endforeach; ?>
</table>
<a href="dashboard.php">
    <button type="button">Return to Dashboard</button>
</a>
