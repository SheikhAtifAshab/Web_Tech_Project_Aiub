<?php
session_start();
require_once("../../models/userModel.php");

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

$sellers = getAllSellers();
?>

<!doctype html>
<html>
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    
    <header class="site-header">
        <div class="header-container">
            <div class="logo-section">
                <a href="dashboard.php" class="logo-link">
                    <img src="../../assets/images/logo.png" alt="Logo" class="logo-img">
                    <span class="site-name">ADMIN PANEL</span>
                </a>
            </div>
            
            <div class="header-buttons">
                <a href="dashboard.php" class="btn-header btn-login">Dashboard</a>
                <a href="manage_users.php" class="btn-header btn-login">Users</a>
                <a href="approve_products.php" class="btn-header btn-login">Products</a>
                <a href="reports.php" class="btn-header btn-login">Reports</a>
                <a href="../auth/logout.php" class="btn-header btn-logout">Logout</a>
            </div>
        </div>
    </header>

    <h2>Manage Sellers</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Shop Name</th>
                <th>Shop Address</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sellers as $seller): ?>
            <tr>
                <td><?= $seller['id'] ?></td>
                <td><?= $seller['name'] ?></td>
                <td><?= $seller['email'] ?></td>
                <td><?= $seller['shop_name'] ?></td>
                <td><?= $seller['shop_address'] ?></td>
                <td>
                    <?= $seller['is_approved'] ? 'Approved' : 'Pending' ?>
                </td>
                <td>
                    <?php if ($seller['is_approved'] == 0): ?>
                        <a href="../../controllers/authController.php?approveSeller=<?= $seller['id'] ?>">Approve</a> |
                        <a href="../../controllers/authController.php?denySeller=<?= $seller['id'] ?>">Deny</a>
                    <?php else: ?>
                        <span style="color: green;">✓ Approved</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>
    <a href="dashboard.php" class="btn-header btn-login" style="display:inline-block; margin-top:20px;">Back to Dashboard</a>

</body>
</html>
