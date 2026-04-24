<?php
include 'db.php';
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit();
}

if($_SESSION['user']['role'] != 'admin'){
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);
mysqli_query($conn, "DELETE FROM users WHERE id=$id");
header("Location: index.php?msg1=User+Deleted+Successfully");