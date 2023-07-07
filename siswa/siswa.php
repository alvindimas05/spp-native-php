<?php
session_start();
if (empty($_SESSION['nisn'])) {
    echo "<script>
    alert('Anda harus login terlebih dahulu');
    window.location='../index.php';
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

</head>

<body>
    <div class="head">
        <h2 class="head-text">Pembayaran SPP</h2>
        <h2 class="head-text">SMKN 2 BANDAR LAMPUNG</h2>
    </div>

    <body>
        <div class="navbar">
            <div class="logo">
                <h3>E-SPP</h3>
            </div>

            <ul class="links">
                <li> <a href="?hal=history_pembayaran" class="btn btn-tambah">History Pembayaran</a>
                </li>
                <li><a href="../logout.php" class="btn btn-tambah" onclick="return confirm('Anda Yakin Akan Keluar')">Logout</a></li>

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
                        <h2 class="judul">Selamat datang <b><?= $_SESSION['misn'] ?></b></h4>
                            Di halaman Siswa <br>
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
                    <h2 class="judul">Selamat datang <b><?= $_SESSION['nisn'] ?></b></h4>
                        Di halaman Siswa <br>
                        Aplikasi Pembayaran SPP Digunakan untuk mempermudah dalam pembayaran SPP Siswa / Siswi di Sekolah</h2>
                </div>
            <?php
            }
            ?>


        </div>

    </body>

</html>