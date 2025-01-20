<?php
session_start();
$user = $_POST['username'];
$password_login = $_POST['password'];

include "../koneksi.php";
$login = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$user'");
$query_role = mysqli_fetch_assoc($login);

$cek = password_verify($password_login,$query_role['password']); //dekripsi
// $cek = mysqli_num_rows($login);

if($cek > 0){
    $_SESSION['username'] = $user;
    $_SESSION['role'] = $query_role['role'];
    $_SESSION['id_user'] = $query_role['id'];
    $_SESSION['id_outlet'] = $query_role['id_outlet'];
    echo "<script>alert('Berhasil Login');location.href='../dashboard/dashboard.php'</script>";
}else{
    echo "<script>alert('Gagal Login');location.href='login.php'</script>";
}
?>