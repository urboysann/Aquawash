<?php
session_start();
include '../dashboard/dashboard.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" >
    <link rel="icon" href="../img/Aqua.png" type="image/x-icon">
        <style>
        body {
            font-family: 'roboto';
            background-color: #f7f7f7;
        }

        h1{
            font-size: 35px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #3751FE;
        }

        .table{
            background-color: white;
        }

        .table-container {
            max-width: 1100px;
            margin: auto;
            margin-top: 10px;
            border: 2px solid #3751FE;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .judul {
            margin-top: 60px;
            color: #3751FE;
            font-size: 50px;
        }

        .form-control {
            width: 330px; 
            padding: 0.375rem 0.75rem; 
            position: fixed;
            margin-left: 37%;
            background-color: #f7f7f7;
            border: 1px solid #3751FE;
            border-radius: 20px;
            margin-top: 30px;
        }

        .search-container {
        display: flex;
        align-items: center;
        position: relative;
        margin-bottom: 20px;
        }

        .search {
            position: absolute;
            left: 435px; 
            margin-top: 30px;
            background-color: transparent;
        }
        
        .member{
            margin-top: 50px;
        }

        .btn-primary{
            margin-right: 73%;
        }
    </style>
</head>

<body>

    <center>
        <div class="judul">
            <h1>
                Member Aqua Wash
            </h1>
        </div>


        <?php
            include "../koneksi.php";

            $search_query = '';

            if (isset($_POST['search_query'])) {
                $search_query = mysqli_real_escape_string($koneksi, $_POST['search_query']);
                $query = "SELECT * FROM tb_member WHERE nama_member LIKE '%$search_query%'";
            } else {
                $query = "SELECT * FROM tb_member";
            }

            $result = mysqli_query($koneksi, $query);
            $no = 1;
        ?>

        <!-- <div class="container-fluid">
            <form class="d-flex" method="post">
                <div class="search-container">
                    <span class="search">
                        <i class="fa-solid fa-magnifying-glass" style="color: #3751fe;"></i>
                    </span>
                    <input class="form-control me-2" type="search_query" placeholder="Cari Nama Member..." aria-label="Search" name="search_query">
                </div>
            </form>
        </div> -->
        <div class="member">
        <a class="btn btn-primary" href="../member/tambah_member.php?">
            <i class="fa-solid fa-plus fa-l"></i>
            Tambah Member
        </a>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th style="color: #3751fe;">Nomor</th>
                        <th style="color: #3751fe;">Nama</th>
                        <th style="color: #3751fe;">Alamat</th>
                        <th style="color: #3751fe;">Jenis Kelamin</th>
                        <th style="color: #3751fe;">Nomor Telepon</th>
                        <th colspan="2" style="color: #3751fe;"></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include "../koneksi.php";
                    $no = 1;
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_member");
                    while($baris = mysqli_fetch_assoc($query)){
                ?>
                    <tr>
                        <td style="padding:10px;"><?=$no++?></td>
                        <td style="padding:10px;"><?=$baris['nama_member']?></td>
                        <td style="padding:10px;"><?=$baris['alamat']?></td>
                        <td style="padding:10px;"><?=$baris['jenis_kelamin']?></td>
                        <td style="padding:10px;"><?=$baris['tlp']?></td>
                        <td>
                            <a class="btn" href="../edit/edit_member.php?id=<?=$baris['id']?>">
                            <i class="fa-solid fa-pen-to-square fa-xl" style="color: #3751fe;"></i>
                            </a>

                            <a class="btn" href="../delete/delete_member.php?id=<?=$baris['id']?>">
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
