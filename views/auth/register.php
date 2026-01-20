<?php session_start(); ?>
<h2>Register</h2>
<form action="../../controllers/authController.php" method="POST">
    <input type="text" name="name" placeholder="Full Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <label>Register As:</label><br>
    <input type="radio" name="role" value="customer" checked onclick="toggleSeller(false)"> Customer
    <input type="radio" name="role" value="seller" onclick="toggleSeller(true)"> Seller
    <br><br>
    <div id="sellerFields" style="display:none;">
        <input type="text" name="shop_name" placeholder="Shop Name"><br>
        <input type="text" name="shop_address" placeholder="Shop Address"><br>
    </div>
    <button type="submit" name="register">Register</button>
</form>
<script>
function toggleSeller(show){
    document.getElementById("sellerFields").style.display = show ? "block" : "none";
}
</script>