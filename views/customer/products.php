<?php
session_start();
require_once '../../models/productModel.php';
$products = getApprovedProducts();
?>
<!doctype html>
<html>
<head>
    <title>Products - Nirjhor</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <header class="site-header">
        <div class="header-container">
            <div class="logo-section">
                <a href="products.php" class="logo-link">
                    <img src="../../assets/images/logo.png" alt="Logo" class="logo-img">
                    <span class="site-name">NIRJHOR</span>
                </a>
            </div>
            
            <div class="header-buttons">
                <?php if(isset($_SESSION['id'])): ?>
                    <a href="products.php" class="btn-header btn-login">Products</a>
                    <?php if($_SESSION['role'] == 'customer'): ?>
                        <a href="cart.php" class="btn-header btn-login">Cart</a>
                        <a href="orders.php" class="btn-header btn-login">Orders</a>
                    <?php endif; ?>
                    <?php if($_SESSION['role'] == 'seller'): ?>
                        <a href="../seller/dashboard.php" class="btn-header btn-login">Dashboard</a>
                    <?php endif; ?>
                    <?php if($_SESSION['role'] == 'admin'): ?>
                        <a href="../admin/dashboard.php" class="btn-header btn-login">Dashboard</a>
                    <?php endif; ?>
                    <a href="../auth/logout.php" class="btn-header btn-logout">Logout</a>
                <?php else: ?>
                    <a href="../auth/login.php" class="btn-header btn-login">Login</a>
                    <a href="../auth/register.php" class="btn-header btn-signup">Sign Up</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <h2>Our Products</h2>
    <div class="products">
        <?php foreach($products as $p): ?>
            <div class="product-card">
                <img src="<?= $p['image'] ?>" width="150" alt="<?= $p['name'] ?>">
                <b><?= $p['name'] ?></b><br>
                Price <?= $p['price'] ?> Tk<br><br>
                <a href="../../controllers/cartController.php?add=<?= $p['product_id'] ?>">Add to Cart</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
<?php include __DIR__ . '/../layout/footer.php'; ?>
