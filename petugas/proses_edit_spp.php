<?php 
include '../koneksi.php';

$id_spp = $_POST['id_spp'];
$tahun = $_POST['tahun'];
$nominal = $_POST['nominal'];

$query = mysqli_query($koneksi, "UPDATE spp SET tahun='$tahun', nominal='$nominal' WHERE id_spp='$id_spp'");

if ($query) {
    header("location:?hal=spp_data");
} else {
    echo "<script> alert('Edit Data Gagal'); window(location='?hal=spp_data');</script>";
}
