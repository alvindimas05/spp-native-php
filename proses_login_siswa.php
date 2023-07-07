<?php 
include 'koneksi.php';
$nisn = $_POST['nisn'];
$nis = $_POST['nis'];

$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn = '$nisn' AND nis = '$nis'");
if (mysqli_num_rows($query)) {
    session_start();
    $data = mysqli_fetch_array($query);
    $_SESSION['nisn'] = $data['nisn'];
    $_SESSION['nisn'] = $data['nisn'];
    header("location:siswa/siswa.php");
} else {
    echo "<script>
    alert('Login Gagal, Silahkan Login ulang');
    window(location='index.php');
    </script>";

}
?> 