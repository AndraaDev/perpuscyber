<?php
require '../assets/koneksi_database/koneksi.php';
$id = $_GET['id'];
$query_delete = mysqli_query($koneksi, "DELETE FROM tbl_user WHERE id='$id'");
header("Location:tbl_pengunjung.php");
