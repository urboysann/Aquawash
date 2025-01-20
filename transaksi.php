<?php
session_start();
include '../koneksi.php';
include '../dashboard/dashboard.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <style>
        body {
            font-family: 'roboto';
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 70px auto;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #3751FE;
            margin-top: 150px;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            font-weight: bolder;
            color: #3751FE;
        }

        .form-group {
            margin-bottom: 20px;
            color: #3751FE;
            font-weight: bold;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #3751FE;
            border-radius: 5px;
            box-sizing: border-box;
            
        }

        input[type="submit"] {
            width: 20%;
            padding: 7px;
            border: none;
            background-color: #3751FE;
            color: #fff;
            cursor: pointer;
            margin-top: 5px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Entri Transaksi</h1>
        <form action="proses_entri_transaksi.php" method="post">
            <div class="form-group">
                <label for="nama_member">Nama Pelanggan</label>
                <input type="text" list="nama_pelanggan" name="nama_member" id="nama_member" autocomplete="off" placeholder="Cari Nama Pelanggan">
                <datalist id="nama_pelanggan">
                <?php
                    $query_member = mysqli_query($koneksi, "SELECT nama_member FROM tb_member");
                    while ($data_member = mysqli_fetch_assoc($query_member)) {
                ?>
                    <option value="<?= $data_member['nama_member'] ?>"</option>
                <?php
                    }
                ?>

                </datalist>
            </div>
           
            <div class="form-group">
                <input type="submit" value="Selanjutnya" name="selanjutnya">
            </div>
        </form>
    </div>
</body>
</html>
