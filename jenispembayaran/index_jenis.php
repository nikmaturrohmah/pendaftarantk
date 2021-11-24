<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>index walimurid</title>
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
	<h2>DATA JENIS PEMBAYARAN</h2>
	<br/>
	<a href="../login/home.php">+ KEMBALI</a>
	<br>
	<a href="tambah_jenis.php">+ TAMBAH JENIS PEMBAYARAN</a>
	<br/>
	<br/>
	<table border="1">
		<tr>
			<th>NO</th>
			<th>ID JENIS</th>
			<th>NAMA JENIS PEMBAYARAN</th>
			<th>OPSI</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from jenis_pembayaran");
		while($d = mysqli_fetch_array($data)){
			if ($d['status'] == 0){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['id_jenis']; ?></td>
				<td><?php echo $d['nama_jenis']; ?></td>
				
				
				<td>
					<a href="edit_jenis.php?id_jenis=<?php echo $d['id_jenis']; ?>" class="btn-info">EDIT</a>
					<!-- <a href="hapus_walmur.php?NIK_walmur=<?php echo $d['NIK_walmur']; ?>">HAPUS</a> -->
					<a href="hide_jenis.php?id_jenis=<?php echo $d['id_jenis']; ?>" onclick="return confirm('Apakah Anda Yakin Untuk Menyembunyikan')" class="btn-info">HAPUS</a>
				</td>
			</tr>
			<?php 
			}
		}
		?>
	</table>
</body>
</html>