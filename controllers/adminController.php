<?php
session_start();
require_once("../models/userModel.php");

if(isset($_GET['approve'])){
    approveSeller($_GET['approve']);
    header("Location: ../views/admin/manage_users.php");
}
?>