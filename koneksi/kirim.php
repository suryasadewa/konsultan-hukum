<?php
include("konek.php");    

// Check if all required fields are set
if(isset($_POST['nama'], $_POST['email'], $_POST['wa'], $_POST['subjek'], $_POST['pesan'])) {
    // Get values from POST
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $wa = $_POST['wa'];
    $subjek = $_POST['subjek'];
    $pesan = $_POST['pesan'];

    // Insert data into the database
    $tambah = mysqli_query($conn, 'INSERT INTO konsultasi (nama, email, wa, subjek, pesan) 
    VALUES ("' . $nama . '","' . $email . '","' . $wa . '","' . $subjek . '","' . $pesan . '")') 
    or die(mysqli_error($conn));

    echo "PESAN ANDA SEGERA KAMI TANGANI. ";
    echo '<a href="../index.html">Kembali ke home</a>';
} else {
    echo "One or more fields are missing.";
}
?>