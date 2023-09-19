<?php
// Include the database connection script
include '../koneksi.php';

// Check if the 'tgl1' and 'tgl2' parameters are set
if (isset($_GET['tgl1']) && isset($_GET['tgl2'])) {
    // Escape the input to prevent SQL injection
    $tgl1 = mysqli_real_escape_string($koneksi, $_GET['tgl1']);
    $tgl2 = mysqli_real_escape_string($koneksi, $_GET['tgl2']);

    // Query to retrieve payment data within the selected date range
    $query = "SELECT *, pembayaran.id_pembayaran
              FROM pembayaran, petugas, kelas, siswa, spp 
              WHERE siswa.id_kelas = kelas.id_kelas 
                AND siswa.id_spp = spp.id_spp 
                AND pembayaran.nisn = siswa.nisn 
                AND pembayaran.id_petugas = petugas.id_petugas 
                AND tgl_bayar BETWEEN '$tgl1' AND '$tgl2'";

    // Execute the query
    $result = mysqli_query($koneksi, $query);
} else {
    // If 'tgl1' and 'tgl2' are not set, you can handle it here (e.g., show an error message).
    // You may also redirect the user to the selection page or perform another action.
    echo "Please select a date range.";
    exit; // Exit the script
} 
?>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .print {
            margin-top: 10px;
        }

        @media print {
            .print {
                display: none;
            }
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid #000;
            padding: 4px;
        }
    </style>
</head>

<body>
    <h3>SMK NEGERI 2 BANDAR LAMPUNG - LAPORAN PEMBAYARAN SPP</h3>
    <hr />
    <p>Tanggal <?= $_GET['tgl1'] ?> - <?= $_GET['tgl2'] ?></p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>SPP</th>
                <th>Nominal</th>
                <th>Sudah Dibayar</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            $total = 0;
            while ($dta = mysqli_fetch_array($result)) :
            ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $dta['nisn'] ?></td>
                    <td><?= $dta['nama'] ?></td>
                    <td><?= $dta['nama_kelas'] ?></td>
                    <td><?= $dta['tahun'] ?></td>
                    <td><?= $dta['jumlah_bayar'] ?></td>
                    <td><?= $dta['nominal'] ?></td>
                    <td><?= $dta['jumlah_bayar'] ?></td>
                </tr>
                <?php $i++; ?>
                <?php $total += $dta['jumlah_bayar']; ?>

            <?php endwhile; ?>
            
            <tr>
                <td colspan="7" align="right"><b>TOTAL</b></td>
                <td><?= $total ?></td>
            </tr>
        </tbody>
    </table>
 

    <button class="print" onclick="window.print();">CETAK</button>
</body>

</html>
