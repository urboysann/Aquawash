<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .table-container {
            max-width: 800px;
            margin: auto;
            margin-top: 50px;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <center>
        <div class="table-container">
            <h1>
                List Transaksi
            </h1>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode_Invoice</th>
                        <th>Status</th>
                        <th>Dibayar</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../koneksi.php";
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi");
                    while($baris = mysqli_fetch_assoc($query)){
                ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$baris['kode_invoice']?></td>
                        <td><?=$baris['status']?></td>
                        <td><?=$baris['dibayar']?></td>
                        <td>
                            <a class="btn" href="../detail/detail_transaksi.php?id=<?=$baris['id']?>">
                            <i class="fa-solid fa-circle-info fa-2xl" style="color: #FFD43B;"></i>
                            </a>
                        </td>

                        <td><a class="btn" href="../delete/delete_transaksi.php?id=<?=$baris['id']?>">
                        <i class="fa-solid fa-trash fa-2xl" style="color: #ff0000;"></i>
                        </a>
                        </td>

                        <td><a class="btn btn-success" href="../member/tambah_transaksi.php?">
                        Kembali
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
