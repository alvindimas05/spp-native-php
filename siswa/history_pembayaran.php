<div class="col">
    <h3 class="judul">History Pembayaran</h3>
</div>


<div class="card">
    <div class="card-body">
        <table border="1">
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
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM pembayaran
            INNER JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas
             INNER JOIN siswa ON pembayaran.nisn = siswa.nisn
              INNER JOIN spp ON siswa.id_spp = spp.id_spp
                  INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas
                     WHERE siswa.nisn = '$_SESSION[nisn]'");
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

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>