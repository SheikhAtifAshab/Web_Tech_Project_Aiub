<?php
session_start();
require_once("../models/userModel.php");

/* REGISTER */
if(isset($_POST['register'])){
    registerUser(
        $_POST['name'],
        $_POST['email'],
        $_POST['password'],
        $_POST['role'],
        $_POST['shop_name'] ?? null,
        $_POST['shop_address'] ?? null
    );
    header("Location: ../views/auth/login.php");
    exit();
}

/* LOGIN */
if(isset($_POST['login'])){
    $user = authUser($_POST['email'],$_POST['password']);

    if($user==="NOT_APPROVED"){
        header("Location: ../views/auth/login.php?err=Seller not approved");
        exit();
    }

    if($user){
        $_SESSION['id']=$user['id'];
        $_SESSION['role']=$user['role'];

        header("Location: ../views/{$user['role']}/dashboard.php");
        exit();
    }
    header("Location: ../views/auth/login.php?err=Invalid login");
}
?>