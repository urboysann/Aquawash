<?php
session_start();
include_once "../koneksi.php";  
include '../dashboard/dashboard.php';
// if(!@$_SESSION['username']){
//     echo "<script>alert('Login Terlebih Dahulu');location.href='../login.php'</script>";
// } elseif(@$_SESSION['role']=='kasir'){
//     echo "<script>alert('Anda Kasir');location.href='../login.php'</script>";
// } else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .form-label {
            margin-bottom: 5px;
        }

        
        .form-control {
            border: 1px solid #3751FE;
            width: 100%;
        }

        .form-select{
            border: 1px solid #3751FE;
        }

        .btn-success {
            width: 100px;
            background-color: #3751FE;
            border-radius: 0px;
            margin-left: 12px;
        }

        .image-container {
            text-align: center;
            max-width: 80%;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            margin-left: 50px;
            margin-top: 40px;
        }
        .card{
            max-width: 900px;
            margin: auto;
            margin-top: 10px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #3751FE;
            margin-bottom: 30px;
        }
    </style>
    <title>Register</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3"></div>
                <div class="card">
                    <div class="card-body">
                        <h1><center>Tambah User</center></h1>
                        <div class="row">
                        <div class="col-md-6">
                        <form action="proses_register_enkripsi.php" method="POST">
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nama / Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="formGroupExampleInput">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="formGroupExampleInput">
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput2" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="formGroupExampleInput2">
                            </div>

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
                                <label for="formGroupExampleInput2" class="form-label">Role</label>
                                <br>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="role" id="btnradio1" autocomplete="off" value = "admin" checked>
                                    <label class="btn btn-outline-primary" for="btnradio1">Admin</label>

                                    <input type="radio" class="btn-check" name="role" id="btnradio2" autocomplete="off" value = "kasir">
                                    <label class="btn btn-outline-primary" for="btnradio2">Kasir</label>

                                    <input type="radio" class="btn-check" name="role" id="btnradio3" autocomplete="off" value = "owner">
                                    <label class="btn btn-outline-primary" for="btnradio3">Owner</label>
                                </div>
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="image-container">
                                    <img src="../img/user.svg" alt="Image">
                                </div>
                            </div>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Register
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Registrasi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah data yang anda input sudah benar? Silahkan melakukan pengecekan terlebih dahulu.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>

</html>
<?php
// }
?>
