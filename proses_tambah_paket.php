<?php
include "../koneksi.php";

$id = $_POST['id_outlet'];
$jenis = $_POST['jenis'];
$nama_paket = $_POST['nama_paket'];
$harga = $_POST['harga'];

$query = "INSERT INTO tb_paket VALUES(NULL, '$id', '$jenis', '$nama_paket', '$harga')";
$hasil = mysqli_query($koneksi, $query); //menjalankan query

if(!$hasil){
    echo "Gagal Tambah Data Outlet : ". mysqli_error($koneksi);
}else{
    header('Location:../view/view_paket.php');  //PHP
    exit;
}

?>