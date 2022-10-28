<!DOCTYPE html>
<html lang="en">

<?php 
    include '../koneksi.php';

    $nama = "SELECT nama_user FROM tbuser";
    $hasil = @mysqli_query($koneksi,$nama) or die(mysqli_error($koneksi));
    $userName = mysqli_fetch_array($hasil);
   

?>

<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>APLIKASI IVENTARIS KANTOR</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='../assets/img/adminicon.ico' />
</head>

<body body background="../gambar/bg.png">
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
                  collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          
          
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="
              ../gambar/admin.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title"><?php echo $userName['nama_user']; ?></div>
              
              <div class="dropdown-divider"></div>
              <a href="../index.html" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="../assets/img/adminicon.ico" class="header-logo" /> <span
                class="logo-name">ADMIN</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="?hal=dashboard" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
 <!-- Main Content --------------------------------------------------------------------------------------------->
            <li class="menu-header">DATA MASTER</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="folder"></i><span>Data Barang</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="?hal=dataBarang">Data Barang</a></li>
                <li><a class="nav-link" href="?hal=dataKategori">Data Kategori</a></li>
              </ul>
            </li> 
<!-- Main Content --------------------------------------------------------------------------------------------->
           <li class="menu-header">DATA LOKASI</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="map-pin"></i><span>Data Lokasi</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="?hal=dataLokasi">Data Lokasi</a></li>
                <li><a class="nav-link" href="?hal=dataKasi">Data Kasi</a></li>
                <li><a class="nav-link" href="?hal=dataPenempatan">Data Penempatan Barang</a></li>
              </ul>
            </li>   
<!-- Main Content --------------------------------------------------------------------------------------------->
            <li class="menu-header">DATA TRANSAKSI</li>
            <li class="dropdown active">
              <a href="?hal=dataPembelianBarang" class="nav-link"><i data-feather="shopping-bag"></i><span>Data Pembelian Barang</span></a>
            </li>
<!-- Main Content --------------------------------------------------------------------------------------------->
            <li class="menu-header">SUPPLIER</li>
            <li class="dropdown active">
              <a href="?hal=dataSuplier" class="nav-link"><i data-feather="box"></i><span>Data Supplier</span></a>
            </li>
<!-- Main Content --------------------------------------------------------------------------------------------->
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <?php

            include "konten.php";

          ?>
          </section>
        </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="https://docs.google.com/document/d/1MhpVVmeaNpyF6NhyrFuKFKRL0p9nYyVge8CzUkV5Qzg/edit?usp=sharing">©pkl-informatika_2018</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="../assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="../assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="../assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="../assets/js/custom.js"></script>


  <script src="../assets/bundles/datatables/datatables.min.js"></script>
  <script src="../assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
  <script src="../assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
  <script src="../assets/bundles/datatables/export-tables/jszip.min.js"></script>
  <script src="../assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
  <script src="../assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
  <script src="../assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
  <script src="../assets/js/page/datatables.js"></script>



</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>