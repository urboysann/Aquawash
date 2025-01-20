<?php
    include '../dashboard/dashboard.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Paket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" >
    <link rel="icon" href="../img/Aqua.png" type="image/x-icon">
    <style>
        body{
            font-family: 'roboto';
            background-color: #f7f7f7;
        }
        h1{
            font-size: 35px;
            font-weight: bolder;
            color: #3751fe;
        }
        
        .harga{
            text-align: center;
        }
        .table-container {
            max-width: 900px;
            margin: auto;
            margin-top: 20px;
            border: 2px solid #3751fe;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        
        .form-control {
            background-color: white;
            border: 1px solid #3751fe;
            width: 300px;
        }


        .btn-primary{
            margin-right: 80%;
            background-color: #3751fe;
            margin-bottom: 20px;
        }

        .judul{
            margin-top: 70px;
        }
    </style>
</head>

<body>

    <center>
        <div class="judul">
            <h1>
                Daftar Paket
            </h1>
        </div>
        <div class="table-container">
        <td>
            <a class="btn btn-primary" href="../paket/tambah_paket.php">
                <i class="fa-solid fa-plus"></i>
                Tambah Paket
            </a>
        </td>
            <table class="table">
                <thead>
                    <tr>
                        <th style="color: #3751fe;">No</th>
                        <th style="color: #3751fe;">Jenis Paket</th>
                        <th style="color: #3751fe;">Nama Paket</th>
                        <th style="color: #3751fe;">Harga Paket</th>
                        <th colspan="2" style="color: #3751fe;">Edit / Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../koneksi.php";
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_paket");
                    while($baris = mysqli_fetch_assoc($query)){
                ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$baris['jenis']?></td>
                        <td><?=$baris['nama_paket']?></td>
                        <td class="harga"><?=$baris['harga']?></td>
                        <td>
                            <a class="btn" href="../edit/edit_paket.php?id=<?=$baris['id']?>">
                            <i class="fa-solid fa-pen-to-square fa-xl" style="color: #3751fe;"></i>
                            </a>

                            <a class="btn" href="../delete/delete_paket.php?id=<?=$baris['id']?>">
                            <i class="fa-solid fa-trash fa-xl" style="color: #3751fe;"></i>
                            </a>
                            </td>

                    </tr>
                    <?php   
                }
                ?>
                </tbody>
            </table>
        </div>
    </center>
</body>

</html>
