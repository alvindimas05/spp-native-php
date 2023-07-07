<?php 
include '../koneksi.php';
$id_petugas = $_GET['id_petugas'];

$query = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas=$id_petugas");
if ($query) {
    echo '<script>alert("Data Berhasil Dihapus");location.href="?hal=petugas_data";</script>';
} else {
    echo '<script>alert("Data gagal Dihapus");location.href="?hal=petugas_data";</script>';
}
