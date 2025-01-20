<?php
include "../koneksi.php";

$id = $_POST['id'];
$jenis = $_POST['jenis'];
$nama_paket = $_POST['nama_paket'];
$harga = $_POST['harga'];

$query = "UPDATE tb_paket SET jenis='$jenis', nama_paket='$nama_paket', harga='$harga' WHERE id='$id'";
$hasil = mysqli_query($koneksi, $query); 

if(!$hasil){
    echo "Gagal Edit Data Paket : ". mysqli_error($koneksi);
}else{
    header('Location:../view/view_paket.php');  
    exit;
}

?>