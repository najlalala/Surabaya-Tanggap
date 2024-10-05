@extends('layouts.app')

@section('title', 'Cek Kasus')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6a11cb; /* Replace with your actual primary color */
            --secondary-color: #2575fc; /* Replace with your actual secondary color */
            --text-color: #333333; /* Your text color */
            --bg-color: #ffffff; /* Background color */
        }

        .cek-kasus-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: var(--bg-color);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 3rem;
        }

        h1 {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 1.5rem;
        }

        p {
            font-size: 1.125rem;
            color: var(--text-color);
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-label {
            font-size: 1rem;
            font-weight: 500;
            color: var(--primary-color);
        }

        .form-control {
            padding: 0.75rem;
            border-radius: 0.375rem;
            border: 1px solid #ddd;
            width: 100%;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(106, 17, 203, 0.3);
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white; /* White text for contrast */
            font-size: 1rem;
            padding: 0.75rem 1.5rem;
            border-radius: 2rem;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
            text-align: center;
            margin-top: 1rem;
            border: none; /* Remove default border */
        }

        .btn-primary:hover {
            background-color: var(--secondary-color); /* Lighter secondary color on hover */
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>
    <div class="cek-kasus-container">
        <h1>Cek Kasus</h1>
        <p>Masukkan informasi berikut untuk mengecek status kasus yang masuk.</p>

        <form action="/laporan-sederhana" method="POST"> <!-- Updated action to # -->
            @csrf
            <div class="mb-3">
                <label for="nomor_pendaftaran" class="form-label">Nomor Pendaftaran</label>
                <input type="text" class="form-control" id="nomor_pendaftaran" name="nomor_pendaftaran" placeholder="Masukkan nomor pendaftaran Anda" required>
            </div>
            
            <div class="mb-3">
                <label for="pin_perizinan" class="form-label">PIN Perizinan</label>
                <input type="text" class="form-control" id="pin_perizinan" name="pin_perizinan" placeholder="Masukkan PIN perizinan Anda" required>
            </div>
            
            <button type="button" class="btn btn-primary" onclick="window.location.href='{{ url('/laporan') }}'">Cari</button>
        </form>
    </div>
</body>
</html>
@endsection