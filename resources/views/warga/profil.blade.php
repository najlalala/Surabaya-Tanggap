@extends('layouts.app1')

@section('title', 'Profil Warga - SurabayaTanggap')

<style>
    :root {
        --primary-color: #6a11cb; /* Warna utama */
        --secondary-color: #2575fc; /* Warna sekunder */
        --text-color: #333333; /* Warna teks */
        --bg-color: #ffffff; /* Warna latar belakang */
        --form-bg: #f8f9fa; /* Warna latar belakang form */
    }

    body {
        background-color: var(--bg-color);
    }

    h1, h2 {
        color: var(--primary-color);
    }

    .form-control, .form-select {
        border-radius: 0.5rem;
        border: 1px solid #ccc;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 5px rgba(106, 17, 203, 0.5);
    }

    .btn-primary {
        background-color: var(--primary-color);
        border: none;
        border-radius: 0.5rem;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: var(--secondary-color);
    }

    .form-section {
        background-color: var(--form-bg);
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }
</style>

@section('content')
    <h1 class="text-center">Profil Warga</h1>

    <!-- Pesan Sukses -->
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Profil dan Ganti Password -->
    <div class="row mt-4 justify-content-center">
        <!-- Update Profil -->
        <div class="col-md-8">
            <div class="form-section">
                <form action="{{ route('warga.profil.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $user->nik }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required>{{ $user->address }}</textarea>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Update Profil</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Ganti Password -->
        <div class="col-md-8 mt-4">
            <div class="form-section">
                <h2 class="text-center">Ganti Password</h2>
                <form action="#" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="current_password" class="form-label">Password Saat Ini</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                    </div>

                    <div class="mb-3">
                        <label for="new_password" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>

                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Ganti Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
