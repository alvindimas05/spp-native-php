<?php 
include '../koneksi.php';
$id_petugas = $_POST['id_petugas'];

$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$query = mysqli_query($koneksi, "UPDATE petugas SET nama_petugas='$nama_petugas', username='$username', password='$password', level='$level' WHERE id_petugas='$id_petugas'");

if ($query) {
    header("location:?hal=petugas_data");
} else {
    echo "<script> alert('Edit Data Gagal'); window(location='?hal=petugas_data');</script>";
}
