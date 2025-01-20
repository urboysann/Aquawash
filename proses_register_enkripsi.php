<?php
include "../koneksi.php";

$nama_rgst = $_POST['nama'];
$username_rgst = $_POST['username'];
$password_rgst = $_POST['password'];
$pass_hash = password_hash($password_rgst, PASSWORD_DEFAULT); 
$id_outlet = $_POST['id_outlet'];
$role_rgst = $_POST['role'];

$query_username = mysqli_query($koneksi, "SELECT COUNT(*) FROM tb_user WHERE username='$username_rgst'");
$cek_username = mysqli_fetch_row($query_username);

if ($cek_username[0] != 0) {
    echo "<script>alert('Username sudah ada, silahkan menggunakan username yang lain');window.location.href='register.php'</script>";
} else {
    $query = "INSERT INTO tb_user VALUES(NULL,'$nama_rgst','$username_rgst','$pass_hash', '$id_outlet', '$role_rgst')";
    $hasil = mysqli_query($koneksi, $query);

    if (!$hasil) {
        echo "Gagal Register : " . mysqli_error($koneksi);
    } else {
        header('Location:../login/login.php');
        exit;
    }
}
?>
