<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpus_cyber");

function addData($post)
{
    global $koneksi;
    $time = $_POST['time'];
    $nama = htmlspecialchars(strip_tags(trim($_POST['nama'])));
    $nim = htmlspecialchars(strip_tags(trim($_POST['nim'])));
    $gender = htmlspecialchars(strip_tags(trim($_POST['gender'])));
    $prodi = htmlspecialchars(strip_tags(trim($_POST['prodi'])));
    $tujuan = htmlspecialchars(strip_tags(trim($_POST['tujuan'])));
    $library_plan = htmlspecialchars(strip_tags(trim($_POST['library_plan'])));
    $created_at = date("l,d F Y h:i:s");
    $query = mysqli_query($koneksi, "INSERT INTO tbl_user SET time='$time',nama='$nama',nim='$nim',gender='$gender',prodi='$prodi',tujuan='$tujuan',library_plan='$library_plan','created_at='$created_at'");
    if ($query) {
        echo "<script>
    alert('tambah data berhasil!');
    window.location='user/ucapan_terimakasih.php';
    </script>";
    } else {
        echo "<script>
        alert('tambah data gagal!');
        history.go(-1);
        </script>";
    }
}
