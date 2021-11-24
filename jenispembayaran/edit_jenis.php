<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EDIT DATA WALI MURID</title>
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
	<h2>CRUD DATA JENIS PEMBAYARAN</h2>
	<br/>
	<a href="index_jenis.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>EDIT DATA JENIS PEMBAYARAN</h3>
 	<br/>
	<?php
	include 'koneksi.php';
	$id_jenis = $_GET['id_jenis'];
	$data = mysqli_query($koneksi,"select * from jenis_pembayaran where id_jenis='$id_jenis'");
	while($d = mysqli_fetch_array($data)){
		?>
		<form method="post" action="update_jenis.php">
			<table>
						
					<td>ID JENIS</td>
					<td>
					
						<input type="hidden" name="id_jenis" value="<?php echo $d['id_jenis']; ?>">
					</td>
				</tr> 
				<tr>
					<td>NAMA JENIS PEMBAYARAN</td>
					<td><input type="text" name="nama_jenis" value="<?php echo $d['nama_jenis']; ?>"></td>
					<td><input type="hidden" name="status" value="0"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="SIMPAN"></td>
				</tr>		
			</table>
		</form>
		<?php 
	}
	?>
 
</body>
</html>