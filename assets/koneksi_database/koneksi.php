<?php
$koneksi = mysqli_connect("localhost", "root", "", "perpus_cyber");

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
