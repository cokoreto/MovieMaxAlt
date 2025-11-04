<?php 
require 'function.php';
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

$query_sql = "INSERT INTO tbl_user (email, username, password)
            VALUES('$email', '$username', '$password')";

if (mysqli_query($conn, $query_sql)) {
    header("location: index.html");
} else {
    echo "pendaftaran gagal: ". mysqli_error($conn);
}


?>



<!-- PASSWORD BELUM HASH  -->