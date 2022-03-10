<?php
include 'koneksi.php';

$id = $_GET['id'];
$status   = $_GET['status'];

if ($status == 0) {
    $newStatus = 1;
} else {
    $newStatus = 0;
}

$query  = "UPDATE todo SET status = '$newStatus'";
$query .= "WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($koneksi) .
        " - " . mysqli_error($koneksi));
} else {
    echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
}
