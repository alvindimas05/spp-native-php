<?php
session_start();
if (empty($_SESSION['id_petugas'])) {
    echo "<script>
    alert('Anda harus login terlebih dahulu');
    window.location='../index2.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Pembayaran SPP</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">


</head>

<body>
    <div class="head">
        <h2 class="head-text">Pembayaran SPP</h2>
        <h2 class="head-text">SMKN 2 SURAKARTA</h2>
    </div>
    <!-- identitas website -->

    <!-- Menu administrator -->
    <div class="navbar">
        <div class="logo">
            <h3>E-SPP</h3>
        </div>

        <ul class="links">
            <li><a href="?hal=beranda">Home</a></li>
            <?php
            if ($_SESSION['level'] == 'admin') {
            ?>
                <li><a href="?hal=petugas_data">Petugas</a></li>
                <li><a href="?hal=kelas_data">Kelas</a></li>
                <li><a href="?hal=spp_data">SPP</a></li>
                <li><a href="?hal=siswa_data">Siswa</a></li>
            <?php } ?>
            <li><a href="?hal=pembayaran_data">Pembayaran</a></li>
            <?php
            if ($_SESSION['level'] == 'admin') {
            ?>
                <li><a href="?hal=laporan">Laporan</a> </li>
         

            <?php } ?>
            <div class="">
                <li><a href="../logout.php" onclick="return confirm('Anda Yakin Akan Keluar')">Logout</a></li>
            </div>
        </ul>
    </div>



    <div class="container">


        <?php
        if (isset($_GET['hal'])) {
            $hal = $_GET['hal'];
            $page = "$hal.php";
            if (!file_exists($page) || empty($hal)) {
        ?>
                <div class="col">
                    <h2 class="judul">Selamat datang <b><?= $_SESSION['nama_petugas'] ?></b></h4>
                        Di halaman <?= $_SESSION['level'] ?> <br>
                        Aplikasi Pembayaran SPP Digunakan untuk mempermudah dalam pembayaran SPP Siswa / Siswi di Sekolah</h2>
                </div>
            <?php
            } else {
                include "$page";
            }
        } else {
            // Tampilkan halaman beranda jika parameter hal tidak ada
            ?>
            <div class="col">
                <h2 class="judul">Selamat datang <b><?= $_SESSION['nama_petugas'] ?></b></h2>
                Di halaman <?= $_SESSION['level'] ?> <br>
                Aplikasi Pembayaran SPP Digunakan untuk mempermudah dalam pembayaran SPP Siswa / Siswi di Sekolah</h2>
            </div>
        <?php
        }
        ?>


    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fungsi pencarian saat ada perubahan pada input pencarian
            $('#search-input').on('input', function() {
                var keyword = $(this).val().trim().toLowerCase();
                filterTable(keyword);
            });

            // Filter tabel berdasarkan keyword
            function filterTable(keyword) {
                $('#siswa-table tbody tr').each(function() {
                    var nisn = $(this).find('td:eq(1)').text().toLowerCase();
                    var nama = $(this).find('td:eq(3)').text().toLowerCase();
                    if (nisn.includes(keyword) || nama.includes(keyword)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
        });
    </script>
</body>

</html>
