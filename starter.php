<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard | Muazijan</title>

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">

<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

<!-- AdminLTE -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">

<style>
body {
  background: #f4f6f9;
}

/* NAVBAR */
.main-header {
  background: linear-gradient(135deg, #4e73df, #224abe);
}
.main-header .nav-link {
  color: white !important;
}

/* SIDEBAR */
.main-sidebar {
  background: #1e1e2f !important;
}
.brand-link {
  background: #151521;
  text-align: center;
}
.brand-text {
  color: #fff !important;
  font-weight: bold;
}

/* MENU */
.nav-sidebar .nav-link {
  color: #c2c7d0;
  border-radius: 8px;
  margin: 5px 10px;
}
.nav-sidebar .nav-link:hover {
  background: #4e73df;
  color: white;
}
.nav-sidebar .nav-link.active {
  background: #4e73df;
  color: white;
}

/* CARD */
.card {
  border-radius: 15px;
  border: none;
  box-shadow: 0 10px 25px rgba(0,0,0,0.1);
  transition: 0.3s;
}
.card:hover {
  transform: translateY(-5px);
}

/* SMALL BOX */
.small-box {
  border-radius: 15px;
}

/* BUTTON */
.card-link {
  padding: 8px 15px;
  background: #4e73df;
  color: white;
  border-radius: 8px;
  text-decoration: none;
}
.card-link:hover {
  background: #224abe;
}
</style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- NAVBAR -->
<nav class="main-header navbar navbar-expand navbar-dark">
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu"><i class="fas fa-bars"></i></a>
</li>
<li class="nav-item d-none d-sm-inline-block">
<a href="#" class="nav-link">Dashboard</a>
</li>
</ul>

<ul class="navbar-nav ml-auto">
<li class="nav-item">
<a href="logout.php" class="nav-link">
<i class="fas fa-sign-out-alt"></i> Logout
</a>
</li>
</ul>
</nav>

<!-- SIDEBAR -->
<aside class="main-sidebar elevation-4">
<a href="#" class="brand-link">
<span class="brand-text">MY PANEL</span>
</a>

<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="info">
<a href="#" class="d-block text-white">
👤 <?php echo $_SESSION['username']; ?>
</a>
</div>
</div>

<nav>
<ul class="nav nav-pills nav-sidebar flex-column">

<li class="nav-item">
<a href="starter.php?page=dashboard" class="nav-link active">
<i class="nav-icon fas fa-home"></i>
<p>Dashboard</p>
</a>
</li>

<li class="nav-item">
<a href="starter.php?page=mapel" class="nav-link">
<i class="nav-icon fas fa-book"></i>
<p>Mata Pelajaran</p>
</a>
</li>

<li class="nav-item">
<a href="starter.php?page=guru" class="nav-link">
<i class="nav-icon fas fa-chalkboard-teacher"></i>
<p>Data Guru</p>
</a>
</li>

<li class="nav-item">
<a href="starter.php?page=siswa" class="nav-link">
<i class="nav-icon fas fa-user-graduate"></i>
<p>Data Siswa</p>
</a>
</li>

<li class="nav-item">
<a href="starter.php?page=kelas" class="nav-link">
<i class="nav-icon fas fa-school"></i>
<p>Data Kelas</p>
</a>
</li>

<li class="nav-item">
<a href="starter.php?page=jadwal" class="nav-link">
<i class="nav-icon fas fa-calendar"></i>
<p>Jadwal</p>
</a>
</li>

<li class="nav-item">
<a href="logout.php" class="nav-link">
<i class="nav-icon fas fa-sign-out-alt"></i>
<p>Logout</p>
</a>
</li>

</ul>
</nav>

</div>
</aside>

<!-- CONTENT -->
<div class="content-wrapper">

<div class="content-header">
<div class="container-fluid">


<div class="content">
<div class="container-fluid">



<!-- KONTEN DINAMIS -->
<div class="card">
<div class="card-body">

<?php
$page = $_GET['page'] ?? 'dashboard';

if (!file_exists("page/$page.php")) {
    echo "<h4>Halaman tidak ditemukan</h4>";
} else {
    include "page/$page.php";
}
?>

</div>
</div>

</div>
</div>

</div>

<!-- FOOTER -->
<footer class="main-footer text-center">
<strong>Copyright &copy; 2026</strong>
</footer>

</div>

<!-- JS -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>