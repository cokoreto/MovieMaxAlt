<?php
session_start();
require 'function.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row) {
    $_SESSION['login'] = $username;
    header("Location: ../Movie page/index.html");
    exit();
} else {
    header("Location: index.html");
    exit();
}
?>


<!-- PASSWORD BELUM HASH  -->