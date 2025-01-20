<?php
session_start();
include '../koneksi.php';
include '../dashboard/dashboard.php';
if (@$_GET['status']=='baru'){
    $status = "WHERE status='baru'";
}elseif (@$_GET['status'] == 'proses'){
    $status = "WHERE status='proses'"; }
elseif (@$_GET['status']=='selesai'){
    $status = "WHERE status='selesai'"; }
elseif (@$_GET['status'] == 'diambil'){
    $status = "WHERE status='diambil'"; }
else{
    $status = "";
}


if (@$_SESSION['role'] == 'admin' OR @$_SESSION['role'] == 'owner'){        //jika login sebagai admin atau owner, tampilkan semua transaksi di database tanpa where id outlet
    $query = mysqli_query($koneksi, "SELECT *, tb_outlet.id AS id_outlet_tb_outlet, tb_outlet.nama AS nama_outlet, tb_transaksi.id AS id_transaksi, tb_member.nama_member AS nama_member FROM tb_detail_transaksi
    INNER JOIN tb_transaksi ON tb_detail_transaksi.id_transaksi=tb_transaksi.id
    INNER JOIN tb_member ON tb_transaksi.id_member=tb_member.id
    INNER JOIN tb_paket ON tb_detail_transaksi.id_paket=tb_paket.id
    INNER JOIN tb_outlet ON tb_transaksi.id_outlet=tb_outlet.id
    INNER JOIN tb_user ON tb_transaksi.id_user=tb_user.id $status GROUP BY tb_transaksi.kode_invoice");
}else{
    $id_outlet = $_SESSION['id_outlet'];
    if($status!=""){
        $outlet = "AND tb_outlet.id='$id_outlet'";
    }else{
        $outlet = "WHERE tb_outlet.id='$id_outlet'";
    }
    $query = mysqli_query($koneksi, "SELECT *, tb_outlet.id AS id_outlet_tb_outlet, tb_outlet.nama AS nama_outlet, tb_transaksi.id AS id_transaksi, tb_member.nama_member AS nama_member FROM tb_detail_transaksi
    INNER JOIN tb_transaksi ON tb_detail_transaksi.id_transaksi=tb_transaksi.id
    INNER JOIN tb_member ON tb_transaksi.id_member=tb_member.id
    INNER JOIN tb_paket ON tb_detail_transaksi.id_paket=tb_paket.id
    INNER JOIN tb_outlet ON tb_transaksi.id_outlet=tb_outlet.id
    INNER JOIN tb_user ON tb_transaksi.id_user=tb_user.id $status $outlet GROUP BY kode_invoice");
}


?>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-top: 40px;
            border: 1px solid #f2f2f2;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #3751FE;
            color: #f7f7f7;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button{
            background-color: #3751FE;
            color: #f7f7f7;
            border: #3751FE;
            border-radius: 5px;
            padding: 5px;
            width: 13%;
            margin-left: 10px;
        }
        a {
            text-decoration: none;
            color: inherit;
            font-weight: bold;
        }

        .batas-pengambilan {
            font-size: 0.9rem;
            font-style: italic;
        }
    </style>
</head>
<body>
<center>
    <br>
    <br>
    <form action="cetak_laporan.php" target="_blank" method="POST">
        <span>Tanggal Awal</span>
        <input type="date" name="masukkan_tgl_awal" required>
        <span>Tanggal Akhir</span>
        <input type="date" name="masukkan_tgl_akhir" require>
        <button type="submit" name="tombol_cetak_laporan">Generate Laporan</button>
    </form>
    <table border="1" cellspacing="0">
        <!-- judul kolom -->
        <thead>
            <tr>
                <th>Kode Invoice</th>
                <th>Nama Pelanggan</th>
                <th>Nama Paket</th>
                <th>
                    <select name="pilih_status" onchange="pilih_status (this.options[this.selectedIndex].value)">
                        <option value="">
                            Semua Status
                        </option>
                        <option value="baru" <?php if (@$_GET['status']=='baru') { echo "selected"; } ?>> Baru
                        </option>
                        <option value="proses" <?php if (@$_GET['status']=='proses') { echo "selected";}?>> Proses
                        </option>
                        <option value="selesai" <?php if (@$_GET['status']=='selesai') {echo "selected";}?>> Selesai
                        </option>
                        <option value="diambil" <?php if (@$_GET['status'] == 'diambil') {echo "selected"; } ?>> Diambil
                        </option>
                    </select>
                    <script>
                    function pilih_status(value, id) {
                        window.location.href = 'view_laporan.php?status=' + value +
                            '&id=' +
                            id;
                    }
                    </script>
                </th>
            </tr>
        </thead>
        <!-- judul kolom -->


        <tbody>
            <?php
                while($baris = mysqli_fetch_assoc($query)){
                if (@$_SESSION['role']=='admin' OR @$_SESSION['role'] == 'owner'){
            ?>
            <tr>
                <td align="left">Nama Outlet: <b><?=$baris ['nama_outlet']?></b></td>
            </tr>
            <?php
            }
            ?>

            <tr>
                <td align="left"> <?php
                $pecah_string_tanggal = explode(" ", $baris ['batas_waktu']);
                $pecah_string_hari = explode("-", $pecah_string_tanggal['0']);
                $pecah_string_jam = explode(":", $pecah_string_tanggal['1']);

                echo "Batas Pengambilan: ".$pecah_string_hari['2']."-".$pecah_string_hari['1']."-".$pecah_string_hari['0'];
                echo "<br>";
                echo "Jam ".$pecah_string_jam ['0'].":".$pecah_string_jam ['1'];
                echo "<br><br>";

                echo "<b>".$baris ['kode_invoice']."<b>";
                ?>
                </td>

                <td><?=$baris ['nama_member']?></td>


                <td align="left"><?php
                    $id_transaksi = $baris ['id_transaksi'];
                    $query_paket = mysqli_query($koneksi, "SELECT nama_paket, qty FROM tb_detail_transaksi INNER JOIN tb_paket ON tb_detail_transaksi.id_paket=tb_paket.id WHERE id_transaksi='$id_transaksi'");
                    while($data_paket = mysqli_fetch_assoc($query_paket)){
                        echo $data_paket ['nama_paket'];
                        echo "<br>";
                    }

                    echo "<br>";

                    $grand_total = mysqli_fetch_row(mysqli_query($koneksi, "SELECT SUM(total_harga) FROM tb_detail_transaksi INNER JOIN tb_paket ON tb_detail_transaksi.id_paket=tb_paket.id WHERE id_transaksi='$id_transaksi'"));
                    $pajak = $grand_total ['0'];
                    $diskon = $grand_total['0'];
                    $baris['pajak'];
                    $baris['diskon'];
                    $total_keseluruhan = ($grand_total['0']+$baris['biaya_tambahan']+$pajak)-$diskon;
                    echo "Total Harga: <b>Rp.". number_format($total_keseluruhan, 0, ',', '.')."</b>";
                ?>
                </td>

                <td>
                    <select
                        onchange="pilihStatus (this.options[this.selectedIndex].value, <?=$baris ['id_transaksi']?>)">
                        <option value="baru" <?php if($baris ['status']=='baru') {echo "selected";}?>>
                            Baru
                        </option>
                        <option value="proses" <?php if($baris ['status']=='proses') { echo "selected";}?>> Proses
                        </option>
                        <option value="selesai" <?php if($baris ['status']=='selesai') {echo "selected";}?>> Selesai
                        </option>
                        <option value="diambil" <?php if($baris ['status'] == 'diambil') { echo "selected"; } ?>>
                            Diambil
                        </option>
                    </select>
                    <script>
                    function pilihStatus(value, id) {
                        window.location.href = '../laporan/proses_edit_status_laporan.php?status=' + value +
                            '&id=' +
                            id;
                    }
                    </script>

                    <?php
                    if($baris['dibayar']=='belum_dibayar') {
                        $warna="#ffbc00";
                    }else{
                        $warna ="#60dd60";
                    }
                    ?>
                    <br>
                    <a style="color: <?=$warna?>"
                        href="../detail/detail_transaksi.php?idtransaksi=<?=$baris ['id_transaksi']?>">Lihat
                        Detail</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</center>
</body>
</html>