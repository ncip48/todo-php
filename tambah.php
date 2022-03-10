<?php
include 'koneksi.php';

$nama   = $_POST['nama'];
$query = "INSERT INTO todo (nama, status) VALUES ('$nama', 0)";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
}
