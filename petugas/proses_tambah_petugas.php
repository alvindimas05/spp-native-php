<?php 
include '../koneksi.php';
$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$query = mysqli_query($koneksi, "INSERT INTO  petugas VALUES('', '$nama_petugas', '$username', '$password', '$level')");  
if ($query) {
    header("location:?hal=petugas_data");
} else {
    echo "<script> alert('Tambah Data Gagal'); window(location='?hal=petugas_data');</script>";
}

?>