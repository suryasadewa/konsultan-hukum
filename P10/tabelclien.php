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
    $id = $_GET['hapus'];

    $sql = "DELETE FROM konsultasi WHERE id=$id";
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
    <title>CRUD Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    h2 {
        text-align: center;
        margin-top: 20px;
        color: #333;
    }

    form {
        text-align: center;
        margin-bottom: 20px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    button {
        background-color: #4caf50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    .content {
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 1200px;
        /* Change max-width as needed */
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        max-width: 100%;
        /* Make the table width 100% */
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4caf50;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    .action-links {
        display: flex;
        justify-content: center;
    }

    .action-links a {
        margin: 0 5px;
        padding: 5px 10px;
        border-radius: 5px;
        text-decoration: none;
        color: #fff;
    }

    .action-links a.edit {
        background-color: #2196f3;
    }

    .action-links a.delete {
        background-color: #f44336;
    }

    .pesan {
        max-width: 400px;
        /* Set maximum width as needed */
        overflow-wrap: break-word;
        /* Enable text wrapping */
    }
    </style>
</head>

<body>
    <h2>Data Client</h2>
    <div class="content">
        <form method="POST">
            <input type="text" name="nama" placeholder="Nama" required>
            <br>
            <input type="text" name="email" placeholder="Email" required>
            <br>
            <input type="text" name="subjek" placeholder="Subjek" required>
            <br>
            <input type="text" name="wa" placeholder="Nomor WhatsApp" required>
            <br>
            <textarea name="pesan" placeholder="Pesan" required></textarea>
            <br>
            <button type="submit" name="tambah">Tambah Data</button>
        </form>

        <table>
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
                <td class="pesan"><?php echo $row['pesan']; ?></td> <!-- Add the 'pesan' class here -->
                <td class="action-links">
                    <a href="edit.php?id=<?php echo $row['nama']; ?>" class="edit">Edit</a>
                    <a href="index.php?hapus=<?php echo $row['nama']; ?>" class="delete"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
        <a href="dashboard.html" class="btn"><i class="fas fa-sign-out-alt"></i><span>Keluar</span></a>
    </div>
</body>

</html>