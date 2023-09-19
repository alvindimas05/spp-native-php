<div class="col">
    <h3 class="judul">History Pembayaran</h3>
</div>

<div class="card">
    <form class="card p-4" action="laporan2.php" method="GET" target="_blank">
        <div class="card-header">
            <b>Laporan Pembayaran</b>
        </div>
        <div class="table">
            <div class="form-group">
                <label for="tgl1">Mulai Tanggal:</label>
                <input class="form-control" type="date" id="tgl1" name="tgl1" value="2023-09-19">
            </div>
            <div class="form-group">
                <label for="tgl2">Sampai Ta-nggal:</label>
                <input class="form-control" type="date" id="tgl2" name="tgl2" value="2023-09-19">
            </div>
            <button class="btn btn-tampilkan" type="submit" name="tampil">Tampilkan</button>
        </div>
    </form>
    <div class="card-body">
        <table class="table table-striped" id="contoh">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>SPP</th>
                    <th>Nominal</th>
                    <th>Sudah Dibayar</th>
                    <th>Tanggal Bayar</th>
                    <th>Petugas</th>
                    <th>Cetak</th>

                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';

                $no = 1;
                $query = mysqli_query($koneksi, "SELECT *, pembayaran.id_pembayaran FROM pembayaran, petugas, kelas, siswa, spp WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND pembayaran.nisn=siswa.nisn AND pembayaran.id_petugas=petugas.id_petugas ORDER BY tgl_bayar DESC");
                while ($data = mysqli_fetch_array($query)) {

                    $petugas = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$data[id_petugas]'");
                    $petugas = mysqli_fetch_array($petugas);
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nisn']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['nama_kelas']; ?></td>
                        <td><?= $data['tahun']; ?></td>
                        <td>Rp. <?= number_format($data['nominal']); ?></td>
                        <td>Rp. <?= number_format($data['jumlah_bayar']); ?></td>
                        <td><?= $data['tgl_bayar']; ?></td>
                        <td><?= $petugas['nama_petugas']; ?></td>
                        <td>
                            <a href="cetak_nota.php?nisn=<?= $data['nisn']; ?>&id_pembayaran=<?= $data['id_pembayaran']; ?>" target="_blank" class="btn btn-tambah">Cetak</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
