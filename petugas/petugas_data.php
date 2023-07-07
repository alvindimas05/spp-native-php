<div class="col">
    <h3 class="judul">Data Petugas</h3>
</div>


<div class="card">
    <div class="card-header">
        <a href="?hal=petugas_tambah" class="btn btn-tambah">TAMBAH</a>

        <div class="search-bar">
            <input type="text" placeholder="Cari Nama Petugas" class="search-input" id="search-input">
        </div>
    </div>
    <div class="card-body">
        <table border="1" id="siswa-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM petugas");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama_petugas']; ?></td>
                        <td><?= $data['username']; ?></td>
                        <td><?= $data['password']; ?></td>
                        <td><?= $data['level']; ?></td>
                        <td>
                            <a href="?hal=petugas_edit&id_petugas=<?= $data['id_petugas'] ?>" class="btn btn-warning">Edit</a>
                            <a href="?hal=petugas_hapus&id_petugas=<?= $data['id_petugas'] ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data') ">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>