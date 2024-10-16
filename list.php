<?php

include('koneksi.php');

$query;
$result = [];
$search = "";

if ($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['search'])) {
    $search = mysqli_real_escape_string($connect, $_GET['search']);

    if (empty($search)) {
        header('Location: list.php');
        exit();
    }

    $query = mysqli_query($connect, "SELECT * FROM karyawan WHERE nama LIKE '%$search%'");
} else {
    $query = mysqli_query($connect, 'SELECT * FROM karyawan');
}

if ($query) {
    $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
} else {
    echo "Gagal fetching data";
}

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

    <form action="" method="get">
        <input type="text" name="search" placeholder="Search..." value="<?= $search ?>">
        <button type="submit">Search</button>
    </form>

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
                    <a href="delete.php?id=<?= $result['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>

</body>

</html>