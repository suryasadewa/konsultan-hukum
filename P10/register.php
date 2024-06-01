<?php
require 'koneksi.php';
$fullname = $_POST["fullname"];
$username = $_POST["username"];
$alamat = $_POST["alamat"];
$email = $_POST["email"];
$sandi = $_POST["sandi"];

$query_sql = "INSERT INTO tbl_regad (fullname, username, alamat, email, sandi) 
            VALUES ('$fullname', '$username', '$alamat', '$email', '$sandi')";

if (mysqli_query($conn, $query_sql)) {
    header("Location: index.html");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}