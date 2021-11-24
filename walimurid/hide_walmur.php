<?php
include 'koneksi.php';

$NIK_walmur = $_GET['NIK_walmur'];
$status = 1;

mysqli_query($koneksi, "update walimurid set status='$status' where NIK_walmur='$NIK_walmur'");

header('location:index_walmur.php?pesan=sembuyikan data berhasil');
?>