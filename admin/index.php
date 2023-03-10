<?php
include '../assets/koneksi_database/koneksi.php';
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>
alert('Anda belum login!');
window.location='../login.php';
</script>";
}

// query untuk ambil data gender
$chart_l = mysqli_query($koneksi, "SELECT count(nama) as jumlah_pengunjung FROM tbl_user WHERE gender='L' GROUP BY MONTH(DATE(time)) ORDER BY jumlah_pengunjung ASC");
$chart_p = mysqli_query($koneksi, "SELECT count(nama) as jumlah_pengunjung FROM tbl_user WHERE gender='P' GROUP BY MONTH(DATE(time)) ORDER BY jumlah_pengunjung ASC");

// query untuk menampilkan total pengunjung,pengunjung terbanyak,dan pengunjung tersedikit
$query_total = mysqli_query($koneksi, "SELECT count(nama) as jumlah_pengunjung FROM tbl_user");
$total = mysqli_fetch_assoc($query_total);

$query_terbanyak = mysqli_query($koneksi, "SELECT count(nama) as pengunjung_terbanyak FROM tbl_user GROUP BY DATE(time) ORDER BY pengunjung_terbanyak DESC LIMIT 0,1");
$pengunjung_t = mysqli_fetch_assoc($query_terbanyak);

$query_tersedikit = mysqli_query($koneksi, "SELECT count(nama) as pengunjung_tersedikit FROM tbl_user GROUP BY DATE(time) ORDER BY pengunjung_tersedikit ASC");
$pengunjung_s = mysqli_fetch_assoc($query_tersedikit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css?v=3.2.0">
    <!-- icon -->
    <link rel="shortcut icon" href="../assets/image/logo.png" type="image/x-icon">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></div>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <div class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="../assets/image/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">Perpustakaan</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../assets/image/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= ucfirst($_SESSION['username']) ?> <span class="right badge badge-success">Online</span></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="index.php" class="nav-link active">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tbl_pengunjung.php" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    Daftar Pengunjung
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link" onclick="return confirm('Apakah anda yakin ingin keluar?')">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Log out
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0">Beranda</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-4">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total pengunjung</span>
                                    <span class="info-box-number">
                                        <?= $total['jumlah_pengunjung'] ?>
                                        <small>orang</small>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-4 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-friends"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Pengunjung Terbanyak</span>
                                    <span class="info-box-number">
                                        <?= $pengunjung_t['pengunjung_terbanyak'] ?>
                                        <small>orang</small>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-4 col-md-4">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-alt"></i></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Pengunjung Tersedikit</span>
                                    <span class="info-box-number">
                                        <?= $pengunjung_s['pengunjung_tersedikit'] ?>
                                        <small>orang</small>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Statistik pengunjung</h5>

                                    <div class="card-tools">
                                        </button>
                                        <div class="btn-group">
                                            <button type="button" class="btn  btn-outline-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                                Download <i class="fas fa-download"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                <a href="" class="dropdown-item"><i class="fas fa-file-pdf"></i> Download As PDF</a>
                                                <a href="#" class="dropdown-item" id="download_jpg" download="statistik_pengunjung.jpg"><i class="fas fa-file-image"></i> Download As JPG</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="card-body">
                                            <div class="chart">
                                                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                        <!-- /.progress-group -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- ./card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Main row -->
                <!-- /.row -->
        </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.js?v=3.2.0"></script>
    <!-- ChartJS -->
    <script src="../assets/plugins/chart.js/Chart.min.js"></script>
    <script>
        // script chart.js untuk menampilkan statistik pengunjung di layar
        var areaChartData = {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                    label: 'Laki-laki',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: true,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [<?php while ($chartL = mysqli_fetch_assoc($chart_l)) {
                                echo $chartL['jumlah_pengunjung'] . ',';
                            } ?>]
                },
                {
                    label: 'Perempuan',
                    backgroundColor: 'rgba(210, 214, 222, 1)',
                    borderColor: 'rgba(210, 214, 222, 1)',
                    pointRadius: false,
                    pointColor: 'rgba(210, 214, 222, 1)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data: [<?php while ($chartP = mysqli_fetch_assoc($chart_p)) {
                                echo $chartP['jumlah_pengunjung'] . ',';
                            } ?>]
                },
            ]
        }

        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })

        // script untuk export chart statistik pengunjung dalam format jpg
        //Download Chart Image
        document.getElementById("download_jpg").addEventListener('click', function() {
            /*Get image of canvas element*/
            var url_base64jp = document.getElementById("barChart").toDataURL("image/jpg");
            /*get download button (tag: <a></a>) */
            var a = document.getElementById("download_jpg");
            /*insert chart image url to download button (tag: <a></a>) */
            a.href = url_base64jp;
        });
    </script>
</body>

</html>