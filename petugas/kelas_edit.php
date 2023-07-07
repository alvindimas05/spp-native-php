<?php
include "../koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$_GET[id_kelas]'");
$data = mysqli_fetch_array($query);

?>

<h2>Edit data kelas</h2>
<form action="?hal=proses_edit_kelas" method="post">
    <div class="form-group mb-2">
        <label>Nama Kelas</label>
        <input type="hidden" class="form-control" value="<?php echo $data['id_kelas']; ?>" name="id_kelas" placeholder="Masukkan nama kelas" required>

        <input type="text" class="form-control" value="<?php echo $data['nama_kelas']; ?>" name="nama_kelas" placeholder="Masukkan nama kelas" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama Kompetensi Keahlian</label>
        <input type="text" class="form-control" value="<?php echo $data['kompetensi_keahlian']; ?>" name="kompetensi_keahlian" placeholder="Masukkan Kompetensi Keahlian" required>
    </div>
    <div class="form-group mb-2">
        <input type="submit" class="btn btn-tambah" name="simpan" value="Simpan">
        <a href="?hal=kelas_data" class="btn btn-tambah">Kembali</a>
    </div>


</form>