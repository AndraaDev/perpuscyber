<?php
include 'assets/koneksi_database/koneksi.php';
if (isset($_POST['login'])) {
    // cek dulu username nya sudah terdaftar atau belum
    $username = htmlspecialchars(strip_tags($_POST['username']));
    $password = htmlspecialchars($_POST['password']);
    $query = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username'");
    $cek = mysqli_fetch_assoc($query);
    if (hash_equals(hash('sha256', $password), $cek['password'])) {
        session_start();
        $_SESSION['user_id'] = $cek['id'];
        $_SESSION['username'] = $cek['username'];
        $_SESSION['role'] = $cek['role'];
        // validasi 
        if ($cek['role'] == 'admin') {
            echo "<script>
        alert('Login berhasil!');
        window.location='admin/index.php';
         </script>";
        }
    } else {
        echo "<script>
    alert('Password salah!');
    history.go(-1);
    </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan Cyber University | Login Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- icon -->
    <link rel="shortcut icon" href="assets/image/logo.png" type="image/x-icon">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-header text-center">
                <img src="assets/image/logo.png" alt="logo cyber university" width="150">
            </div>
            <div class="card-body">
                <h5 class="text-center text-bold">Perpustakaan Cyber University</h5>
                <p class="login-box-msg">Login terlebih dahulu untuk melanjutkan</p>

                <form autocomplete="off" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username..." name="username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password..." name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-primary btn-block" name="login">Login</button>
                        </div><br><br>
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
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>