<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Penambahan Data Pembayaran</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/vendor/modal-video/css/modal-video.min.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
	<div id="wrapper" style="margin-top: 50px ">
	<center/>
	<center/>
	<h2>PEMBAYARAN</h2>
	<br/>
	<a href="index_pembayaran.php"> Kembali </a>
	<br/>
	<br/>
	<h3>Pendaftaran</h3>
	<br/>
	<form method="post" action="tambah_aksi_pembayaran.php">
		<table>
				<tr>
				<td>No Bayar :  </td>
				<td><input type="text" name="no_bayar">
					<input type="hidden" name="status" value="0">
				</td>
			</tr>
			<tr>
				<td>Tanggal Daftar : </td>
				<td><input type="date" name="tgl_pendaftaran"></td>
			</tr>
			<tr>
				<td>Tanggal Bayar : </td>
				<td><input type="date" name="tgl_bayar"></td>
			</tr>
			<tr>
				<td>Jumlah Bayar: </td>
				<td><input type="number" name="jumlah_bayar"></td>
			</tr>
			<!-- <tr>
				<td>TNo Induk Siswa : </td>
				<td><input type="text" name="noinduk_siswa"></td>
			</tr> -->
			<tr>
				<td>No Induk Siswa : </td>
				<!-- <td><input type="text" name="walmur"></td> -->
				<td>
				<select name="noinduk_siswa" required>
					<option value="">Pilih Siswa</option>
					<?php
					include 'koneksi.php';
					$kat = mysqli_query($koneksi, "SELECT * FROM siswa ");
					?>
					<?php
					while ($hasil_kat = mysqli_fetch_array($kat)) {
						echo "<option value='$hasil_kat[noinduk_siswa]'> $hasil_kat[nama_siswa] </option>";
					}
					?>
				</select>
			</td>
			</tr>
			<!-- <tr>
				<td>Jenis Pembayaran : </td>
				<td><input type="text" name="jenis_pembayaran"></td>
			</tr> -->
			<tr>
				<td>Jenis Pembayaran : </td>
				<!-- <td><input type="text" name="walmur"></td> -->
				<td>
				<select name="id_jenis" required>
					<option value="">Pilih Jenis Pembayaran</option>
					<?php
					include 'koneksi.php';
					$kat = mysqli_query($koneksi, "SELECT * FROM jenis_pembayaran ");
					?>
					<?php
					while ($hasil_kat = mysqli_fetch_array($kat)) {
						echo "<option value='$hasil_kat[id_jenis]'> $hasil_kat[nama_jenis] </option>";
					}
					?>
				</select>
			</td>
			</tr>
			
			<tr>
				<td><input type="submit" value="SIMPAN" class="btn-info">
					
				</td>
			</tr>
		</table>
	</form>
</body>
</html>