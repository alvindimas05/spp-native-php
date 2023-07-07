<h2>Tambah data kelas</h2>
<form action="?hal=proses_tambah_kelas" method="post">
    <div class="form-group mb-2">
        <label>Nama Kelas</label>
        <input type="text" class="form-control" name="nama_kelas" placeholder="Masukkan nama kelas" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama Kompetensi Keahlian</label>
        <input type="text" class="form-control" name="kompetensi_keahlian" placeholder="Masukkan Kompetensi Keahlian" required>
    </div>
    <div class="form-group mb-2">
        <input type="submit" class="btn btn-tambah" name="simpan" value="Simpan">
        <a href="?hal=kelas_data" class="btn btn-tambah">Kembali</a>
    </div>


</form>