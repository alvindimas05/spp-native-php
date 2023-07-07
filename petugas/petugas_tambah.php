<h2>Tambah data Petugas</h2>
<form action="?hal=proses_tambah_petugas" method="post">
    <div class="form-group mb-2">
        <label>Nama Petugas</label>
        <input type="text" class="form-control" name="nama_petugas" placeholder="Masukkan Nama Petugas" required>
    </div>
    <div class="form-group mb-2">
        <label>Username</label>
        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
    </div>
    <div class="form-group mb-2">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
    </div>
    <div class="form-group mb-2">
        <label>Level</label>
        <select name="level" class="form-control" required>
            <option disabled selected> == PILIH ==</option>
            <option value="admin">ADMIN</option>
            <option value="petugas">PETUGAS</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <input type="submit" class="btn btn-tambah" name="simpan" value="Simpan">
        <a href="?hal=kelas_data" class="btn btn-tambah">Kembali</a>
    </div>


</form>