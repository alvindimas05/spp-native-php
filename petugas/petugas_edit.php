<?php
include "../koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$_GET[id_petugas]'");
$data = mysqli_fetch_array($query);

?>

<h2>Edit data Petugas</h2><br>
<form action="?hal=proses_edit_petugas" method="post">
    <div class="form-group mb-2">
        <label>Nama Kelas</label>
        <input type="hidden" class="form-control" value="<?php echo $data['id_petugas']; ?>" name="id_petugas" placeholder="Masukkan nama kelas" required>

        <input type="text" class="form-control" value="<?php echo $data['nama_petugas']; ?>" name="nama_petugas" placeholder="Masukkan nama petugas" required>
    </div>
    <div class="form-group mb-2">
        <label>Username</label>
        <input type="text" class="form-control" value="<?php echo $data['username']; ?>" name="username" placeholder="Masukkan Username" required>
    </div>
    <div class="form-group mb-2">
        <label>Password</label>
        <input type="text" class="form-control" value="<?php echo $data['password']; ?>" name="password" placeholder="Masukkan Password" required>
    </div>
    <div class="form-group mb-2">
        <label>Level</label>
        <select name="level" class="form-control" value="<?= $data['level']; ?>" required>

            <option disabled selected> == PILIH ==</option>
            <option value="admin" <?php if ($data['level'] == 'admin') {
                                        echo "selected";
                                    } ?>>ADMIN</option>
            <option value="petugas" <?php if ($data['level'] == 'petugas') {
                                        echo "selected";
                                    } ?>>PETUGAS</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <input type="submit" class="btn btn-tambah" name="simpan" value="Simpan">
        <a href="?hal=petugas_data" class="btn btn-tambah">Kembali</a>
    </div>


</form>