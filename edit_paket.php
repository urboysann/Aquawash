<?php
session_start();
include "../koneksi.php";
include "../dashboard/dashboard.php";
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM tb_paket WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Paket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Roboto';
            background-color: #f7f7f7;
        }

        h1 {
            font-size: 40px;
            color: #3751FE;
            font-weight: bolder;
            text-align: center;
        }

        .container-box {
            max-width: 900px;
            margin: auto;
            margin-top: 80px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #3751FE;
        }

        .form-label {
            margin-bottom: 5px;
        }

        .form-select{
            border: 1px solid #3751FE;
            width: 92%;
        }
        
        .input-group{
            width: 92%;
        }

        .form-control {
            border: 1px solid #3751FE;
            width: 92%;
        }

        .btn-success {
            width: 100px;
            background-color: #3751FE;
            border-radius: 0px;
            margin-top: 20px;
        }

        .image-container {
            text-align: center;
            max-width: 80%;
        }

        .image-container img {
            max-width: 90%;
            height: auto;
            margin-left: 50px;
        }
    </style>
</head>

<body>
    <div class="container-box">
        <h1>Edit Paket</h1>
        <br>
        <div class="row">
        <div class="col-md-6">
        <form action="proses_edit_paket.php" method="POST">
            
        <div class="mb-3">
            <input type="text" hidden name="id" value="<?= $data['id'] ?>">
            <label for="jenis" class="form-label">Jenis Paket</label>
            <select class="form-select" name="jenis">
        <!-- Pilihan default dari database -->
        <option value="<?= $data['jenis'] ?>" selected><?= $data['jenis'] ?></option>

        <!-- Opsi tambahan yang dapat dipilih -->
        <option value="kiloan">Kiloan</option>
        <option value="selimut">Selimut</option>
        <option value="bed_cover">Bed Cover</option>
        <option value="kaos">Kaos</option>
        <option value="lain">Lainnya</option>  
        <!-- Tambahkan opsi sesuai kebutuhan -->
    </select>
</div>

            <div class="mb-3">
                <label for="nama_paket" class="form-label">Nama Paket</label>
                <input type="text" class="form-control" name="nama_paket" value="<?php echo $data['nama_paket']?>">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" name="harga" value="<?php echo $data['harga']?>">
            </div>
            <div class="mb-3">
                <button class="btn btn-success" type="submit">Simpan</button>
            </div>
            </div>
            <div class="col-md-6">
                    <div class="image-container">
                        <img src="../img/paket.svg" alt="Image">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

</body>

</html>
