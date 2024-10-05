@extends('layouts.app')

@section('title', 'Login - SurabayaTanggap')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6a11cb; 
            --secondary-color: #2575fc;
            --text-color: #333333;
            --bg-color: #ffffff;
        }

        .login-container {
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
            color: white;
            font-size: 1rem;
            padding: 0.75rem 1.5rem;
            border-radius: 2rem;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
            text-align: center;
            margin-top: 1rem;
            border: none;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.375rem;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
    </style>

    <div class="login-container">
        <h1>Login</h1>
        <p>Masukkan informasi berikut untuk login ke akun Anda.</p>

        <!-- Menampilkan pesan sukses -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Menampilkan pesan kesalahan -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- email input -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') border-red-500 @enderror" id="email" name="email" placeholder="Masukkan Email Anda..." value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password input -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') border-red-500 @enderror" id="password" name="password" placeholder="Masukkan password Anda..." required>
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Remember me -->
            <div class="mb-3">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="mt-3 text-center">
            <p>Belum memiliki akun? <a href="{{ route('register') }}" style="color: var(--primary-color);">Daftar</a></p>
        </div>
    </div>
@endsection
