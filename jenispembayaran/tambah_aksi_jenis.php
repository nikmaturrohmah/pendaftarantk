<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id_jenis = $_POST['id_jenis'];
$nama_jenis = $_POST['nama_jenis'];
$status =$_POST['status'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into jenis_pembayaran values('$id_jenis','$nama_jenis','$status')");
 
// mengalihkan halaman kembali ke index.php
header("location:index_jenis.php?pesan=tambah data berhasil");
 
?>