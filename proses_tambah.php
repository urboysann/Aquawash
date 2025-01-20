<?php
include "../koneksi.php";

$nama_outlet = $_POST['nama_outlet'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];

$query = "INSERT INTO tb_outlet VALUES(NULL, '$nama_outlet', '$alamat', '$tlp')";
$hasil = mysqli_query($koneksi, $query); //menjalankan query

if(!$hasil){
    echo "Gagal Tambah Data Outlet : ". mysqli_error($koneksi);
}else{
    header('Location:../view/view_outlet.php');  //PHP
    exit;
}

?>