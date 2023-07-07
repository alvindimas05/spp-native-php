<h2>Tambah data SPP</h2>
<form action="?hal=proses_tambah_spp" method="post">
    <div class="form-group mb-2">
        <label>Tahun</label>
        <input type="number" name="tahun" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="4" placeholder="Masukkan Tahun" required>
    </div>
    <div class="form-group mb-2">
        <label>Nominal</label>
        <input type="number" class="form-control" name="nominal" placeholder="Masukkan Nominal" required>
    </div>
    <div class="form-group mb-2">
        <input type="submit" class="btn btn-tambah" name="simpan" value="Simpan">
        <a href="?hal=spp_data" class="btn btn-tambah">Kembali</a>
    </div>


</form>