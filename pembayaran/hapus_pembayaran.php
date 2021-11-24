<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data id yang di kirim dari url
$no_bayar = $_GET['no_bayar'];
 
 
// menghapus data dari database
mysqli_query($koneksi,"delete from pembayaran where no_bayar='$no_bayar'");
 
// mengalihkan halaman kembali ke index.php
header("location:index_siswa.php?pesan=data berhasil dihapus");
 
?>