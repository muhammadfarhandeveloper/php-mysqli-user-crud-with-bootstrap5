<?php
include 'db.php';
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);
mysqli_query($conn, "DELETE FROM users WHERE id=$id");
header("Location: index.php?msg1=User+Deleted+Successfully");
