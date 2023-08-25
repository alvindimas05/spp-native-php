<?php
include '../koneksi.php';

$nisn = $_GET['nisn'];

$query = mysqli_query($koneksi, "SELECT *, SUM(pembayaran.jumlah_bayar) AS total_bayar FROM siswa
    JOIN spp ON siswa.id_spp = spp.id_spp
    JOIN kelas ON siswa.id_kelas = kelas.id_kelas
    LEFT JOIN pembayaran ON siswa.nisn = pembayaran.nisn
    WHERE siswa.nisn = '$nisn'");

$data = mysqli_fetch_array($query);

$queryJumlahBayar = mysqli_query($koneksi, "SELECT COALESCE(jumlah_bayar, 0) AS jumlah_bayar FROM pembayaran WHERE id_pembayaran = '" . $_GET['id_pembayaran'] . "' ORDER BY tgl_bayar DESC LIMIT 1");
$dataJumlahBayar = mysqli_fetch_array($queryJumlahBayar);

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cetak Nota Pembayaran SPP</title>
    <style>
        /* Gaya tampilan cetakan */
        table {
            max-width: 100%;
            max-height: 100%;
        }

        body {
            padding: 5px;
            position: relative;
            width: 100%;
            height: 100%;
        }

        table th,
        table td {
            padding: .625em;
            text-align: center;
        }

        table .kop:before {
            content: ': ';
        }

        .left {
            text-align: left;
        }

        table #caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }

        table.border {
            width: 100%;
            border-collapse: collapse;
        }

        table.border tbody th,
        table.border tbody td {
            border: thin solid #000;
            padding: 2px;
        }



        .center-container {
            display: flex;
            justify-content: center;
        }

        .data-container {
            display: flex;
        }

        .data-column {
            text-align: left;
            padding-right: 600px;
        }

        .data-column p {
            margin: 0;
        }

        .data-column strong {
            font-weight: bold;
        }

        .data-column:last-child {
            padding-right: 0;
        }
    </style>
</head>

<body>
    <h3 style="text-align: center;">
        <tr>
            <td colspan="6" width="485" style="font-size: 34pt;" id="caption"> Nota Pembayaran SPP</td>
        </tr>
    </h3>
    <div id="printable" class="container">
        <table border="0" cellpadding="0" cellspacing="0" width="485" class="border" style="overflow-x:auto;">
            <thead style="align-items:flex-end;">

                <div class="center-container">
                    <div class="data-container">
                        <div class="data-column">
                            <p>NISN: <strong><?= $data['nisn']; ?></strong></p>
                            <p>Nama Siswa: <strong><?= $data['nama']; ?></strong></p>
                            <p>Kelas: <strong><?= $data['nama_kelas']; ?></strong></p>
                        </div>
                        <div class="data-column">
                            <p>Tanggal Bayar: <strong><?= $data['tgl_bayar']; ?></strong></p>
                            <p>Nominal SPP: <strong>Rp. <?= number_format($data['nominal']); ?></strong></p>
                            <p>Sudah Dibayar: <strong>Rp. <?= number_format($data['total_bayar']); ?></strong></p>
                            <p>Baru Dibayar: <strong>Rp. <?= number_format($dataJumlahBayar['jumlah_bayar']); ?></strong></p>
                        </div>
                    </div>
                </div>


                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';

                $nisn = $_GET['nisn'];

                $query = mysqli_query($koneksi, "SELECT *, SUM(pembayaran.jumlah_bayar) AS total_bayar FROM siswa
    JOIN spp ON siswa.id_spp = spp.id_spp
    JOIN kelas ON siswa.id_kelas = kelas.id_kelas
    LEFT JOIN pembayaran ON siswa.nisn = pembayaran.nisn
    WHERE siswa.nisn = '$nisn'");

                $queryJumlahBayar = mysqli_query($koneksi, "SELECT COALESCE(jumlah_bayar, 0) AS jumlah_bayar FROM pembayaran WHERE id_pembayaran = '" . $_GET['id_pembayaran'] . "' ORDER BY tgl_bayar DESC LIMIT 1");
                $dataJumlahBayar = mysqli_fetch_array($queryJumlahBayar);
                $data = mysqli_fetch_array($query);
                $petugas = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$data[id_petugas]'");
                $petugas = mysqli_fetch_array($petugas);
                mysqli_close($koneksi);
                ?>

                <tr>
                    <th>No</th>
                    <th>Sumbangan Operasional</th>
                    <th>TOTAL</th>
                    <th colspan="2">KETERANGAN</th>
                </tr>
                <tr>
                    <td align="right">1</td>
                    <td>Rp. <?= number_format($data['nominal']); ?></td>
                    <td>Rp. <?= number_format($dataJumlahBayar['jumlah_bayar']); ?></td>
                    <td colspan="2"> Dalam rangka PSMP</td>
                </tr>
                <tr>
                    <th colspan="2"> Sisa</th>
                    <?php
                    $sisa = $data['nominal'] - $data['total_bayar'];
                    if ($sisa <= 0) {
                        echo '<td colspan="1">LUNAS</td>';
                    } else {
                        echo '<td>Rp. ' . number_format($sisa) . '</td>';
                        echo '<td></td>';
                    }
                    ?>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tfoot>
                    <table>
                        <tr>
                            <td class="ttd">
                                <p>Orang tua/Siswa

                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </p>
                                <p>__________________________</p>
                            </td>
                            <td class="kanan">
                                <p><?= $petugas['nama_petugas']; ?><br>
                                    Operator,
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </p>
                                <p>__________________________</p>
                            </td>
                        </tr>
                    </table>

                    <style>
                        .ttd {
                            text-align: center;
                            padding-left: 200px;
                            /* Add space on the right */
                        }

                        .kanan {
                            text-align: center;
                            /* Align to the left within the column */
                            padding-left: 300px;
                            /* Add space on the left */
                        }
                    </style>
                </tfoot>
            </tfoot>
        </table>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>

</html>
