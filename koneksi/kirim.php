<?php
// Include koneksi database
include("konek.php");

// Memeriksa apakah formulir telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $subjek = $_POST['subjek'];
    $wa = $_POST['wa'];
    $pesan = $_POST['pesan'];

    // Menyimpan data ke database
    $query = "INSERT INTO konsultasi (nama, email, subjek, wa, pesan) VALUES ('$nama', '$email', '$subjek', '$wa', '$pesan')";
    $result = mysqli_query($conn, $query);

    // Memeriksa apakah query berhasil dieksekusi
    if ($result) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>
