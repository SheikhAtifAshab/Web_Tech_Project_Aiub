<?php
require_once("dbConnect.php");

function registerUser($name,$email,$password,$role,$shopName,$shopAddress)
{
    $conn = dbConnect();
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $approved = ($role === 'seller') ? 0 : 1;

    return mysqli_query($conn,
        "INSERT INTO users
        (name,email,password,role,shop_name,shop_address,is_approved)
        VALUES
        ('$name','$email','$hash','$role','$shopName','$shopAddress','$approved')");
}

function authUser($email,$password)
{
    $conn = dbConnect();
    $res = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($res);

    if(!$user) return false;

    if($user['role']=='seller' && $user['is_approved']==0)
        return "NOT_APPROVED";

    if(password_verify($password,$user['password']))
        return $user;

    return false;
}

function getPendingSellers()
{
    $conn = dbConnect();
    $res = mysqli_query($conn,"SELECT * FROM users WHERE role='seller' AND is_approved=0");
    return mysqli_fetch_all($res,MYSQLI_ASSOC);
}

function approveSeller($id)
{
    $conn = dbConnect();
    return mysqli_query($conn,"UPDATE users SET is_approved=1 WHERE id='$id'");
}
?>