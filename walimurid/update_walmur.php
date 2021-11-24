<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$NIK_walmur = $_POST['NIK_walmur'];
$nama_walmur = $_POST['nama_walmur'];
$pekerjaan_walmur = $_POST['pekerjaan_walmur'];
 
// update data ke database
mysqli_query($koneksi,"update walimurid set nama_walmur='$nama_walmur', pekerjaan_walmur='$pekerjaan_walmur' where NIK_walmur='$NIK_walmur'");
 
// mengalihkan halaman kembali ke index.php
header("location:index_walmur.php?pesan=data berhasil diupdate");
 
?>