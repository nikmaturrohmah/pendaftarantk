<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EDIT DATA SISWA</title>
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
	<h2>CRUD DATA SISWA</h2>
	<br/>
	<a href="index_siswa.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA SISWA</h3>
 
	<?php
	include 'koneksi.php';
	$noinduk_siswa = $_GET['noinduk_siswa'];
	$data = mysqli_query($koneksi,"select * from siswa where noinduk_siswa='$noinduk_siswa'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update_siswa.php">
			<table>
						
					<td>NO INDUK SISWA</td>
					<td>
					
						<input type="hidden" name="noinduk_siswa" value="<?php echo $d['noinduk_siswa']; ?>">
					</td>
				</tr> 
				<tr>
					<td>NAMA SISWA</td>
					<td><input type="text" name="nama_siswa" value="<?php echo $d['nama_siswa']; ?>"></td>
									<td><input type="hidden" name="status" value="0"></td>
				</tr>
				<tr>
					<td>JENIS KELAMIN</td>
					<td><input type="radio" name="jk" value="L">
						<label for="laki-laki">Laki Laki</label></td>
					<td><input type="radio" name="jk" value="P">
						<label for="peremuan">perempuan</label></td>
				</tr>
				<tr>
					<td>TANGGAL LAHIR</td>
					<td><input type="date" name="tgl_lahir" value="<?php echo $d['tgl_lahir']; ?>"></td>
				</tr>
				<tr>
					<td>TANGGAL MASUK</td>
					<td><input type="date" name="tgl_masuk" value="<?php echo $d['tgl_masuk']; ?>"></td>
				</tr>
				<tr>
					<td>TANGGAL LULUS</td>
					<td><input type="date" name="tgl_lulus" value="<?php echo $d['tgl_lulus']; ?>"></td>
				</tr>
				<tr>
					<td>ALAMAT</td>
					<td><input type="text" name="alamat" value="<?php echo $d['alamat']; ?>"></td>
				</tr>
				<tr>
					<td>ANNAK KE</td>
					<td><input type="text" name="anakke" value="<?php echo $d['anakke']; ?>"></td>
				</tr>
				<tr>
				<td>Walimurid : </td>
				<!-- <td><input type=" " disabled="disabled" name="NIK_walmur" value="<?php echo $d['NIK_walmur'] ?>" ></td> -->
				<!-- <td><input type="text" name="NIK_walmur"></td> -->
				<td>
					<select name="NIK_walmur" required> 
						<option value ="">Pilih Wali Murid</option>
						<?php
						include 'koneksi.php';
						$kat = mysqli_query($koneksi, "SELECT * FROM walimurid");
						?>
						<?php
						while ($hasil_kat = mysqli_fetch_array($kat)){
							echo "<option value='$hasil_kat[NIK_walmur]'> $hasil_kat[nama_walmur] </option>";
						} 
						?>
					</select>
				</td>
			</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="SIMPAN" class="btn-info"></td>
				</tr>		
			</table>
		</form>
		<?php 
	}
	?>
 </div>
</body>
</html>