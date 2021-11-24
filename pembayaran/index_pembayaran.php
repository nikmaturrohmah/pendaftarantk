<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>index pembayaran</title>
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
	<center/><h2>DATA PEMBAYARAN</h2>
	<br/>
	<a href="../login/home.php">+ KEMBALI</a>
	<br>
	<a href="tambah_pembayaran.php">+ TAMBAH PEMBAYARAN</a>
	<br/>
	<br/>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>NO BAYAR</th>
			<th>TANGGAL PENDAFTARAN</th>
			<th>TANGGAL BAYAR</th>
			<th>JUMLAH BAYAR</th>
			<th>NO SISWA</th>
			<th>ID JENIS</th>
			<th>OPSI</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$query = "SELECT si.no_bayar, si.tgl_pendaftaran, si.tgl_bayar, si.jumlah_bayar, si.noinduk_siswa, si.id_jenis, si.status FROM pembayaran si JOIN siswa m ON si.noinduk_siswa = m.noinduk_siswa JOIN jenis_pembayaran jp  ON si.id_jenis = jp.id_jenis";
		$data = mysqli_query($koneksi, $query);
		while($d = mysqli_fetch_array($data)){
			if ($d['status'] == 0){

						?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['no_bayar']; ?></td>
				<td><?php echo $d['tgl_pendaftaran']; ?></td>
				<td><?php echo $d['tgl_bayar']; ?></td>
				<td><?php echo $d['jumlah_bayar']; ?></td>
				<?php
					$datamurid=mysqli_query($koneksi, "SELECT * FROM siswa where noinduk_siswa ='$d[noinduk_siswa]'");
					$d2 = mysqli_fetch_array($datamurid);
				?>
				<td><?php echo $d2['nama_siswa']; ?></td>
				<?php
					$datapembayaran=mysqli_query($koneksi, "SELECT * FROM jenis_pembayaran where id_jenis ='$d[id_jenis]'");
					$d2 = mysqli_fetch_array($datapembayaran);
				?>
				<td><?php echo $d2['nama_jenis']; ?></td>
				<td>
					<a href="edit_pembayaran.php?no_bayar=<?php echo $d['no_bayar']; ?>" class="btn-info">EDIT</a>
					<!-- <a href="hapus_siswa.php?noinduk_siswa=<?php echo $d['noinduk_siswa']; ?>">HAPUS</a> -->
					<a href="hide_pembayaran.php?no_bayar=<?php echo $d['no_bayar']; ?>" onclick="return confirm('apakah anda yakin untuk menyembunyikan')" class="btn-info">HAPUS</a>
				</td>
			</tr>
			<?php 
		}
		}
		?>
	</table>
</body>
</html>