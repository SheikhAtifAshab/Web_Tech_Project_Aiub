<?php
session_start();
?>
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
            
                <a href="../auth/logout.php" class="btn-header btn-logout">Logout</a>
            </div>
        </div>
    </header>

</body>

<link rel="stylesheet" href="../css/style.css">

<h2>Seller Dashboard</h2>

<a href="add_product.php">
    <button> Add New product</button>
</a>

<a href="manage_products.php">
    <button>Manage Products</button>
</a>
<a href="../auth/logout.php">
    <button>Logout</button>
</a>