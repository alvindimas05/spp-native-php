<?php

if (isset($_POST['nama'])) {

    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_spp = ($_POST['id_spp']);

    $query = mysqli_query($koneksi, "INSERT INTO siswa (nisn,nis,nama,id_kelas,alamat,no_telp,id_spp) VALUES ('$nisn', '$nis', '$nama', '$id_kelas', '$alamat', '$no_telp', '$id_spp')");

    if ($query) {
        echo '<script>alert("Tambah Data sukses")</script>';
    } else {
        echo '<script>alert("Tambah Data Gagal")</script>';
    }
}


?>



<h2>Tambah data Siswa</h2>
<form action="?hal=proses_tambah_siswa" method="post">
    <div class="form-group mb-2">
        <label>NISN</label>
        <input type="number" class="form-control" name="nisn" placeholder="Masukkan nama NISN" required>
    </div>
    <div class="form-group mb-2">
        <label>NIS</label>
        <input type="number" class="form-control" name="nis" placeholder="Masukkan Kompetensi NIS" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" placeholder="nama" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama Kelas</label>
        <select name="id_kelas" class="form-control" required>
            <option disabled selected>== PILIH ==</option>
            <?php
            include '../koneksi.php';

            $query = mysqli_query($koneksi, "SELECT * FROM kelas");
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <option value="<?= $data['id_kelas'] ?>"><?= $data['nama_kelas'] ?></option>

            <?php  } ?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Alamat</label>
        <textarea type="text" class="form-control" name="alamat" placeholder="alamat" required></textarea>
    </div>
    <div class="form-group mb-2">
        <label>No telp</label>
        <input type="number" class="form-control" name="no_telp" placeholder="Masukkan  No telepon" required>
    </div>
    <div class="form-group mb-2">
        <label>Id SPP</label>
        <select name="id_spp" class="form-control" required>

            <option disabled selected>== PILIH ==</option>
            <?php
            include '../koneksi.php';

            $query = mysqli_query($koneksi, "SELECT * FROM spp");
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <option value="<?= $data['id_spp'] ?>"><?= $data['tahun']; ?> | Rp. <?= number_format($data['nominal']); ?></option>

            <?php  } ?>
        </select>
    </div>
    <div class="form-group mb-2">
        <input type="submit" class="btn btn-tambah" name="simpan" value="Simpan">
        <a href="?hal=siswa_data" class="btn btn-tambah">Kembali</a>
    </div>


</form>