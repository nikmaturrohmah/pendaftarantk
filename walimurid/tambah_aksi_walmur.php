<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$NIK_walmur = $_POST['NIK_walmur'];
$nama_walmur = $_POST['nama_walmur'];
$pekerjaan_walmur = $_POST['pekerjaan_walmur'];
$status =$_POST['status'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into walimurid values('$NIK_walmur','$nama_walmur','$pekerjaan_walmur', '$status')");
 
// mengalihkan halaman kembali ke index.php
header("location:index_walmur.php?pesan=tambah data berhasil");
 
?>