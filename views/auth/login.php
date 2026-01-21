<?php
?>

<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href ="../css/style.css">
    </head>
<body>
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

    
    

    <form action="../../controllers/authController.php" method="POST">
        User Id:
        <input type="text" name="id" placeholder="Input Id"><br>
        <span name="idErr"><?php if(isset($_GET["idErr"])){echo $_GET["idErr"];}?></span><br>
        Password:
        <input type="password" name="password"placeholder="Input password"><br>
        <span name="passErr"><?php if(isset($_GET["passErr"])){echo $_GET["passErr"];}?></span><br>
        <input type="submit" name="submit" value="submit">

    </form>
    <span name="genErr"><?php if(isset($_GET["genErr"])){echo $_GET["genErr"];}?></span>
</body>
</html>
