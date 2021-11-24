<?php 
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['status']!="sudah_login"){
//melakukan pengalihan
header("location:index_login.php");
} 
?>
<!DOCTYPE html>
<html lang="en">

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

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header">
     <div class="container">

      

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="home.php">Home</a></li>
          <li><a href="../siswa/index_siswa.php">Siswa</a></li>
          <li><a href="../walimurid/index_walmur.php">Wali Murid</a></li>
          <li><a href="../jenispembayaran/index_jenis.php">Jenis Pembayaran</a></li>
          <li><a href="../pembayaran/index_pembayaran.php">Pembayaran</a></li>
          <li class="menu-has-children"><a href="">Rekap Siswa</a>
            <ul>
              <li><a href="../rekap/sp_siswa_pindah.php">sp_siswa_pindah</a></li>
              <li><a href="../rekap/sp_siswa_lulus.php">sp_siswa_lulus</a></li>
            </ul>
          </li>
          <li class="menu-has-children"><a href="">Rekap Pembayaran</a>
            <ul>
              <li><a href="../rekap/rekap_spp.php">Rekap SPP</a></li>
              <li><a href="../rekap/rekap_pendaftaran.php">Rekap PENDAFTARAN</a></li>
              <li><a href="../rekap/rekap_pembayaran.php">Rekap Pembayaran</a></li>
            </ul>
          </li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- End Header -->

<section id="hero">
    <div class="hero-container" >
      <h1>Welcome to SI TK NIKMAT</h1>
      <img src="../assets/img/hero-img.png" alt="Hero Imgs" >
     
    </div>
  </section><!-- End Hero Section -->

<!-- <a class ="dropdown-item" href="../siswa/index_siswa.php">Siswa</a>
<br>
<a class ="dropdown-item" href="../walimurid/index_walmur.php">Wali Murid</a>
<br>
<a class ="dropdown-item" href="../jenispembayaran/index_jenis.php">Jenis Pembayaran</a>
<br>
<a class ="dropdown-item" href="../pembayaran/index_pembayaran.php">Pembayaran</a>
<br>
<a class ="dropdown-item" href="../rekap/sp_siswa_pindah.php">sp_siswa_pindah</a>
<br>
<a class ="dropdown-item" href="../rekap/sp_siswa_lulus.php">sp_siswa_lulus</a>
<br>
<a class ="dropdown-item" href="logout.php">Log out</a> -->

</body>
</html>