<?php

// Connection to the database
include('koneksi.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    // Validate input and insert into the database
    if (!empty($nama) && !empty($alamat) && !empty($umur) && !empty($jenis_kelamin)) {
        $insert = mysqli_query($connect, "INSERT INTO karyawan (nama, alamat, umur, jenis_kelamin) VALUES ('$nama', '$alamat', '$umur', '$jenis_kelamin')");

        if ($insert) {
            header('Location: list.php');
            exit;
        } else {
            echo "Gagal Tambah Data";
        }
    } else {
        echo "Semua kolom harus diisi. <br /><br />";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Add Karyawan</title>
</head>

<body>

    <form action="" method="post">
        <label>Nama</label><br />
        <input type="text" name="nama" />
        <br /><br />

        <label>Alamat</label><br />
        <textarea name="alamat" cols="30" rows="10" /></textarea>
        <br /><br />

        <label>Umur</label><br />
        <input type="number" name="umur" />
        <br /><br />

        <label>Jenis Kelamin</label><br />
        <select name="jenis_kelamin">
            <option value="pria">Pria</option>
            <option value="wanita">Wanita</option>
        </select>

        <br>
        <br>
        <br>

        <button type="submit">Tambah Data</button>
    </form>

    <br><br>

    <a href="list.php">Kembali</a>

</body>

</html>