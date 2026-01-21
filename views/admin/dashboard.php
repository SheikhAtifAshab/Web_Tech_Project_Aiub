<?php
session_start();
?>

<h2>Admin Dashboard</h2>
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

</body>

<a href="approve_products.php">
    <button>Manage Requests</button>
</a>

<a href="manage_users.php">
    <button>Manage Users</button>
</a>
<a href="../auth/logout.php">
    <button>Logout</button>
</a>