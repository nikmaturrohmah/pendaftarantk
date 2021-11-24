<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id_jenis = $_POST['id_jenis'];
$nama_jenis = $_POST['nama_jenis'];
 
// update data ke database
mysqli_query($koneksi,"update jenis_pembayaran set nama_jenis='$nama_jenis' where id_jenis='$id_jenis'");
 
// mengalihkan halaman kembali ke index.php
header("location:index_jenis.php?pesan=data berhasil diupdate");
 
?>