<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="icon" href="../img/Aqua.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
        body,
        h1,
        h2,
        h6,
        .navbar-brand,
        .nav-link,
        .dropdown-item {
            font-family: 'Roboto', sans-serif;
        }

        body{
            background-color: #f7f7f7;
        }

        .navbar {
            background-color: white;
        }

        .navbar-nav .nav-link,
        .dropdown-item {
            color: black; 
        }

        .container {
            margin-top: 100px; 
        }

        .welcome-text {
            text-align: center;
            margin-bottom: 30px;
        }

        .dashboard-content {
            text-align: center;
        }

        .navbar-brand img {
            width: 50px; 
            height: 50px; 
            margin-left: 20px; 
        }

        .navbar-nav .nav-link,
        .dropdown-item {
            position: relative;
            transition: color 0.3s ease-in-out, border-bottom 0.3s ease-in-out;
        }

        .navbar-nav .nav-link::before,
        .dropdown-item::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: transparent; 
            transition: background-color 0.3s ease-in-out;
        }

        .navbar-nav .nav-link:hover,
        .dropdown-item:hover {
            color: #3751FE; 
        }

        .navbar-nav .nav-link:hover::before,
        .dropdown-item:hover::before {
            background-color: blue; 
        }

        .navbar-nav .nav-item {
            margin-right: 20px; 
            margin-left: 30px;
        }

        .fa-solid{
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container-fluid">
                <a class="navbar-brand" href="../dashboard/dashboard.php">
                    <img src="../img/Aqua.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <?php
                        if(@$_SESSION['role']=='admin'){
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Data Master
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../view/view_outlet.php">Outlet</a></li>
                                <li><a class="dropdown-item" href="../view/view_paket.php">Paket</a></li>
                                <li><a class="dropdown-item" href="../registrasi/register.php">Pengguna</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../view/view_member.php">Registrasi Pelanggan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../transaksi/transaksi.php">Entri Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../laporan/view_laporan.php">Laporan</a>
                        </li>
                        <?php
                        }elseif(@$_SESSION['role']=='kasir'){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../view/view_member.php">Registrasi Pelanggan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../transaksi/transaksi.php">Entri Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../laporan/view_laporan.php">Laporan</a>
                        </li>
                        <?php
                        }else{
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../laporan/view_laporan.php">Laporan</a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fa-solid fa-user" style="color: #3751fe;"></i>
                                <?= $_SESSION['username'] ?>
                                <?= $_SESSION['id_outlet'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../logout/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </div>
</body>

</html>
