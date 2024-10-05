@extends('layouts.app')

@section('title', 'Home - SurabayaTanggap')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SurabayaTanggap - Platform Pengaduan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #6a11cb;
            --secondary-color: #2575fc;
            --text-color: #333;
            --bg-color: #ffffff;
            --card-bg: #f8f9fa;
        }


        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: background-color 0.3s, color 0.3s;
        }

        .jumbotron {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 4rem 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .jumbotron-content {
            flex: 1;
        }

        .jumbotron-image {
            flex: 1;
            text-align: right;
        }

        .jumbotron-image img {
            max-width: 100%;
            height: auto;
            border-radius: 0; /* Hapus radius untuk gambar */
        }

        .jumbotron {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 3rem; /* Menambah padding untuk membuatnya lebih panjang */
            border-radius: 0.5rem; /* Mengurangi border radius */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); /* Mengurangi shadow */
            max-width: 3000px; /* Mengatur lebar maksimum */
            width: 87.5%; /* Mengatur lebar */
            font-size: 0.875rem; /* Mengurangi ukuran font */
            margin: 0 auto;
        }


        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 1.25rem;
            margin-top: 2rem;
        }

        .btn {
            font-size: 1.125rem;
            padding: 0.75rem 1.5rem;
            border-radius: 2rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            z-index: -1;
        }

        .btn:hover::before {
            width: 100%;
        }

        .btn-light {
            background-color: var(--bg-color);
            color: var(--primary-color);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-light:hover {
            background-color: #f8f9fa;
            color: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .btn-outline-light {
            background-color: transparent;
            color: var(--bg-color);
            border: 2px solid var(--bg-color);
        }

        .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .subjudul {
            font-size: 1.5rem;
            color: #f0f0f0;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            border-right: 3px solid white;
            width: 100%;
            animation: typing 4s steps(40, end) forwards, blink 0.75s step-end infinite;
        }

        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink {
            from, to { border-color: transparent }
            50% { border-color: white }
        }

        .statistik-section, .kategori-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 1.25rem;
            margin-top: 2.5rem;
        }

        .statistik-card, .kategori-card {
            flex: 1 1 calc(25% - 1.25rem);
            border-radius: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
            background-color: var(--card-bg);
            position: relative;
            overflow: hidden;
        }

        .statistik-card::before, .kategori-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(106, 17, 203, 0.1) 0%, rgba(106, 17, 203, 0) 70%);
            transform: rotate(45deg);
            transition: all 0.3s ease;
        }

        .statistik-card:hover::before, .kategori-card:hover::before {
            transform: rotate(45deg) translate(10%, 10%);
        }

        .statistik-card:hover, .kategori-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .statistik-card h3, .kategori-card h5 {
            font-size: 1.25rem;
            color: var(--primary-color);
            margin-bottom: 0.9375rem;
        }

        .statistik-card p, .kategori-card p {
            font-size: 1rem;
            color: var(--text-color);
        }

        .kategori-card .icon {
            font-size: 3.125rem;
            color: var(--primary-color);
            margin-bottom: 0.9375rem;
            transition: all 0.3s ease;
        }

        .kategori-card:hover .icon {
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .statistik-card, .kategori-card {
                flex: 1 1 calc(50% - 1.25rem);
            }
            .jumbotron {
                flex-direction: column;
            }
            .jumbotron-image {
                margin-top: ;
            }
        }

        @media (max-width: 480px) {
            .statistik-card, .kategori-card {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container mx-auto px-4">
        <div class="jumbotron">
            <div class="jumbotron-content">
                <h1 class="text-4xl font-bold mb-4">Selamat Datang di SurabayaTanggap</h1>
                <p class="text-xl mb-6">Platform pengaduan masyarakat untuk kota Surabaya yang lebih baik.</p>
                <hr class="my-4">
                <p class="subjudul">Laporkan Keluhan Anda, Kami Tindak Lanjuti dengan Cepat dan Tepat</p>
                
                <div class="btn-group">
                    <a class="btn btn-light" href="{{ route('register') }}">
                        <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                    </a>
                    <a class="btn btn-light" href="{{ route('login') }}">
                        <i class="fas fa-home mr-2"></i>Masuk
                    </a>
                </div>
            </div>
            <div class="jumbotron-image">
                <img src="images/ikon.png" alt="Surabaya Cityscape">
            </div>
        </div>

        <div class="statistik-section">
            <div class="statistik-card" onclick="toggleExpand(this)">
                <h3>Total Pengaduan</h3>
                <p class="count-number" data-target="1000">0</p>
                <div class="statistik-details hidden">
                    <p>Detail: Pengaduan yang masuk sejak awal platform diluncurkan.</p>
                </div>
            </div>

            <div class="statistik-card" onclick="toggleExpand(this)">
                <h3>Pengaduan Ditanggapi</h3>
                <p class="count-number" data-target="950">0</p>
                <div class="statistik-details hidden">
                    <p>Detail: Pengaduan yang sudah mendapatkan tanggapan dari tim terkait.</p>
                </div>
            </div>

            <div class="statistik-card" onclick="toggleExpand(this)">
                <h3>Pengaduan Diselesaikan</h3>
                <p class="count-number" data-target="900">0</p>
                <div class="statistik-details hidden">
                    <p>Detail: Pengaduan yang telah diselesaikan dan masalah telah teratasi.</p>
                </div>
            </div>
        </div>

        <div id="layanan-kami" class="text-center mt-12">
            <h2 class="text-3xl font-bold mb-4">Layanan Kami</h2>
            <p class="mb-8">Kami menyediakan layanan untuk mempermudah warga melaporkan berbagai masalah yang dihadapi di lingkungannya.</p>
            
            <div class="kategori-section">
                <div class="kategori-card">
                    <div class="icon"><i class="fas fa-school"></i></div>
                    <h5>Pendidikan</h5>
                    <p>Laporkan masalah seperti kekurangan fasilitas sekolah, kurangnya tenaga pengajar, dan perlengkapan pendidikan lainnya.</p>
                </div>

                <div class="kategori-card">
                    <div class="icon"><i class="fas fa-dollar-sign"></i></div>
                    <h5>Ekonomi</h5>
                    <p>Laporkan masalah seperti bantuan ekonomi, pengangguran, dan program bantuan sosial ekonomi di lingkungan Anda.</p>
                </div>

                <div class="kategori-card">
                    <div class="icon"><i class="fas fa-users"></i></div>
                    <h5>Sosial</h5>
                    <p>Laporkan masalah sosial seperti permasalahan kesehatan masyarakat, ketimpangan sosial, dan permasalahan umum lainnya.</p>
                </div>

                <div class="kategori-card">
                    <div class="icon"><i class="fas fa-id-card"></i></div>
                    <h5>Kependudukan</h5>
                    <p>Laporkan masalah terkait dokumen kependudukan, seperti KTP, KK, akta kelahiran, dan dokumen lainnya.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const counters = document.querySelectorAll('.count-number');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = +counter.getAttribute('data-target');
                        let count = 0;
                        const duration = 2000; // 2 seconds
                        const increment = target / (duration / 16); // 60 FPS

                        const updateCount = () => {
                            count += increment;
                            if (count < target) {
                                counter.innerText = Math.ceil(count);
                                requestAnimationFrame(updateCount);
                            } else {
                                counter.innerText = target;
                            }
                        };

                        updateCount();
                        observer.unobserve(counter);
                    }
                });
            }, { threshold: 0.5 });

            counters.forEach(counter => observer.observe(counter));
        });

        function toggleExpand(card) {
            const details = card.querySelector('.statistik-details');
            details.classList.toggle('hidden');
            card.classList.toggle('expanded');
        }
    </script>
</body>
</html>
@endsection