<div class="col">
    <h3 class="judul">Data Pembayaran SPP</h3>
</div>


<div class="card">
    <div class="card-header">
        <div class="search-bar">
            <input type="text" placeholder="Cari NISN" class="search-input" id="search-input">
        </div>
    </div>
    <div class="card-body">
        <table border="1" id="siswa-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>SPP</th>
                    <th>Nominal</th>
                    <th>Sudah Dibayar</th>
                    <th>Kekurangan</th>
                    <th>Status</th>
                    <th>History</th>
                    <th>Cetak</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                $no = 1;
                $nisn = $_SESSION["nisn"];
                $query = mysqli_query($koneksi, "SELECT * FROM siswa, spp, kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND nisn='$nisn'");
                while ($data = mysqli_fetch_array($query)) {

                    $pembayaran = mysqli_query($koneksi, "SELECT SUM(jumlah_bayar) AS jumlah_bayar FROM pembayaran WHERE nisn='$data[nisn]'");
                    $pembayaran = mysqli_fetch_array($pembayaran);
                    $kekurangan = $pembayaran['jumlah_bayar'];
                    $kekurangan = $data['nominal'] - $pembayaran['jumlah_bayar'];
                    if ($kekurangan < 0) {
                        $kekurangan = 0;
                    }
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nisn']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['nama_kelas']; ?></td>
                        <td><?= $data['tahun']; ?></td>
                        <td>Rp. <?= number_format($data['nominal']); ?></td>
                        <td>Rp. <?= number_format($pembayaran['jumlah_bayar']); ?></td>
                        <td>Rp. <?= number_format($kekurangan); ?></td>
                        <td>
                            <?php
                            if ($kekurangan == 0) {
                                echo '<b class="text-success">Lunas</b>';
                            } else {
                                echo '<a href="?hal=pembayaran_tambah&kekurangan=' . $kekurangan . '" class="btn btn-danger">Bayar</a>';
                            }
                            ?>
                        </td>
                        <td>
                            <a href="?hal=histori_pembayaran&nisn=<?= $data['nisn']; ?>" class="btn btn-warning">Lihat</a>
                        </td>


                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>