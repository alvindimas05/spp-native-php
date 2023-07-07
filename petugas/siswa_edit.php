<?php
include "../koneksi.php";


$query = mysqli_query($koneksi, "SELECT * FROM siswa, spp, kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp");

$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$_GET[nisn]'");
$data = mysqli_fetch_array($query);

?>

<h5>Tambah data kelas</h5>
<form action="?hal=proses_edit_siswa" method="post">
    <div class="form-group mb-2">
        <label>NISN</label>
        <input type="hidden" class="form-control" value="<?php echo $data['nisn']; ?>" name="nisn" placeholder="Masukkan NISN" required>

        <input type="number" class="form-control" value="<?php echo $data['nisn']; ?>" name="nisn" placeholder="Masukkan  NISN" required>
    </div>
    <div class="form-group mb-2">
        <label>NIS</label>
        <input type="number" class="form-control" value="<?php echo $data['nis']; ?>" name="nis" placeholder="Masukkan NIS" required>
    </div>
    <div class="form-group mb-2">
        <label>Nama</label>
        <input type="text" class="form-control" value="<?php echo $data['nama']; ?>" name="nama" placeholder="Masukkan Nama" required>
    </div>
    <div class="form-group mb-2">
        <label>Kelas</label>
        <select name="id_kelas" class="form-control" required>
            <option disabled selected>== PILIH ==</option>
            <?php
            $kel = mysqli_query($koneksi, "SELECT * FROM kelas");
            while ($kelas = mysqli_fetch_array($kel)) {
            ?>
                <option <?php if ($data['id_kelas'] == $kelas['id_kelas']) echo 'selected'; ?> value="<?php echo $kelas['id_kelas']; ?>"><?php echo $kelas['nama_kelas']; ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Alamat</label>
        <input type="text" class="form-control" value="<?php echo $data['alamat']; ?>" name="alamat" placeholder="Masukkan Kompetensi Keahlian" required>
    </div>
    <div class="form-group mb-2">
        <label>No Telp</label>
        <input type="text" class="form-control" value="<?php echo $data['no_telp']; ?>" name="no_telp" placeholder="Masukkan Kompetensi Keahlian" required>
    </div>
    <div class="form-group mb-2">
        <label>SPP</label>
        <select name="id_spp" class="form-control">
            <option disabled selected>== PILIH ==</option>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM spp");
            while ($spp = mysqli_fetch_array($query)) {
            ?>
                <option value="<?= $spp['id_spp'] ?>" <?php if ($spp['id_spp'] == $data['id_spp']) {
                                                            echo "selected";
                                                        } ?>>
                    <?= $spp['tahun'] ?> | Rp. <?= number_format($spp['nominal']) ?>
                </option>
            <?php } ?>
        </select>

    </div>
    <div class="form-group mb-2">
        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
        <a href="?hal=siswa_data" class="btn btn-light">Kembali</a>
    </div>


</form>