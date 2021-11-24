<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TAMBAH DATA WALI MURID</title>
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
	<h2> DATA WALI MURID </h2>
	<br/>
	<a href="index_walmur.php">KEMBALI</a>
	<br/>
	<br/>
	<h3>TAMBAH DATA WALI MURID</h3>
	<br/>
	<form method="post" action="tambah_aksi_walmur.php">
		<table>
			<tr>			
				<td>NIK WALI MURID</td> 	
				<td><input type="text" name="NIK_walmur"  required>
			</tr>
			<tr>
				<td>NAMA WALI MURID</td>
				<td><input type="text" name="nama_walmur"></td>
				<td><input type="hidden" name="status" value="0"></td>
			</tr>
			<tr>
				<td>PEKERJAAN WALI MURID</td>
				<td><input type="text" name="pekerjaan_walmur"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>		
		</table>
	</form>
</body>
</html>