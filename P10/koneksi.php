$hostname = 'sql12.freesqldatabase.com';
$database = 'sql12710825';
$username = 'sql12710825';
$password = 'UWGh8qFR6w';
$port = 3306;

// Create connection
$conn = new mysqli($hostname, $username, $password, $database, $port);

if ($conn) {
    echo "";
} else {
    echo "Connection failed: " . mysqli_connect_error();
}
?>
