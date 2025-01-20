<?php
session_start();
include '../dashboard/dashboard.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Outlet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="icon" href="../img/Aqua.png" type="image/x-icon">
    <style>

        body {
            font-family: 'Roboto';
            background-color: #f7f7f7;
        }

        h1 {
            font-size: 40px;
            color: #3751FE;
            font-weight: bolder;
        }

        .container-box {
            max-width: 800px;
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

        
        .form-control {
            border: 1px solid #3751FE;
            width: 100%;
        }

        .btn-success {
            width: 100px;
            background-color: #3751FE;
            border-radius: 0px;
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

    <form action="proses_tambah.php" method="post">
        <div class="container-box">
            <div class="mb-3 text-center">
                <h1>Tambah Outlet Baru</h1>
            </div>
            <div class="row">
                <div class="col-md-6">
            <div class="mb-3">
                <label for="nama_outlet" class="form-label">Nama Outlet</label>
                <input type="text" class="form-control" id="nama_outlet" placeholder="Nama Outlet Baru" name="nama_outlet">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" placeholder="Alamat Outlet" name="alamat">
            </div>
            <div class="mb-3">
                <label for="tlp" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="tlp" placeholder="Ex : 08108018917 " name="tlp">
            </div>
            </div>
            <div class="col-md-6">
                    <div class="image-container">
                        <img src="../img/outlet.svg" alt="Image">
                    </div>
                </div>
            </div>
            <div class="mb-3">        
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Simpan
                </button>
            </div>
        </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Outlet</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah data yang anda input sudah benar? Silahkan melakukan pengecekan terlebih dahulu.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
