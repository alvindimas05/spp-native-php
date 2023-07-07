<?php 
include '../koneksi.php';
$nisn = $_GET['nisn'];

$query = mysqli_query($koneksi, "DELETE FROM siswa WHERE nisn=$nisn");
if ($query) {
    echo '<script>alert("Data Berhasil Dihapus");location.href="?hal=siswa_data";</script>';
} else {
    echo '<script>alert("Data gagal Dihapus");location.href="?hal=siswa_data";</script>';
}
