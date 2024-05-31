<?php
require 'koneksi.php';
$email = $_POST["email"];
$sandi = $_POST["sandi"];

$query_sql = "SELECT * FROM tbl_regadm 
            WHERE email = '$email' AND sandi = '$sandi'";

$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
    header("Location: dashboard.html");
} else {
    echo "<center><h1>Email atau Password Anda Salah. Silahkan Coba Login Kembali.</h1>
            <button><strong><a href='index.html'>Login</a></strong></button></center>";
}