<?php 
include '../koneksi.php';
$id_kelas = $_GET['id_kelas'];

$query = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas=$id_kelas");
if ($query) {
    echo '<script>alert("Data Berhasil Dihapus");location.href="?hal=kelas_data";</script>';
} else {
    echo '<script>alert("Data gagal Dihapus");location.href="?hal=kelas_data";</script>';
}
