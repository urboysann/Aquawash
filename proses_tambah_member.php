<?php
include "../koneksi.php";

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tlp = $_POST['tlp'];

$query = "INSERT INTO tb_member VALUES(NULL, '$nama', '$alamat', '$jenis_kelamin', '$tlp')";
$hasil = mysqli_query($koneksi, $query); 

if(!$hasil){
    echo "Gagal Tambah Data Outlet : ". mysqli_error($koneksi);
}else{
    header('Location:../view/view_member.php');  
    exit;
}

?>