<?php
include "../koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM spp WHERE id_spp='$_GET[id_spp]'");
$data = mysqli_fetch_array($query);

?>

<h2>Edit data SPP</h2>
<form action="?hal=proses_edit_spp" method="post">
    <div class="form-group mb-2">
        <label>Tahun SPP</label>
        <input type="hidden" class="form-control" value="<?php echo $data['id_spp']; ?>" name="id_spp" placeholder="Masukkan nama kelas" required>

        <input type="text" class="form-control" value="<?php echo $data['tahun']; ?>" name="tahun" placeholder="Masukkan tahun SPP" required>
    </div>
    <div class="form-group mb-2">
        <label>Nominal</label>
        <input type="text" class="form-control" value="<?php echo $data['nominal']; ?>" name="nominal" placeholder="Masukkan Nominal SPP" required>
    </div>
    <div class="form-group mb-2">
        <input type="submit" class="btn btn-tambah" name="simpan" value="Simpan">
        <a href="?hal=spp_data" class="btn btn-tambah">Kembali</a>
    </div>


</form>