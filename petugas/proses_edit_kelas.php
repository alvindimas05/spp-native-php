<?php 
include '../koneksi.php';

$id_kelas = $_POST['id_kelas'];
$nama_kelas = $_POST['nama_kelas'];
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];

$query = mysqli_query($koneksi, "UPDATE kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas='$id_kelas'");

if ($query) {
    header("location:?hal=kelas_data");
} else {
    echo "<script> alert('Edit Data Gagal'); window(location='?hal=kelas_data');</script>";
}
