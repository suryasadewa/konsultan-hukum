<?php
include_once 'koneksi.php';

// Tambah data
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $subjek = $_POST['subjek'];
    $wa = $_POST['wa'];
    $pesan = $_POST['pesan'];

    $sql = "INSERT INTO konsultasi (nama, email, subjek, wa, pesan) VALUES ('$nama', '$email', '$subjek', '$wa', '$pesan')";
    mysqli_query($conn, $sql);
}

// Hapus data
if (isset($_GET['hapus'])) {
    $nama = $_GET['hapus'];

    $sql = "DELETE FROM konsultasi WHERE nama='$nama'";
    mysqli_query($conn, $sql);
}

// Ambil data
$sql = "SELECT * FROM konsultasi";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Konsultasi</title>
</head>

<body>
    <h2>Data Konsultasi</h2>
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="subjek" placeholder="Subjek">
        <input type="text" name="wa" placeholder="Nomor WhatsApp">
        <textarea name="pesan" placeholder="Pesan"></textarea>
        <button type="submit" name="tambah">Tambah</button>
    </form>
    <br>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Subjek</th>
            <th>Nomor WhatsApp</th>
            <th>Pesan</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['subjek']; ?></td>
            <td><?php echo $row['wa']; ?></td>
            <td><?php echo $row['pesan']; ?></td>
            <td>
                <a href="edit.php?nama=<?php echo $row['nama']; ?>">Edit</a>
                <a href="index.php?hapus=<?php echo $row['nama']; ?>"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>

</html>