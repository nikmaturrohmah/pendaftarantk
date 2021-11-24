<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>index rekap byr spp</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
	<h2>DATA REKAP SUDAH BAYAR SPP</h2>
	<br/>
	<a href="../login/home.php">+ KEMBALI</a>
	<br>
	<br/>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>ID REKAP SPP</th>
			<th>TGL REKAP</th>
			<th>NO BAYAR</th>
			<th>TANGGAL BAYAR</th>
			<th>JUMLAH BAYAR</th>
			<th>NO INDUK SISWA</th>
			<th>ID JENIS</th>
			<th>STATUS</th>
			<th>CATATAN</th>
		</tr>
		<?php 
		$no = 1;
		include 'koneksi.php';
		$query = mysqli_query($koneksi,"select * from rekapspp");
		while($d = mysqli_fetch_array($query)){

						?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['id_spp']; ?></td>
				<td><?php echo $d['tgl_rekap']; ?></td>
				<td><?php echo $d['no_bayar']; ?></td>
				<td><?php echo $d['tgl_bayar']; ?></td>
				<td><?php echo $d['jumlah_bayar']; ?></td>
				<td><?php echo $d['noinduk_siswa']; ?></td>
				<td><?php echo $d['jenis_pembayaran']; ?></td>
				<td><?php echo $d['STATUS']; ?></td>
				<td><?php echo $d['catatan']; ?></td>
				<!-- <td>
					<a href="edit_siswa.php?noinduk_siswa=<?php echo $d['noinduk_siswa']; ?>">EDIT</a>
					<a href="hapus_siswa.php?noinduk_siswa=<?php echo $d['noinduk_siswa']; ?>">HAPUS</a>
					<a href="hide_siswa.php?noinduk_siswa=<?php echo $d['noinduk_siswa']; ?>" onclick="return confirm('apakah anda yakin untuk menyembunyikan')" class="btn btn-danger">HAPUS</a>
				</td> -->
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>