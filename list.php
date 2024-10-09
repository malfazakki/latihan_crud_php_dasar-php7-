<?php

include('koneksi.php');

$query = mysqli_query($connect, 'SELECT * FROM karyawan');

$results = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Karyawan</title>
</head>

<body>

    <a href="add.php">Tambah Data</a>

    <br><br>

    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Umur</th>
            <th>Jenis Kelamin</th>
            <th>Option</th>
        </tr>

        <?php foreach ($results as $result) : ?>
            <tr>
                <td><?= $result['nama'] ?></td>
                <td><?= $result['alamat'] ?></td>
                <td><?= $result['umur'] ?></td>
                <td><?= $result['jenis_kelamin'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $result['id'] ?>">Edit</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>

</body>

</html>