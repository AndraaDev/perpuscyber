<?php
include '../assets/koneksi_database/koneksi.php';
$query_id = mysqli_query($koneksi, "SELECT id FROM tbl_user");
$data = mysqli_fetch_assoc($query_id);
if (isset($_POST['OK'])) {
    $id = $_POST['id'];
    $nim = htmlspecialchars(strip_tags(trim($_POST['nim'])));
    $time = date("Y-m-d H:i:s");
    $query_update = mysqli_query($koneksi, "UPDATE tbl_user SET jam_keluar='$time' WHERE id='$id'");
    if ($query_update) {
        echo "<script>
        alert('Terimakasih telah mengisi form ini!');
        window.location='../index.php';</script>";
    } else {
        echo "<script> alert('Form gagal terkirim!) history.go(-1);</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Absensi Keluar Pengunjung</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <!-- icon -->
    <link rel="shortcut icon" href="../assets/image/logo.png" type="image/x-icon">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-header text-center">
                <img src="../assets/image/logo.png" alt="logo cyber university" width="130">
            </div>
            <div class="card-body">
                <h5 class="text-center text-bold">Perpustakaan Cyber University</h5>
                <p class="login-box-msg">Absensi keluar</p>

                <form method="post">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Jam..." readonly id="time">
                    </div>
                    <div class="row">
                        <div class="input-group mb-3 col-12">
                            <input type="text" class="form-control" placeholder="Masukkan NIM Kamu:" name="nim" required>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-6">
                            <button type="submit" class="btn btn-outline-primary btn-block" name="OK">OK</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-outline-danger btn-block" onclick="window.onload=true">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <br>
    <p class="mb-1">
        Dibuat dengan ❤ oleh <a href="">Tim IT Cyber University</a>
    </p>
    <!-- jQuery -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
    <script>
        var timeDisplay = document.getElementById("time");

        function refreshTime() {
            var dateString = new Date().toLocaleString("in-IN", {
                timeZone: "Asia/Jakarta"
            });
            var formattedString = dateString.replace(", ", " - ");
            timeDisplay.value = formattedString;
        }
        setInterval(refreshTime, 1000);
    </script>
</body>

</html>