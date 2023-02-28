<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpus_cyber");

function jam_masuk($post)
{
    global $koneksi;
    date_default_timezone_set("Asia/Jakarta");
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

function jam_keluar($post)
{
    global $koneksi;
    $id = $_POST['id'];
    $nim = htmlspecialchars(strip_tags(trim($_POST['nim'])));
    $updated_at = date("l,d F Y h:i:s");
    $update = mysqli_query($koneksi, "UPDATE tbl_user SET id='$id'.nim='$nim',updated_at='$updated_at' WHERE id='$id'");
    if ($update) {
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

function ceknim($post)
{
    global $koneksi;
    $nim = htmlspecialchars(strip_tags(trim($_POST['nim'])));
    $cek = mysqli_query($koneksi, "SELECT nim FROM tbl_user WHERE nim='$nim'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
        alert('NIM telah ada!');
        history.go(-1);
        </script>";
    } else {
        // return true
    }
}
function cekdata($post)
{
    global $koneksi, $nama, $nim;
    if (!empty($_POST['nama'])) {
        if (strlen($_POST['nama']) > 0 && strlen($_POST['nama']) > 50) {
            echo "<script>
   alert('Nana tidak boleh lebih dari 50!')
   history.go(-1);
   </script>";
            // }elseif (preg_match()) {
            //     # code...
            // }
        }
    }
}
