<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
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

// update data ke database
mysqli_query($koneksi,"update siswa set nama_siswa='$nama_siswa', jk='$jk', tgl_lahir='$tgl_lahir', tgl_masuk='$tgl_masuk', tgl_lulus='$tgl_lulus', alamat='$alamat', anakke='$anakke', NIK_walmur='$NIK_walmur', status='$status' where noinduk_siswa='$noinduk_siswa' ");
 
// mengalihkan halaman kembali ke index.php
header("location:index_siswa.php?pesan=ubah data berhasil");
 
?>