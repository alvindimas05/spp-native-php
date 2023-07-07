<?php 
include '../koneksi.php';
$nama_kelas = $_POST['nama_kelas'];
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];

$query = mysqli_query($koneksi, "INSERT INTO  kelas VALUES('', '$nama_kelas', '$kompetensi_keahlian')");  
if ($query) {
    header("location:?hal=kelas_data");
} else {
    echo "<script> alert('Tambah Data Gagal'); window(location='?hal=kelas_data');</script>";
}

?>