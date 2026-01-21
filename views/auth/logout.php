<?php
session_start();
session_start();
session_destroy();

header("Location: ../customer/products.php");
exit();
?>
<?php include __DIR__ . '/../layout/footer.php'; ?>
