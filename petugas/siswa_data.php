<div class="col">
    <h3 class="judul">Data Siswa</h3>
</div>


<div class="card">
    <div class="card-header">
        <a href="?hal=siswa_tambah" class="btn btn-tambah">TAMBAH</a>

        <div class="search-bar">
            <input type="text" placeholder="Cari NISN atau Nama" class="search-input" id="search-input">
        </div>
    </div>
    <div class="card-body">
        <table border="1" id="siswa-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>SPP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM siswa, spp, kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nisn']; ?></td>
                        <td><?= $data['nis']; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['nama_kelas']; ?></td>
                        <td><?= $data['alamat']; ?></td>
                        <td><?= $data['no_telp']; ?></td>
                        <td><?= $data['tahun']; ?> - Rp. <?= number_format($data['nominal']); ?></td>
                        <td>
                            <a href="?hal=siswa_edit&nisn=<?= $data['nisn'] ?>" class="btn btn-warning">Edit</a>
                            <a href="?hal=siswa_hapus&nisn=<?= $data['nisn'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data')">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

  