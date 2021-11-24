<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$no_bayar = $_POST['no_bayar'];
$tgl_pendaftaran = $_POST['tgl_pendaftaran'];
$tgl_bayar = $_POST['tgl_bayar'];
$jumlah_bayar = $_POST['jumlah_bayar'];
$noinduk_siswa = $_POST['noinduk_siswa'];
$id_jenis = $_POST['id_jenis'];
$status =$_POST['status'];
 
// update data ke database
mysqli_query($koneksi,"update pembayaran set no_bayar='$no_bayar', tgl_pendaftaran='$tgl_pendaftaran', tgl_bayar='$tgl_bayar', jumlah_bayar='$jumlah_bayar', noinduk_siswa='$noinduk_siswa', id_jenis='$id_jenis', status='$status' where no_bayar='$no_bayar' ");
 
// mengalihkan halaman kembali ke index.php
header("location:index_pembayaran.php?pesan=data berhasil diupdate");
 
?>