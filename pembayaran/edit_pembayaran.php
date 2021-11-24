<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EDIT DATA PEMBAYARAN</title>
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
	<h2>CRUD DATA PEMBAYARAN</h2>
	<br/>
	<a href="index_pembayaran.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA PEMBAYARAN</h3>
 	<br/>
	<?php
	include 'koneksi.php';
	$no_bayar = $_GET['no_bayar'];
	$data = mysqli_query($koneksi,"select * from pembayaran where no_bayar='$no_bayar'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update_pembayaran.php">
			<table>
				<tr>	
					<td>ID PEMBAYARAN</td>
					<td>
					
						<input type="hidden"  name="no_bayar" value="<?php echo $d['no_bayar']; ?>" >
					</td>
				</tr> 
				<tr>	
					<td>TANGGAL PENDAFTARAN</td>
					<td>
					
						<input type="date" name="tgl_pendaftaran" value="<?php echo $d['tgl_pendaftaran']; ?>">
						<td><input type="hidden" name="status" value="0"></td>
					</td>
				</tr> 
				<tr>	
					<td>TANGGAL BAYAR</td>
					<td>
					
						<input type="date" name="tgl_bayar" value="<?php echo $d['tgl_bayar']; ?>">
						<td><input type="hidden" name="status" value="0"></td>
					</td>
				</tr> 
				<tr>	
					<td>JUMLAH BAYAR</td>
					<td>
					
						<input type="number" name="jumlah_bayar" value="<?php echo $d['jumlah_bayar']; ?>">
					</td>
				</tr> 
				<td>NO INDUK SISWA </td>
				<!-- <td><input type="text" name="NIK_walmur"></td> -->
				<td>
					<!-- <input type="text" disabled="disabled" name="noinduk_siswa" value="<?php echo $d['noinduk_siswa'] ?>" > -->
					 <select name="noinduk_siswa" required > 
						<option value ="" >Pilih siswa</option>
						<?php
						include 'koneksi.php';
						$kat = mysqli_query($koneksi, "SELECT * FROM siswa");
						?>
						<?php
						while ($hasil_kat = mysqli_fetch_array($kat)){
							echo "<option value='$hasil_kat[noinduk_siswa]'> $hasil_kat[nama_siswa] </option>";
						} 
						?>
					</select> 
				</td>
				<tr>
				<td>JENIS PEMBAYARAN</td>
				<!-- <td><input type="text" name="NIK_walmur"></td> -->
				<td>
					<!-- <input type="text" disabled="disabled" name="id_jenis" value="<?php echo $d['id_jenis'] ?>" > -->
					<select name="id_jenis" required> 
						<option value ="">Pilih jenis pembayaran</option>
						<?php
						include 'koneksi.php';
						$kat = mysqli_query($koneksi, "SELECT * FROM jenis_pembayaran");
						?>
						<?php
						while ($hasil_kat = mysqli_fetch_array($kat)){
							echo "<option value='$hasil_kat[id_jenis]'> $hasil_kat[nama_jenis] </option>";
						} 
						?>
					</select> 
				</td>
				</tr>
				<tr>
					<td><input type="submit" value="SIMPAN"></td>
				</tr>		
			</table>
		</form>
		<?php 
	}
	?>
 
</body>
</html>