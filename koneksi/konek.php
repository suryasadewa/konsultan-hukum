<?php
$hostname = 'sql12.freesqldatabase.com';
$database = 'sql12710825';
$username = 'sql12710825';
$password = 'UWGh8qFR6w';
$port = 3306;

// Create connection
$conn = new mysqli($hostname, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>
