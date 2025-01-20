<?php
include "../koneksi.php";

$id = $_POST['id'];
$nama_outlet = $_POST['nama_outlet'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];

$query = "UPDATE tb_outlet SET nama='$nama_outlet', alamat='$alamat', tlp='$tlp' WHERE id='$id'";
$hasil = mysqli_query($koneksi, $query); 

if(!$hasil){
    echo "Gagal Edit Data Outlet : ". mysqli_error($koneksi);
}else{
    header('Location:../view/view_outlet.php');  
    exit;
}

?>