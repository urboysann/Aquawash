<?php
include '../koneksi.php';
$id = $_GET['id'];
$status = $_GET['status'];

$query=mysqli_query($koneksi, "UPDATE tb_transaksi SET status='$status' WHERE id='$id'");
var_dump($query);
die;
echo "<script>window.location.href='../detail/detail_transaks.php'</script>";
?>