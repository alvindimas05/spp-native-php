<?php 
include '../koneksi.php';
$tahun = $_POST['tahun'];
$nominal = $_POST['nominal'];

$query = mysqli_query($koneksi, "INSERT INTO  spp VALUES('', '$tahun', '$nominal')");  
if ($query) {
    header("location:?hal=spp_data");
} else {
    echo "<script> alert('Tambah Data Gagal'); window(location='?hal=spp_data');</script>";
}

?>