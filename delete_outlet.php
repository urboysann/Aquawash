<?php
include "../koneksi.php";
$id = $_GET['id'];

$hasil = mysqli_query($koneksi, "DELETE FROM tb_outlet WHERE id='$id'");

if(!$hasil){
    echo "gagal menghapus data Outlet " . mysqli_error($koneksi);
}else{
    header('Location:../view/view_outlet.php'); 
    exit;
}
?>