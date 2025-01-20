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
    <title>Tambah Paket</title>
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
        }

        .container-box {
            max-width: 900px;
            margin: auto;
            margin-top: 60px;
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
        }

        .image-container {
            text-align: center;
            max-width: 80%;
        }

        .image-container img {
            max-width: 90%;
            height: auto;
            margin-left: 50px;
            margin-top: 25px;
        }
        .judul{
            text-align: center;
        }
    </style>
</head>

<body>
    <form action="proses_tambah_paket.php" method="post">
        <div class="container-box">
        <div class="judul">
            <h1>Tambah Paket</h1>
        </div>
        <div class="row">
        <div class="col-md-6">
        
            <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Outlet</label>
                <div class="input-group">
                    <select name="id_outlet" class="form-select" id="id_outlet">
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_outlet");
                        while ($hasil = mysqli_fetch_assoc($query)) {
                        ?>
                        <option value="<?= $hasil['id']; ?>"><?= $hasil['nama']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Jenis</label>
                <br>
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="jenis" id="btnradio1" autocomplete="off" value = "kiloan" checked>
                    <label class="btn btn-outline-primary" for="btnradio1">Kiloan</label>

                    <input type="radio" class="btn-check" name="jenis" id="btnradio2" autocomplete="off" value = selimut>
                    <label class="btn btn-outline-primary" for="btnradio2">Selimut</label>

                    <input type="radio" class="btn-check" name="jenis" id="btnradio3" autocomplete="off" value = bed_cover>
                    <label class="btn btn-outline-primary" for="btnradio3">Bed Cover</label>

                    <input type="radio" class="btn-check" name="jenis" id="btnradio4" autocomplete="off" value = kaos>
                    <label class="btn btn-outline-primary" for="btnradio4">Kaos</label>

                    <input type="radio" class="btn-check" name="jenis" id="btnradio5" autocomplete="off" value = lain>
                    <label class="btn btn-outline-primary" for="btnradio5">Lainnya</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="nama_outlet" class="form-label">Nama Paket</label>
                <input type="text" class="form-control" id="nama_paket" placeholder="Nama Paket" name="nama_paket">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Paket</label>
                <input type="text" class="form-control" id="tlp" placeholder="Harga paket" name="harga">
            </div>
            </div>
            <div class="col-md-6">
                    <div class="image-container">
                        <img src="../img/paket.svg" alt="Image">
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
