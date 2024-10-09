<?php


// 4 parameter, host, username, password, dan nama db.
$connect = mysqli_connect('localhost', 'root', '221100', 'latihan_crud');

if (!$connect)
    exit("Gagal koneksi Database...");
