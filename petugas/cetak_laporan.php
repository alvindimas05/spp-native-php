<h2>Laporan Data SPP</h2>
<div class="table-responsive">
    <table border="1" class="table table-striped" id="contoh" cellspacing="0" cellpadding="5" >
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
            $query = mysqli_query($koneksi, "SELECT * FROM pembayaran, petugas, kelas, siswa, spp WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND pembayaran.nisn=siswa.nisn AND pembayaran.id_petugas=petugas.id_petugas ORDER BY tgl_bayar DESC");
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
<script>
    window.print();
</script>