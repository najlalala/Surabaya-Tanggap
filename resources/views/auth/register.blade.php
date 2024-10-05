@extends('layouts.app')

@section('title', 'Register - SurabayaTanggap')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6a11cb; /* Warna utama */
            --secondary-color: #2575fc; /* Warna sekunder */
            --text-color: #333333; /* Warna teks */
            --bg-color: #ffffff; /* Warna latar belakang */
        }

        .register-container {
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
            color: white; /* Warna teks */
            font-size: 1rem;
            padding: 0.75rem 1.5rem;
            border-radius: 2rem;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
            text-align: center;
            margin-top: 1rem;
            border: none; /* Hilangkan border default */
        }

        .btn-primary:hover {
            background-color: var(--secondary-color); /* Warna hover */
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .error-message {
            background-color: #f8d7da; /* Warna latar belakang pesan kesalahan */
            color: #721c24; /* Warna teks */
            padding: 1rem;
            border: 1px solid #f5c6cb; /* Border */
            border-radius: 0.375rem; /* Sudut melengkung */
            margin-bottom: 1rem;
            display: flex; /* Menggunakan flexbox untuk layout */
            align-items: center; /* Memusatkan item secara vertikal */
        }

        .error-message svg {
            margin-right: 0.5rem; /* Jarak antara ikon dan teks */
            flex-shrink: 0; /* Mencegah ikon mengecil */
        }

        .logo {
            width: 100%;
            max-height: 150px;
            object-fit: contain;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="register-container">        
        <h1>Register</h1>

        <!-- Menampilkan pesan kesalahan -->
        @if ($errors->any())
            <div class="error-message">
                <!-- Ikon peringatan -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21.001 12.002A9.001 9.001 0 112.998 12.002h18z" />
                </svg>
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required autofocus>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
</html>
@endsection
