<?php
session_start();
require_once "../../models/productModel.php";

$products = getApprovedProducts();
?>

<!doctype html>
<html>
<head>
    <title>Nirjhor</title>
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
                <a href="../auth/login.php" class="btn-header btn-login">Login</a>
                <a href="../auth/register.php" class="btn-header btn-signup">Sign Up</a>
            </div>
        </div>
    </header>

    

<h2>Nirjhor</h2>

<div class="nav">
<?php if (!isset($_SESSION['id'])) { ?>

    <form action="../auth/login.php" method="get">
        <button type="submit">Login</button>
    </form>

    <form action="../auth/register.php" method="get">
        <button type="submit">Sign Up</button>
    </form>

<?php } else { ?>

    <?php if ($_SESSION['role'] === 'customer') { ?>
        <a href="cart.php"><button>Cart</button></a>
    <?php } ?>

    <?php if ($_SESSION['role'] === 'seller') { ?>
        <a href="../seller/dashboard.php"><button>Dashboard</button></a>
    <?php } ?>

    <?php if ($_SESSION['role'] === 'admin') { ?>
        <a href="../admin/dashboard.php"><button>Dashboard</button></a>
    <?php } ?>

    <a href="../auth/logout.php"><button>Logout</button></a>

<?php } ?>
</div>

<div class="products">
<?php foreach ($products as $p): ?>
    <div style="border:1px solid #000; width:200px; padding:10px; margin:10px; display:inline-block;">
        <img src="<?= $p['image'] ?>" width="150"><br>
        <b><?= $p['name'] ?></b><br>
        Price: <?= $p['price'] ?> Tk<br><br>

        <!-- ✅ FIX: product_id -->
        <a href="../../controllers/cartController.php?add=<?= $p['product_id'] ?>">
            Add to Cart
        </a>
    </div>
<?php endforeach; ?>
</div>

</body>
</html>
