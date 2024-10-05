@extends('layouts.app1')

@section('title', 'Buat Aduan - SurabayaTanggap')

@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6a11cb;
            --secondary-color: #2575fc;
            --text-color: #333333;
            --bg-color: #f9f9f9;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
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
    </style>
</head>
<body>
<div class="form-container">
        <h1>Buat Aduan Baru</h1>

        @if(session('success'))
            <div class="alert alert-success text-center mb-3">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('warga.buat-aduan') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label for="topik_id" class="form-label">Kategori</label>
                <select class="form-control" id="topik_id" name="topik_id" required>
                    <option value="">Pilih Kategori</option>
                    <option value="1">Pendidikan</option>
                    <option value="2">Ekonomi</option>
                    <option value="3">Sosial</option>
                    <option value="4">Kependudukan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="judul_aduan" class="form-label">Judul Aduan</label>
                <input type="text" class="form-control" id="judul_aduan" name="judul_aduan" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi_aduan" class="form-label">Deskripsi Aduan</label>
                <textarea class="form-control" id="deskripsi_aduan" name="deskripsi_aduan" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan" required>
            </div>

            <div class="mb-3">
                <label for="kelurahan" class="form-label">Kelurahan</label>
                <input type="text" class="form-control" id="kelurahan" name="kelurahan" required>
            </div>

            <div class="mb-3">
                <label for="lokasi_detail" class="form-label">Lokasi Detail</label>
                <input type="text" class="form-control" id="lokasi_detail" name="lokasi_detail" required>
            </div>

            <div class="mb-3">
                <label for="lampiran" class="form-label">Unggah Lampiran (opsional)</label>
                <input type="file" class="form-control" id="lampiran" name="lampiran">
            </div>

            <button type="submit" class="btn btn-primary">Kirim Aduan</button>
        </form>
    </div>
</body>
</html>
@endsection
