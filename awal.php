<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aqua Wash</title>
    <link rel="icon" href="img/Aqua.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            position: relative;
            height: 100vh;
            font-family: 'open sans', sans-serif;
        }

        h1 {
            font-size: 40px;
            font-weight: bold;
        }

        h2 {
            font-size: 15px;
        }

        header {
            position: relative;
        }

        nav {
            position: absolute;
            top: 0;
            left: 45%;
            transform: translateX(-50%);
            display: flex;
            justify-content: end;
            padding: 0.5em;
            width: 100%;
            box-sizing: border-box;
            border-radius: 5px;
        }

        img {
            max-width: 100%;
            height: auto;
            position: relative;
        }

        .text-overlay {
            position: absolute;
            top: 45%;
            left: 23%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 18px;
            font-weight: bold;
            backdrop-filter: blur(20px); 
            padding: 15px; 
            border-radius: 20px; 
            display: flex;
            align-items: center; 
        }

        .text-overlay img {
            max-width: 90px; 
            margin-right: 10px; 
        }

        .nav-pills .nav-link {
            color: white;
            position: relative;
            transition: color 0.3s; 
        }

        .nav-pills .nav-link::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: transparent;
            transform-origin: bottom right;
            transform: scaleX(0);
            transition: transform 0.3s ease-out, background-color 0.3s;
        }

        .nav-pills .nav-link:hover::before,
        .nav-pills .nav-link:focus::before {
            transform: scaleX(1);
            background-color: #3751FE; 
        }

        .nav-pills .nav-link.active {
            border-radius: 20px; 
            width: 100px;
            background-color: #3751FE;
        }

        .isi{
            padding: 20px;
        }

        .text-overlay h2 {
            margin-bottom: 10px; 
        }

        .btn{
            border-radius: 20px;
            width: 100px;
        }

        /* Styling for content section */
        .content-section {
            margin-top: 100px; /* Adjust the margin as needed */
            padding: 50px 0; /* Adjust the padding as needed */
            background-color: #f8f9fa; /* Set background color for content section */
        }

        .content-section h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .content-section p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .content-section ul {
            margin-bottom: 20px;
        }

        .content-section ul li {
            font-size: 16px;
            list-style-type: square;
            margin-left: 20px;
        }

        .content-section .container {
            max-width: 1200px;
        }

        .service-card, .reason-card {
            background-color: #f8f9fa; /* Warna latar belakang */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .service-card h2, .reason-card h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #3751FE; /* Warna teks */
        }

        .service-card p, .reason-card p {
            font-size: 16px;
            margin-bottom: 20px;
            color: #555; /* Warna teks */
        }

        .service-card ul, .reason-card ul {
            margin-bottom: 20px;
            padding-left: 20px;
        }

        .service-card ul li, .reason-card ul li {
            font-size: 16px;
            list-style-type: square;
            margin-bottom: 10px;
            color: #555; /* Warna teks */
        }

        @media (max-width: 767px) {
            .service-card, .reason-card {
                margin-bottom: 30px;
            }
        }

        /* Styling for footer section */
        .footer {
            background-color: #3751FE;
            color: white;
            padding: 50px 0;
        }

        .footer h3 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .footer ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer ul li {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .footer ul li a {
            color: white;
            text-decoration: none;
        }

        .footer ul li a:hover {
            text-decoration: underline;
        }

        .map-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: flex-start;
}

.map {
    flex: 1;
    margin-right: 20px;
    max-width: 1000px; /* Mengatur lebar maksimum peta */
    height: 300px; /* Membuat tinggi peta menyesuaikan lebar */
}

.map iframe {
    width: 100%;
    height: 100%;
    border: 0;
}


.map-info {
    flex: 1;
}

.map-info h2 {
    font-size: 24px;
    font-weight: bold;
}

.map-info p {
    font-size: 16px;
    margin-bottom: 10px;
}

    </style>
</head>
<body>
    <header>
        
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/4.png" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="img/5.png" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="img/3.png" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
        </div>

        <div class="text-overlay">
            <div class="isi">
                <img src="img/Aqua.png" class="foto">
                <h1>Hemat Waktu</h1>
                <h1>Bersih Berarti</h1>
                <h2>Dengan dedikasi tinggi untuk kebersihan dan</h2>
                <h2>pelayanan pelanggan yang luar biasa, laundry kami</h2>
                <h2>menawarkan pengalaman mencuci yang tak tertandingi</h2>
                <h2>memastikan pakaian Anda tetap bersih, segar,</h2>
                <h2>dan terjaga kualitasnya setiap saat.</h2>
                <a class="btn btn-outline-primary" href="#about" role="button">Jelajahi</a>
            </div>
        </div>

        <nav>
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="awal.php">
                        <b>HOME</b>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">
                        <b>ABOUT</b>
                    </a>
                </li>
                <li class="nav-item2">
                    <center>
                        <a class="nav-link active" aria-current="page" href="login/login.php">Login</a>
                    </center>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Bagian konten di bawah header -->
    <section id="about" class="content-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="service-card">
                    <center><h2>Layanan Kami</h2></center>
                    <p>Temukan berbagai layanan laundry kami yang disesuaikan dengan kebutuhan Anda:</p>
                    <ul>
                        <li>Cuci Kiloan</li>
                        <li>Cuci Selimut</li>
                        <li>Cuci Bed Cover</li>
                        <li>Cuci Kaos</li>
                        <li>Cuci Lainnya</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="reason-card">
                    <center><h2>Mengapa Memilih Kami?</h2></center>
                    <p>Berikut adalah beberapa alasan mengapa Aqua Wash adalah pilihan terbaik untuk layanan laundry:</p>
                    <ul>
                        <li>Pembersihan Berkualitas Tinggi</li>
                        <li>Waktu Pengerjaan Cepat</li>
                        <li>Staf Profesional</li>
                        <li>Harga Yang Terjangkau</li>
                        <li>Pelayanan Cepat</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bagian konten di bawah header -->
<section class="content-section">
    <div class="container">
        <!-- Konten lainnya di sini -->

        <!-- Tambahkan peta dan teks di sini -->
        <div class="map-container">
            <!-- Kode iframe untuk peta -->
            <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.1086487473494!2d115.22774247402003!3d-8.681217191366887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd240fa2743dfbb%3A0xfa3e4f0491f53625!2sJl.%20Tukad%20Batanghari%2046-30%2C%20Panjer%2C%20Denpasar%20Selatan%2C%20Kota%20Denpasar%2C%20Bali%2080234!5e0!3m2!1sid!2sid!4v1712825371726!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <!-- Teks di sebelah kanan peta -->
            <div class="map-info">
                <h2 style="color: #3751FE; font-size: 30px;">Lokasi Kami</h2>
                <p style="font-size: 18px;">Temukan kami di alamat berikut:</p>
                <p style="font-size: 18px;">Jl. Tukad Batanghari 46-30, Panjer, Denpasar Selatan, Kota Denpasar, Bali 80234</p>
                <p style="font-size: 18px;">Hubungi kami melalui telepon di +62893018308</p>
            </div>
        </div>
    </div>
</section>

    <footer id="contact" class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>Contact Us</h3>
                    <ul>
                        <li><i class="fas fa-envelope"></i> Email: info@aqua-wash.com</li>
                        <li><i class="fas fa-phone"></i> Phone: +62893018308</li>
                        <li><i class="fas fa-map-marker-alt"></i> Alamat: Jl. Tukad Batanghari 46-30, Panjer, Denpasar Selatan, Kota Denpasar, Bali 80234</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h3>Follow Us</h3>
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-eSLQdehcs3pukC/4ZrUnrdFkPymU2V86kbxjxzSG/ZZZbDYU0gkFblD5Ac/E1MZ5" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>
    
</body>
</html>
