<?php 
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'");
if (mysqli_num_rows($query)) {
    session_start();
    $data = mysqli_fetch_array($query);
    $_SESSION['id_petugas'] = $data['id_petugas'];
    $_SESSION['nama_petugas'] = $data['nama_petugas'];
    $_SESSION['level'] = $data['level'];
    header("location:petugas/admin.php");
} else {
    echo "<script>
    alert('Login Gagal, Silahkan Login ulang');
    window(location='index2.php');
    </script>";

}
?> 