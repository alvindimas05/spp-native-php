<?php 
include '../koneksi.php';
$id_pembayaran = $_GET['id_pembayaran'];

$query = mysqli_query($koneksi, "DELETE FROM pembayaran WHERE id_pembayaran = '$id_pembayaran'");
if ($query) {
    echo "<script> window.history.go(-1) ;</script>";
} else {
    echo '<script>alert("Data gagal Dihapus"); window.history.go(-1) ;</script>';
}
