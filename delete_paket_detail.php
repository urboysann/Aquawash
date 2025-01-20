<?php
include '../koneksi.php';
$id = $_GET['id'];
$query_delete = mysqli_query($koneksi, "DELETE FROM tb_detail_transaksi WHERE id=$id");

if(!$query_delete){
    echo "Gagal Delete ". mysqli_error($koneksi);
}else{
    header('Location:../detail/detail_transaksi.php');
}
?>