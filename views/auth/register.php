<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <title>Register - Nirjhor</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <header class="site-header">
        <div class="header-container">
            <div class="logo-section">
                <a href="../customer/products.php" class="logo-link">
                    <img src="../../assets/images/logo.png" alt="Logo" class="logo-img">
                    <span class="site-name">NIRJHOR</span>
                </a>
            </div>
            
            <div class="header-buttons">
                <a href="login.php" class="btn-header btn-login">Login</a>
                <a href="register.php" class="btn-header btn-signup">Sign Up</a>
            </div>
        </div>
    </header>

    <h2>User Registration</h2>
    <form action="../../controllers/authController.php" method="POST">
        <label>Name</label>
        <input type="text" name="name" placeholder="Enter your name">
        <span name="nameErr"><?php if(isset($_GET['nameErr'])) echo $_GET['nameErr']; ?></span>

        <label>Email</label>
        <input type="email" name="email" placeholder="Enter email">
        <span name="emailErr"><?php if(isset($_GET['emailErr'])) echo $_GET['emailErr']; ?></span>

        <label>Password</label>
        <input type="password" name="password" placeholder="Enter password">
        <span name="passErr"><?php if(isset($_GET['passErr'])) echo $_GET['passErr']; ?></span>

        <label>User Type</label>
        <select name="usertype">
            <option value="customer">Customer</option>
            <option value="seller">Seller</option>
        </select>

        <input type="submit" name="register" value="Register">
    </form>

    <p style="text-align:center;">
        Already have an account? <a href="login.php">Login here</a>
    </p>
</body>
</html>
<?php include __DIR__ . '/../layout/footer.php'; ?>
