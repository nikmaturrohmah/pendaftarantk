<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Penambahan Data Siswa</title>
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
	<h2>Pendaftaran Siswa</h2>
	<br/>
	<a href="index_siswa.php"> Kembali </a>
	<br/>
	<br/>
	<h3>Pendaftaran</h3>
	<br/>
	<form method="post" action="tambah_aksi_siswa.php">
		<table>
			<tr>
				<td>No Induk Siswa :  </td>
				<?php
				include 'koneksi.php';
				$query ="SELECT max(noinduk_siswa) as kode FROM siswa";
				$data1 = mysqli_query($koneksi, $query);
				$data2 = mysqli_fetch_array($data1);
				$kodesis = $data2['kode'];
				$urutan = (int) substr($kodesis, 3, 4);
				$urutan = $urutan+1;
				$huruf = "SW";
				$kodesis = $huruf . sprintf("%04s", $urutan)
				?>
				<td><input type="text" name="noinduk_siswa" value="<?php echo $kodesis ?>" readonly="readonly" required>
				
				</td>
			</tr>
			<tr>
				<td>Nama Siswa : </td>
				<td><input type="text" name="nama_siswa"></td>
				<td><input type="hidden" name="status" value="0"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin : </td>
				<td><input type="radio" name="jk" value="L">
					<label for="Laki-Laki"> Laki-Laki</label></td>
				<td><input type="radio" name="jk" value="P">
					<label for="Perempuan"> Perempuan</label></td>
			</tr>
			<tr>
				<td>Tanggal Lahir : </td>
				<td><input type="date" name="tgl_lahir"></td>
			</tr>
			<tr>
				<td>Tanggal Masuk : </td>
				<td><input type="date" name="tgl_masuk"></td>
			</tr>
			<tr>
				<td>Tanggal Lulus : </td>
				<td><input type="date" name="tgl_lulus"></td>
			</tr>
			<tr>
				<td>Alamat : </td>
				<td><input type="text" name="alamat"></td>
			</tr>
			<tr>
				<td>Anak Ke : </td>
				<td><input type="number" name="anakke"></td>
			</tr>
			<tr>
				<td>Walimurid : </td>
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
				<td><input type="submit" value="SIMPAN"></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>