<?php
include '../assets/koneksi_database/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ucapan Terimakasih</title>

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
                <img src="../assets/image/image_confirm.svg" alt="img-konfirmasi" width="300">
            </div>
            <div class="card-body">
                <h4 class="text-center text-bold mb-3">Terima Kasih telah mengisi formulir ini!</h4>
                <center>
                    <div class="row mb-1">
                        <div class="col-sm-6"><button class="btn btn-outline-danger" onclick="window.location='../index.php'">Kembali</button></div>
                        <div class="col-sm-6"><button class="btn btn-outline-primary" onclick="window.location='formulir_jamkeluar.php'">Lanjut</button></div>
                    </div>
                </center>
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
</body>

</html>