<?php
session_start();
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

if($user && md5($password) == $user['password']){
    
    $_SESSION['user'] = $user;

    header("Location: index.php");

}else{
    header("Location: login.php?error=Invalid Email or Password");
}