<?php 
include '../koneksi.php';
$id_petugas = $_SESSION['id_petugas'];
$nisn = $_POST['nisn'];
$tgl_bayar = $_POST['tgl_bayar'];
$bulan_dibayar = $_POST['bulan_dibayar'];
$tahun_dibayar = $_POST['tahun_dibayar'];
$id_spp = $_POST['id_spp'];
$jumlah_bayar = $_POST['jumlah_bayar'];

$query = mysqli_query($koneksi, "INSERT INTO pembayaran VALUES ('', '$id_petugas', '$nisn', '$tgl_bayar', '$bulan_dibayar', '$tahun_dibayar', '$id_spp', '$jumlah_bayar')");
if ($query) {
    // Lakukan pengurangan nominal bayar pada tabel yang sesuai
    // Misalnya, jika ada tabel yang menyimpan total nominal bayar siswa, kurangi jumlah_bayar dari total tersebut
    
    header("location:?hal=pembayaran_data");
} else {
    echo "<script> alert('Tambah Data Gagal'); window.location='?hal=pembayaran_data';</script>";
}
