<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap">
    <style>
        body {
            font-family: 'roboto';
            font-size: 16px;
        }

        .login-box {
            margin-left: 100px;
        }

        .right-grid {
            background-color: #f7f7f7;
            height: auto;
            padding: 20px;
            text-align: center;
        }

        .logo {
            width: 110px; 
            margin-bottom: 15px;
        }

        h1 {
            font-family: 'roboto';
            color: #3751FE;
            font-size: 36px;
            font-weight: bolder;
        }

        h2 {
            font-family: 'roboto';
            color: #3751FE;
            font-size: 33px;
            font-weight: bold;
        }

        h6 {
            font-family: 'roboto';
            color: #000000;
            opacity: 60%;
            font-size: 14px;
        }

        .form-label {
            color: #000000;
            opacity: 60%;
        }

        .navbar {
            background-color: transparent; /* Set the background color of the navbar to transparent */
        }

        .navbar-nav {
            width: 100%;
            justify-content: center; /* Center-align the navbar items */
        }

        .navbar-nav .nav-link {
            color: #000000;
            font-size: 16px;
            margin-left: 40px;
            margin-right: 50px;
        }

        .form-check {
            color: black;
            opacity: 60%;
        }

        .form-control {
            font-size: 15px;
            width: 480px;
        }

        .navbar-nav .nav-item a {
            position: relative;
            text-decoration: none;
            color: #000000;
            font-size: 16px;
        }

        .navbar-nav .nav-item a:hover {
            color: #3751FE; 
        }

        .navbar-nav .nav-item a::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #3751FE;
            visibility: hidden;
            transform: scaleX(0);
            transition: all 0.3s ease-in-out;
        }

        .navbar-nav .nav-item a:hover::before {
            visibility: visible;
            transform: scaleX(1);
        }

        .btn-primary {
            font-family: 'roboto';
            width: 100px;
            height: 40px; 
            text-align: center;
            border-radius: 0; 
        }

        
        .btn-outline-primary {
            margin-left: 10px;
            font-family: 'roboto';
            width: 100px;
            height: 40px; 
            text-align: center;
            border-radius: 0;
        }

        .right-grid img {
            max-width: 100%; 
            margin-top: 50px;
            width: 60%; 
        }

        .form-control::placeholder {
        color: #3751FE; 
        }

        
    </style>
    <title>Login</title>
</head>
<body>

    <div>
        <div class="row">
            <div class="col-md-6">
                <div class="login-box">
                    <img src="../img/Aqua.svg" alt="Logo" class="logo">
                    <h1>Pakaian Bersih</h1>
                    <h2>Hati Anda Senang</h2>
                    <h6>Selamat Datang kembali! Silahkan masuk ke akun anda.</h6>
                    <br>
                    <form action="proses_login_dekripsi.php" method="POST">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="formGroupExampleInput"
                                placeholder="Masukan Username Anda">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="formGroupExampleInput2"
                                placeholder="**************">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Ingatkan saya
                            </label>
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-primary btn-md mb-5">Login</button>
                        <button type="button" class="btn btn-outline-primary btn-md mb-5" disabled>Sign Up</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6 right-grid opacity">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="../awal.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../awal.php#about">About us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../awal.php#contact">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <img src="../img/Login.svg">
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>
</html>
