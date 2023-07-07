<div class="col">
    <h3 class="judul">Data Kelas</h3>
</div>


<div class="card">
    <div class="card-header">
        <a href="?hal=kelas_tambah" class="btn btn-tambah">TAMBAH</a>

        <div class="search-bar">
            <input type="text" placeholder="Cari Nama kelas" class="search-input" id="search-input">
        </div>
    </div>
    <div class="card-body">
        <table border="1" id="siswa-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Kompetensi Keahlian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM kelas");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama_kelas']; ?></td>
                        <td><?= $data['kompetensi_keahlian']; ?></td>
                        <td>
                            <a href="?hal=kelas_edit&id_kelas=<?= $data['id_kelas'] ?>" class="btn btn-warning">Edit</a>
                            <a href="?hal=kelas_hapus&id_kelas=<?= $data['id_kelas'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data') ">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>