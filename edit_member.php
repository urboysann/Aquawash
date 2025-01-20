<?php
session_start();
include '../dashboard/dashboard.php';
include "../koneksi.php";
$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM tb_member WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            font-family: 'roboto';
            background-color: #f7f7f7;
        }

        h1 {
            font-size: 40px;
            color: #3751FE;
            font-weight: bolder;
            text-align: center;
        }

        .container-box {
            max-width: 70%;
            margin: auto;
            margin-top: 4%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #3751FE;
        }

        .form-label {
            margin-bottom: 5px;
        }

        .form-control {
            border: 1px solid #3751FE;
            width: 100%;
        }

        .btn-success {
            width: 100px;
            background-color: #3751FE;
            border-radius: 0px;
            margin-top: 10px;
        }

        .btn-secondary {
            width: 100px;
            border-radius: 0px;
            margin-top: 10px;
        }

        .image-container {
            text-align: center;
            max-width: 80%;
        }

        .image-container img {
            max-width: 90%;
            height: auto;
            margin-left: 50px;
            margin-top: 20px;
        }

        .form-select{
            border: 1px solid #3751FE;
        }
    </style>
</head>

<body>
    <div class="container-box">
        <h1>Edit Member</h1>
        <br>
        <div class="row">
        <div class="col-md-6">
        <form action="proses_edit_member.php" method="POST">
            <div class="mb-3">
                <input type="text" hidden name="id" value="<?= $data['id']?>">
                <label for="nama" class="form-label">Nama Member</label>
                <input type="text" class="form-control" name="nama_member" value="<?php echo $data['nama_member']?>">
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']?>">
            </div>

            <div class="mb-3">
            <input type="text" hidden name="id" value="<?= $data['id'] ?>">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select class="form-select" name="jenis_kelamin">
            <!-- Pilihan default dari database -->
            <option value="<?= $data['jenis_kelamin'] ?>" selected><?= $data['jenis_kelamin'] ?></option>

            <!-- Opsi tambahan yang dapat dipilih -->
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
            <!-- Tambahkan opsi sesuai kebutuhan -->
            </select>
            </div>

            <div class="mb-3">
                <label for="tlp" class="form-label">No Telephone</label>
                <input type="text" class="form-control" name="tlp" value="<?php echo $data['tlp']?>">
            </div>
            </div>
            <div class="col-md-6">
                <div class="image-container">
                    <img src="../img/member.svg" alt="Image">
                </div>
            </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-success" type="submit">Simpan</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

</body>

</html>
