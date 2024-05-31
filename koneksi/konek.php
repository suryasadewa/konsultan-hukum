<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_gita";

$conn = mysqli_connect($host, $user, $pass, $db);

if ($conn) {
    echo "";
} else {
    echo "Connection failed: " . mysqli_connect_error();
}
?>