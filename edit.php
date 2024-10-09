<?php

include('koneksi.php');

$id = $_GET['id'];

$query = mysqli_query($connect, "SELECT * FROM karyawan WHERE id='$id' LIMIT 1");

$result = mysqli_fetch_all($query, MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    if (!empty($nama) && !empty($umur) && !empty($alamat) && !empty($jenis_kelamin)) {

        $insert = mysqli_query($connect, "UPDATE karyawan SET nama='$nama', alamat='$alamat', umur='$umur', jenis_kelamin='$jenis_kelamin' WHERE id='$id'");

        if ($insert) {
            header('Location: list.php');
            exit;
        } else {
            echo "Gagal Tambah Data <br /><br />";
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
    <title>Edit Data Karyawan</title>
</head>

<body>

    <form action="" method="post">

        <input type="hidden" name="id" value="<?= $result[0]['id'] ?>">

        <label for="nama">Nama</label><br>
        <input type="text" name="nama" id="nama" value="<?= $result[0]['nama'] ?>">

        <br><br>

        <label for="alamat">Alamat</label><br>
        <textarea name="alamat" id="alamat" cols="30" rows="10"><?= $result[0]['alamat'] ?></textarea>

        <br><br>

        <label for="umur">Umur</label><br>
        <input type="number" id="umur" name="umur" value="<?= $result[0]['umur'] ?>">

        <br><br>

        <label for="jenis_kelamin">Jenis Kelamin</label> <br>
        <select name="jenis_kelamin" id="jenis_kelamin">
            <option value="pria" <?= $result[0]['jenis_kelamin'] == 'pria' ? 'selected' : '' ?>> Pria </option>
            <option value="wanita" <?= $result[0]['jenis_kelamin'] == 'wanita' ? 'selected' : '' ?>> Wanita </option>
        </select>

        <br><br>

        <button type="submit">Submit</button>

    </form>

    <br><br>

    <a href="list.php">Kembali</a>

</body>

</html>