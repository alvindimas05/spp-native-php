<?php 
include '../koneksi.php';
$nisn = $_POST['nisn'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$id_kelas = $_POST['id_kelas'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$id_spp = ($_POST['id_spp']);

$query = mysqli_query($koneksi, "INSERT INTO siswa (nisn,nis,nama,id_kelas,alamat,no_telp,id_spp) VALUES ('$nisn', '$nis', '$nama', '$id_kelas', '$alamat', '$no_telp', '$id_spp')");
if ($query) {
    header("location:?hal=siswa_data");
} else {
    echo "<script> alert('Tambah Data Gagal'); window.location='?hal=siswa_data';</script>";
}
