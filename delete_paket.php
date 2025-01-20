<?php
include "../koneksi.php";
$id = $_GET['id'];

$hasil = mysqli_query($koneksi, "DELETE FROM tb_paket WHERE id='$id'");

if(!$hasil){
    echo "gagal menghapus data paket " . mysqli_error($koneksi);
}else{
    header('Location:../view/view_paket.php'); 
    exit;
}
?>