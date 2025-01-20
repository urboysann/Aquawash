<?php
include "../koneksi.php";
$id = $_GET['id'];

$hasil = mysqli_query($koneksi, "DELETE FROM tb_member WHERE id='$id'");

if(!$hasil){
    echo "gagal menghapus data member " . mysqli_error($koneksi);
}else{
    header('Location:../view/view_member.php'); 
    exit;
}
?>