<?php
include "../koneksi.php";
$id =$_GET['id'];
$status = $_GET['status'];

mysqli_query($koneksi, "UPDATE tb_transaksi SET status='$status' WHERE id=$id");
echo "<script>window.location.href='view_laporan.php'</script>";
?>