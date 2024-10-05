<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amber Lee - Hair & Makeup Studio</title>
    <style>
        :root {
            --text-color: #333;             /* Warna Teks */
            --bg-color: #ffffff;            /* Putih */
            --card-bg: #f8f9fa;             /* Latar Belakang Kartu */
            --green-light: #A8E6CE;        /* Hijau Muda */
            --green-medium: #4DB6AC;       /* Hijau Tengah */
            --green-dark: #00796B;         /* Hijau Tua */
        }

        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
            line-height: 1.6; /* Menambah jarak antar baris */
        }

        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: var(--bg-color);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan */
        }

        .logo {
            font-size: 28px; /* Ukuran font logo lebih besar */
            font-weight: bold;
            color: var(--green-dark);
        }

        nav a {
            margin-left: 20px;
            text-decoration: none;
            color: var(--text-color);
            transition: color 0.3s; /* Efek transisi untuk hover */
        }

        nav a:hover {
            color: var(--green-medium); /* Mengubah warna saat hover */
        }

        .main-content {
            display: flex;
            flex: 1;
        }

        .text-section {
            flex: 2; /* Membuat text-section lebih besar */
            background-color: var(--green-light);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 50px;
            text-align: center; /* Rata tengah untuk teks */
        }

        .image-section {
            flex: 1; /* Mengurangi ukuran image-section */
            background-image: url('images/Surabaya.jpeg');
            background-size: cover;
            background-position: center;
        }

        h1 {
            font-size: 48px;
            margin-bottom: 20px;
            color: var(--green-dark);
        }

        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: var(--green-medium);
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            background-color: #005f51; /* Warna hijau tua untuk efek hover */
        }

        .sub-content {
            display: flex;
            flex-wrap: wrap; /* Menyesuaikan layout responsif */
            background-color: var(--bg-color);
            padding: 50px;
            gap: 20px; /* Jarak antar item */
        }

        .sub-content-item {
            flex: 1 1 300px; /* Responsif dengan ukuran minimum */
            padding: 20px;
            text-align: center;
            background-color: var(--card-bg);
            border-radius: 10px; /* Sudut membulat */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Bayangan */
            transition: transform 0.3s; /* Efek transisi saat hover */
        }

        .sub-content-item:hover {
            transform: translateY(-5px); /* Efek saat hover */
        }

        .sub-content-item h2 {
            color: var(--green-dark);
            margin-bottom: 15px;
        }

        .sub-content-item p {
            color: #666;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            h1 {
                font-size: 36px; /* Mengubah ukuran font untuk layar kecil */
            }

            .text-section {
                padding: 30px; /* Mengurangi padding pada layar kecil */
            }

            nav {
                flex-direction: column; /* Menumpuk link navigasi */
                align-items: flex-start; /* Rata kiri */
            }

            nav a {
                margin: 5px 0; /* Jarak antar link */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">AMBER LEE</div>
            <nav>
                <a href="#">Home</a>
                <a href="#">Services</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </nav>
        </header>
        <div class="main-content">
            <div class="text-section">
                <h1>SELAMAT DATANG DI SURABAYATANGGAP</h1>
                <p class="text-xl mb-6">Platform pengaduan masyarakat untuk kota Surabaya yang lebih baik.</p>
                <hr class="my-4">
                <p class="subjudul">Laporkan Keluhan Anda, Kami Tindak Lanjuti dengan Cepat dan Tepat</p>
                <div class="btn-group">
                    <a class="cta-button" href="{{ route('register') }}">
                        <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                    </a>
                    <a class="cta-button" href="{{ route('login') }}">
                        <i class="fas fa-search mr-2"></i>Masuk
                    </a>
                </div>
            </div>
            <div class="image-section"></div>
        </div>
        <div class="sub-content">
            <div class="sub-content-item">
                <h2>Hair Styling</h2>
                <p>Experience the art of hair transformation with our expert stylists. From classic cuts to trendy styles, we'll help you find your perfect look.</p>
            </div>
            <div class="sub-content-item">
                <h2>Makeup Services</h2>
                <p>Enhance your natural beauty with our professional makeup services. Whether it's for a special event or everyday glam, we've got you covered.</p>
            </div>
        </div>
    </div>
</body>
</html>
