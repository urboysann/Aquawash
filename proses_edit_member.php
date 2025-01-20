<?php
include "../koneksi.php";

$id = $_POST['id'];
$nama = $_POST['nama_member'];
$alamat = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tlp = $_POST['tlp'];

$query = "UPDATE tb_member SET nama_member='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', tlp ='$tlp' WHERE id='$id'";
$hasil = mysqli_query($koneksi, $query); 

if(!$hasil){
    echo "Gagal Edit Data Paket : ". mysqli_error($koneksi);
}else{
    header('Location:../view/view_member.php');  
    exit;
}

?>