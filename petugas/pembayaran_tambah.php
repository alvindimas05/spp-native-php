<?php
include '../koneksi.php';
$nisn = $_GET['nisn'];
$kekurangan = $_GET['kekurangan'];
$query = mysqli_query($koneksi, "SELECT * FROM siswa, spp, kelas WHERE siswa.id_kelas = kelas.id_kelas  AND siswa.id_spp = spp.id_spp AND siswa.nisn='$nisn'");
$data = mysqli_fetch_array($query);

$denda = 100000;
$tahun_denda = intval(date("Y")) - intval($data["tahun"]);
?>

<h2>Bayar SPP</h2>
<form action="?hal=proses_tambah_pembayaran" method="post">
    <div class="form-group mb-2">
        <label>Nama Petugas</label>
        <input type="text" name="nama_petugas" class="form-control" value="<?php echo $_SESSION['nama_petugas']; ?>" readonly required>

    </div>
    <div class="form-group mb-2">
        <label>NISN</label>
        <input type="number" class="form-control" name="nisn" value="<?php echo $data['nisn']; ?>" readonly required>
    </div>
    <div class="form-group mb-2">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" readonly required>
    </div>
    <div class="form-group mb-2">
        <label>Tanggal Bayar</label>
        <input type="date" class="form-control" name="tgl_bayar" required>
    </div>
    <div class="form-group mb-2">
        <label>Bulan Dibayar</label>
        <select name="bulan_dibayar" class="form-control" required>
            <option disabled selected>== PILIH ==</option>
            <option value="Januari">Januari</option>
            <option value="Februari">Februari</option>
            <option value="Maret">Maret</option>
            <option value="April">April</option>
            <option value="Mei">Mei</option>
            <option value="Juni">Juni</option>
            <option value="Juli">Juli</option>
            <option value="Agustus">Agustus</option>
            <option value="September">September</option>
            <option value="Oktober">Oktober</option>
            <option value="November">November</option>
            <option value="Desember">Desember</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Tahun Bayar</label>
        <select name="tahun_dibayar" class="form-control" required>
            <option disabled selected>== PILIH ==</option>
            <?php
            for ($i = date('Y'); $i >= 2010; $i--) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label>Tahun SPP</label>
        <select name="id_spp" class="form-control" required>
            <option disabled selected>== PILIH ==</option>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM spp");
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <option value="<?= $data['id_spp'] ?>"><?= $data['tahun']; ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="form-group mb-2">
        <label style="width: 100%">Jumlah SPP (yang harus dibayar <?php if($tahun_denda > 0){ echo "dengan denda"; } ?> <b class="text-danger">Rp. <?= number_format($kekurangan + ($denda * $tahun_denda)); ?></b>)</label>
        <input type="number" class="form-control" name="jumlah_bayar" max="<?= $$kekurangan + ($denda * $tahun_denda); ?>" required>
    </div>
    <div class="form-group mb-2">
        <input type="submit" class="btn btn-tambah" name="simpan" value="Simpan">
        <a href="?hal=pembayaran_data" class="btn btn-tambah">Kembali</a>
    </div>
</form>