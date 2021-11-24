<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$NIK_walmur = $_GET['NIK_walmur'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from walimurid where NIK_walmur='$NIK_walmur'");
 
// mengalihkan halaman kembali ke index.php
header("location:index_walmur.php");
 
?>