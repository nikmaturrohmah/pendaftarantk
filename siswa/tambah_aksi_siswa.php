<?php
include 'koneksi.php';

$noinduk_siswa = $_POST['noinduk_siswa'];
$nama_siswa = $_POST['nama_siswa'];
$jk = $_POST['jk'];
$tgl_lahir = $_POST['tgl_lahir'];
$tgl_masuk = $_POST['tgl_masuk'];
$tgl_lulus = $_POST['tgl_lulus'];
$alamat = $_POST['alamat'];
$anakke = $_POST['anakke'];
$NIK_walmur = $_POST['NIK_walmur'];
$status =$_POST['status'];

mysqli_query($koneksi,"insert into siswa values('$noinduk_siswa','$nama_siswa','$jk','$tgl_lahir','$tgl_masuk','$tgl_lulus','$alamat','$anakke','$NIK_walmur', '$status')");

header("location:index_siswa.php?pesan=tambah data berhasil");
?>