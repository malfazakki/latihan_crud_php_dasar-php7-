<?php

include('koneksi.php');

$id = $_GET['id'];

$query = mysqli_query($connect, "DELETE FROM karyawan WHERE id='$id'");

if ($query) {
    header("Location: list.php");
} else {
    echo "Gagal Hapus Data";
}
