<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$noinduk_siswa = $_GET['noinduk_siswa'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from siswa where noinduk_siswa='$noinduk_siswa'");
 
// mengalihkan halaman kembali ke index.php
header("location:index_siswa.php?pesan=data berhasil dihapus");
 
?>