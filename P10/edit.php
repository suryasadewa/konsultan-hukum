<?php
include_once 'koneksi.php';

if (isset($_GET['nama'])) {
    $nama = $_GET['nama'];

    // Ambil data berdasarkan nama
    $sql = "SELECT * FROM konsultasi WHERE nama = '$nama'";
    $result = mysqli_query($conn, $sql);

    // Periksa apakah data ditemukan
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        $subjek = $row['subjek'];
        $wa = $row['wa'];
        $pesan = $row['pesan'];
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "Nama tidak ditemukan.";
    exit;
}

// Proses jika formulir sudah dikirim
if(isset($_POST['submit'])) {
    // Ambil data yang dikirimkan dari formulir
    $email_baru = $_POST['email'];
    $subjek_baru = $_POST['subjek'];
    $wa_baru = $_POST['wa'];
    $pesan_baru = $_POST['pesan'];

    // Update data di database
    $sql_update = "UPDATE konsultasi SET 
                    email = '$email_baru',
                    subjek = '$subjek_baru',
                    wa = '$wa_baru',
                    pesan = '$pesan_baru'
                    WHERE nama = '$nama'";
    if(mysqli_query($conn, $sql_update)) {
        header("Location: index.php"); // Redirect ke halaman utama setelah berhasil memperbarui data
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>

<body>
    <h2>Edit Data</h2>
    <form action="" method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br>

        <label for="subjek">Subjek:</label><br>
        <input type="text" id="subjek" name="subjek" value="<?php echo $subjek; ?>"><br>

        <label for="wa">Nomor WhatsApp:</label><br>
        <input type="text" id="wa" name="wa" value="<?php echo $wa; ?>"><br>

        <label for="pesan">Pesan:</label><br>
        <textarea id="pesan" name="pesan"><?php echo $pesan; ?></textarea><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>