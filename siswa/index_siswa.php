<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SI TK Nikma</title>
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

  <!-- =======================================================
  * Template Name: eStartup - v2.2.0
  * Template URL: https://bootstrapmade.com/estartup-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<body>
  <div id="wrapper" style="margin-top: 50px ">
	<center/>
	<h2>DATA SISWA</h2>
	<br/>
	<a href="../login/home.php">+ KEMBALI</a>
	<br>
	<a href="tambah_siswa.php">+ TAMBAH SISWA</a>
	<br/>
	<br/>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>NO INDUK SISWA</th>
			<th>Nama SISWA</th>
			<th>JK</th>
			<th>TANGGAL LAHIR</th>
			<th>TANGGAL MASUK</th>
			<th>TANGGAL KELUAR</th>
			<th>ALAMAT</th>
			<th>ANAK KE</th>
			<th>NIK WALMUR</th>
			<th>OPSI</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$query = "SELECT si.noinduk_siswa, si.nama_siswa, si.jk, si.tgl_lahir, si.tgl_masuk, si.tgl_lulus, si.alamat, si.anakke, si.NIK_walmur, si.status FROM siswa si JOIN walimurid w ON si.NIK_walmur = w.NIK_walmur";
		$data = mysqli_query($koneksi, $query);
		while($d = mysqli_fetch_array($data)){
			if ($d['status'] == 0){

						?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['noinduk_siswa']; ?></td>
				<td><?php echo $d['nama_siswa']; ?></td>
				<td><?php echo $d['jk']; ?></td>
				<td><?php echo $d['tgl_lahir']; ?></td>
				<td><?php echo $d['tgl_masuk']; ?></td>
				<td><?php echo $d['tgl_lulus']; ?></td>
				<td><?php echo $d['alamat']; ?></td>
				<td><?php echo $d['anakke']; ?></td>
				<?php
					$datawalmur=mysqli_query($koneksi, "SELECT * FROM walimurid where NIK_walmur ='$d[NIK_walmur]'");
					$d2 = mysqli_fetch_array($datawalmur);
				?>
				<td><?php echo $d2['nama_walmur']; ?></td>
				<td>
					<a href="edit_siswa.php?noinduk_siswa=<?php echo $d['noinduk_siswa']; ?>" class="btn-info">EDIT</a>
					<!-- <a href="hapus_siswa.php?noinduk_siswa=<?php echo $d['noinduk_siswa']; ?>">HAPUS</a> -->
					<a href="hide_siswa.php?noinduk_siswa=<?php echo $d['noinduk_siswa']; ?>" onclick="return confirm('apakah anda yakin untuk menyembunyikan')" class="btn-info">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		}
		?>
	</table>
</body>
</html>