<?php 
include '../koneksi.php';
$id_spp = $_GET['id_spp'];

$query = mysqli_query($koneksi, "DELETE FROM spp WHERE id_spp=$id_spp");
if ($query) {
    echo '<script>alert("Data Berhasil Dihapus");location.href="?hal=spp_data";</script>';
} else {
    echo '<script>alert("Data gagal Dihapus");location.href="?hal=spp_data";</script>';
}
