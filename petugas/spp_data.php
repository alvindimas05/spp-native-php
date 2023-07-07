<div class="col">
    <h3 class="judul">Data SPP</h3>
</div>


<div class="card">
    <div class="card-header">
        <a href="?hal=spp_tambah" class="btn btn-tambah">TAMBAH</a>
        <div class="search-bar">
            <input type="text" placeholder="Cari Tahun" class="search-input" id="search-input">
        </div>
    </div>
    <div class="card-body">
        <table border="1" id="siswa-table">
            <tr>
                <th>No</th>
                <th>Tahun</th>
                <th>Nominal</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM spp");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['tahun']; ?></td>
                        <td>Rp. <?= number_format($data['nominal']); ?></td>
                        <td>
                            <a href="?hal=spp_edit&id_spp=<?= $data['id_spp'] ?>" class="btn btn-warning">Edit</a>
                            <a href="?hal=spp_hapus&id_spp=<?= $data['id_spp'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data') ">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>