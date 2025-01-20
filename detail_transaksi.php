<?php
session_start();
include '../koneksi.php';
include '../dashboard/dashboard.php';

if (isset($_GET['idtransaksi'])) {
    $idtransaksi = $_GET['idtransaksi'];
    $_SESSION ['idtransaksi'] = $idtransaksi;
} elseif (isset($_SESSION['idtransaksi'])) {
    $idtransaksi = $_SESSION['idtransaksi'];
}

$data_transaksi = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_transaksi
INNER JOIN tb_member ON tb_transaksi.id_member=tb_member.id
INNER JOIN tb_outlet ON tb_transaksi.id_outlet=tb_outlet.id
INNER JOIN tb_user ON tb_transaksi.id_user=tb_user.id
WHERE tb_transaksi.id='$idtransaksi'")); 

if (isset($_POST['pilih_paket'])) {
    $qty = $_POST['qty'];
    $nama_paket = $_POST['nama_paket'];
    $row_paket = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_paket WHERE nama_paket='$nama_paket'"));
    $harga_paket = $row_paket['harga'];
    $total_harga = $qty * $harga_paket;
    $id_paket = $row_paket['id'];
    $keterangan = $_POST['keterangan'];
    mysqli_query($koneksi, "INSERT INTO tb_detail_transaksi VALUES(NULL, '$idtransaksi', '$id_paket', '$qty', '$keterangan', '$harga_paket', '$total_harga')");
    // header("Location: " . $_SERVER['REQUEST_URI']);
    echo "<script>window.location.href=window.location.href</script>";
}


if (isset($_POST['bayar_sekarang'])) {
    mysqli_query($koneksi, "UPDATE tb_transaksi SET dibayar='dibayar' WHERE id='$idtransaksi'");
    // header("Location: " . $_SERVER['REQUEST_URI']);
    echo "<script>window.location.href=window.location.href</script>";
}


if ($data_transaksi['dibayar'] == 'belum_dibayar') {
    $pembayaran = "Belum Bayar";
    $warna = "#ffbc00";
} else {
    $pembayaran = "Lunas";
    $warna = "#60dd60";
}


if (isset($_POST['tombol_biaya_tambahan'])) {
    $biaya_tambahan = $_POST['biaya_tambahan'];
    mysqli_query($koneksi, "UPDATE tb_transaksi SET biaya_tambahan='$biaya_tambahan' WHERE id='$idtransaksi'");
    // header("Location: " . $_SERVER["REQUEST_URI"]);
    echo "<script>window.location.href=window.location.href</script>";
}
?>

<br>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        body{
            font-family: 'roboto';
            background-color: #f7f7f7;
        }
        
        h3{
            margin-top: 20px;
            font-weight: bold;
        }

        .tabel{
            width: 50%;
            border: 3px solid <?=$warna?>;
        }

        /* form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px;
        } */
        form span {
            text-align: left;
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color:  #3751FE;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .nama{
            border: 2px solid #3751FE;
            text-align: center;
            width: 100%;
        }

        .cetak{
            width: 100px;
            color: #f7f7f7;
            background-color: #3751FE;
            border: 1px solid #3751FE;
            border-radius: 5px;
            padding: 5px;
        }

        /* Style untuk form */
        form {
        max-width: 630px;
        margin: 0 auto;
        }

        /* Style untuk setiap elemen dalam form */
        form span {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        }

        /* Style untuk input text dan number */
        form input[type="text"],
        form input[type="number"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box; /* Menyertakan padding dan border dalam width */
        }

        /* Style untuk input submit */
        form input[type="submit"] {
        width: 100%;
        background-color: #3751FE;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        /* Style untuk input submit saat dihover */
        form input[type="submit"]:hover {
        background-color: #ccc;
        }

        /* Style untuk datalist */
        datalist {
        display: none; /* Sembunyikan datalist */
        }


    </style>
</head>
<body>
    <center>
    <h3>
        <?=$pembayaran?>
    </h3>

    <table border="1" cellspacing="0" class="tabel">
        <tbody>
            <tr>
                <td>Kode Invoice</td>
                <td><?=$data_transaksi['kode_invoice'];?></td>
            </tr>
            <tr>
                <td>Nama Pelanggan</td>
                <td><?=$data_transaksi['nama_member'];?></td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td><?=$data_transaksi['tlp'];?></td>
            </tr>
            <tr>
                <td>Alamat Pelanggan</td>
                <td><?=$data_transaksi['alamat'];?></td>
            </tr>
            <tr>
                <td>Nama Kasir</td>
                <td><?=$data_transaksi['nama'];?></td>
            </tr>
            <tr>
                <td>Ambil Sebelum</td>
                <td>
                    <?php
                    $ambil_sebelum = $data_transaksi['batas_waktu'];
                    $pecah_string_tanggal = explode(" ", $ambil_sebelum);
                    $pecah_string_hari = explode("-", $pecah_string_tanggal[0]);
                    $pecah_string_jam = explode(":", $pecah_string_tanggal[1]);
                    echo "Tanggal : ".$pecah_string_hari[2]."-".$pecah_string_hari[1]."-".$pecah_string_hari[0];
                    echo "<br>";
                    echo "Jam : ".$pecah_string_jam[0].":".$pecah_string_jam[1];
                    ?>
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select 
                    onchange="pilihStatus(this.options[this.selectedIndex].value, <?=$data_transaksi['id_transaksi']?>)">
                    <option value="baru" <?php if($data_transaksi['status']=='baru'){echo "selected"; }?>>Baru</option>
                    <option value="proses" <?php if($data_transaksi['status']=='proses'){echo "selected"; }?>>Proses</option>
                    <option value="selesai" <?php if($data_transaksi['status']=='selesai'){echo "selected"; }?>>Selesai</option>
                    <option value="diambil" <?php if($data_transaksi['status']=='diambil'){echo "selected"; }?>>Sudah Diambil</option>
                    </select>
                    <script>
                        function pilihStatus(value, id) {
                        window.location.href = '../edit/proses_edit_status.php?status=' + value + '&id=' + id;
                        }
                    </script>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>

    <?php
        if ($data_transaksi['dibayar']=='belum_dibayar'){
    ?>

    <!-- input paket -->
    <form action="" method="POST">
    <span>Nama Paket</span>
    <input type="text" name="nama_paket" list="nama_paket" autocomplete="off" required>
    <datalist id="nama_paket">
        <?php
            $id_outlet = $data_transaksi['id_outlet'];
            $query_paket = mysqli_query($koneksi, "SELECT nama_paket FROM tb_paket WHERE id_outlet='$id_outlet'");
            while($data_paket = mysqli_fetch_assoc($query_paket)){
        ?>
        <option value="<?=$data_paket['nama_paket']?>"></option>
        <?php
            }
        ?>
    </datalist>

    <span>Jumlah</span>
    <input type="number" name="qty" required>

    <span>Keterangan</span>
    <input type="text" name="keterangan" autocomplete="off">

    <input type="submit" value="Masukkan Paket" name="pilih_paket">
    </form>
    <?php
    }
    ?>
    <br>

    <!-- biaya tambahan -->
    <?php
        if ($data_transaksi['dibayar']=='belum_dibayar'){
    ?>
    <form action="detail_transaksi.php" method="POST">
        <table>
        <tr>
        <td>
        <input type="number" placeholder="Biaya Tambahan" name="biaya_tambahan">
        <input type="submit" value="tambah" name="tombol_biaya_tambahan">
        </td>
        </tr>
        </table>
    </form>
    <?php
    }
    ?>
    <br>
    <!-- biaya tambahan -->

    <!-- tabel transaksi -->
    <br>
    <table border="1" cellspacing="0" style="width: 50%;" class="nama">
        <thead class="nama">
            <tr style="font-weight: 700">
                <td>Nama Paket</td>
                <td align="center">Keterangan</td>
                <td align="center">Jumlah</td>
                <td>Harga</td>
                <td align="right">Total Harga</td>
            </tr>
        </thead>
    <tbody>

    <?php
        $result_detail = mysqli_query($koneksi, "SELECT * FROM tb_detail_transaksi WHERE id_transaksi='$idtransaksi'");
        while ($detail = mysqli_fetch_assoc($result_detail)) {
    ?>
    <tr>
    <td>

    <?php
        $idpaket = $detail['id_paket'];
        $paket = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT nama_paket, jenis, harga FROM tb_paket WHERE id='$idpaket'"));
        echo $paket['nama_paket'];
        echo "<br>";
        echo $paket['jenis'];
    ?>

    </td>
        <td align="right"><?=$detail['keterangan']?></td>
        <td align="center"><?=$detail['qty']?></td>
        <td><?=number_format($detail['harga_paket'], 0, ',', '.')?></td>
        <td align="right" style="font-weight:700">
        Rp.<?=number_format($detail['total_harga'], 0, ',', '.')?>

    <?php
        if ($data_transaksi['dibayar']=='belum_dibayar'){
    ?>

    <form action="../delete/delete_paket_detail.php" method="GET">
        <input type="text" name="id" hidden value="<?=$detail['id']?>">
        <td><button type="Submit">delete</button></td>
    </form>

    <?php
    }
    ?>

    </tr>
    <?php
    }
    ?>

    <?php
        $grand_total = mysqli_fetch_row(mysqli_query($koneksi, "SELECT SUM(total_harga) FROM tb_detail_transaksi INNER JOIN tb_paket ON tb_detail_transaksi.id_paket=tb_paket.id WHERE id_transaksi='$idtransaksi'"));

        if (!$grand_total[0] =='0') {
    ?>
    <tr>
        <td colspan="4" style="font-weight:700" align="right">Pajak</td>
        <td align="right" style="font-weight:700">
            <?php
            echo "0,75";
            echo "<br>";
            $pajak = $grand_total[0] * $data_transaksi['pajak'];
            echo "Rp.".number_format($pajak, 0, ',', '.');
            ?>
        </td>
    </tr>

    <?php
        }
        if ($data_transaksi['biaya_tambahan']!='0'){
    ?>

    <tr>
        <td colspan="4" style="font-weight: 700" align="right">Biaya Tambahan</td>
        <td align="right" style="font-weight:700">
        <?= "Rp.".number_format($data_transaksi['biaya_tambahan'], 0, ',', '.')?>
        </td>
    </tr>

    <!--diskon-->
    <?php
        }
        if($data_transaksi['diskon']!='0'){
    ?>
    <tr>
        <td colspan="4" style="font-weight:700" align="right">Diskon</td>
        <td align="right" style="font-weight:700">
            <?php
            echo "10%";
            echo "<br>";
            $diskon = $grand_total[0] * $data_transaksi['diskon'];
            echo "Rp. ".number_format($diskon, 0, ',', '.');
            ?>
        </td>
    </tr>

    <?php
        }
        $diskon = 0;
    ?>
    <tr>
        <td colspan="4" style="font-weight:700" align="right">Total Keseluruhan</td>
        <td align="right" style="font-weight:700">
            <?php
            @$total_keseluruhan = ($grand_total[0] + $data_transaksi['biaya_tambahan'] + $pajak) - $diskon; 
            echo "Rp. ".number_format($total_keseluruhan, 0, ',', '.');
            ?>
        </td>
    </tr>
    </tbody>
    </table><br>
    <!-- tabel transaksi -->

    <!-- tombol bayar sekarang -->
    <form action="detail_transaksi.php" method="POST">
        <table>
            <tr>
                <td>
                    <input type="submit" <?php if($data_transaksi['dibayar']=='dibayar') echo "hidden"; ?> value="Bayar Sekarang" name="bayar_sekarang" onclick="return confirm('Apakah mau bayar sekarang?')">
                </td>
            </tr>
        </table>
    </form>
<!-- tombol bayar sekarang -->

<button class="cetak" onclick="cetak()" style="width: 150px; margin-bottom:20px;">Cetak</button>
    <script>
        // Fungsi untuk mencetak halaman
        function cetak() {
            window.print();
        }
    </script>
</center>
</body>
</html>