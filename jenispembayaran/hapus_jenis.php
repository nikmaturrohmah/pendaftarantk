<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$id_jenis = $_GET['id_jenis'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from walimurid where id_jenis='$id_jenis'");
 
// mengalihkan halaman kembali ke index.php
header("location:index_jenis.php");
 
?>