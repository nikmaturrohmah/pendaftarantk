

<?php
include 'koneksi.php';

$no_bayar = $_POST['no_bayar'];
$tgl_pendaftaran = $_POST['tgl_pendaftaran'];
$tgl_bayar = $_POST['tgl_bayar'];
$jumlah_bayar = $_POST['jumlah_bayar'];
$noinduk_siswa = $_POST['noinduk_siswa'];
$id_jenis = $_POST['id_jenis'];

$status = $_POST['status'];

mysqli_query($koneksi,"insert into pembayaran values('$no_bayar','$tgl_pendaftaran','$tgl_bayar','$jumlah_bayar','$noinduk_siswa','$id_jenis','$status')");

//header("location:index_pembayaran.php?pesan=tambah data berhasil");
header("location:index_pembayaran.php?pesan=tambah data berhasil");
?>