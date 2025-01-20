<?php
session_start();
include '../koneksi.php';

if (isset($_POST['selanjutnya'])) {
    $id_outlet = $_SESSION['id_outlet'];

    $kode_invoice_terakhir = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT kode_invoice FROM tb_transaksi ORDER BY id DESC LIMIT 1"));
    if (!$kode_invoice_terakhir) {
        $kode_invoice = "INV/" . date("Y/m/d") . "/1";
    } else {
        $pecah_string = explode("/", $kode_invoice_terakhir['kode_invoice']);
        $bulan_sebelum = $pecah_string[2];
        $bulan_saat_ini = date('m');
        if ($bulan_saat_ini != $bulan_sebelum) {
            $number_urut = 1;
        } else {
            $number_urut = $pecah_string[4];
            $number_urut++;
        }
        $kode_invoice = "INV/" . date("Y/m/d") . "/" . $number_urut;
    }

    $nama_member = $_POST['nama_member'];
    $cari_id_member = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT id FROM tb_member WHERE nama_member = '$nama_member'"));
    $id_member = $cari_id_member['id'];

    date_default_timezone_set('Asia/Makassar');
    $tanggal = date("Y-m-d H:i:s");

    $batas_waktu = date("Y-m-d H:i:s", strtotime($tanggal . "+3 days"));

    $dibayar = 'belum_dibayar';
    
    $tgl_bayar = "0000-00-00 00:00:00";
    
    $biaya_tambahan = 0;

    $cari_transaksi = mysqli_num_rows(mysqli_query($koneksi, "SELECT id_member FROM tb_transaksi WHERE id_member='$id_member'"));
    if ($cari_transaksi % 3 == 0 && $cari_transaksi != 0) {
        $diskon = 0.1;
    } else {
        $diskon = 0;
    }

    $pajak = 0.0075;
    $status = "baru";
    $id_user = $_SESSION['id_user'];

    $hasil = mysqli_query($koneksi, "INSERT INTO tb_transaksi VALUES (NULL, '$id_outlet', '$kode_invoice', '$id_member', '$tanggal', '$batas_waktu', '$tgl_bayar', '$biaya_tambahan', '$diskon', '$pajak', '$status', '$dibayar', '$id_user')");
    if (!$hasil) {
        echo "Gagal Tambah Data Transaksi : " . mysqli_error($koneksi);
    } else {
        $id_transaksi = mysqli_fetch_row(mysqli_query($koneksi, "SELECT LAST_INSERT_ID()"));
        $_SESSION['idtransaksi'] = $id_transaksi[0];
        header('Location: ../detail/detail_transaksi.php');
        exit;
    }
}
?>
