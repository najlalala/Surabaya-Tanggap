@extends('layouts.app')

@section('title', 'Detail Laporan')

<style>
    /* 3D Card Styling */
    .card-3d {
        background-color: #fff;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Shadow for 3D effect */
        padding: 20px;
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 20px;
    }

    .card-3d:hover {
        transform: translateY(-10px); /* Lift the card slightly on hover */
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3); /* Add more shadow on hover */
    }

    /* Layout for the content inside the card */
    .card-3d-content {
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .card-3d-content p {
        margin: 0;
        padding: 10px 0;
        font-weight: bold;
    }

    .card-3d-content p span {
        font-weight: normal;
        color: #555;
    }

    /* Animasi Border Line */
    .line-border-input {
        position: relative;
    }

    .line-border-input input,
    .line-border-input textarea {
        border: none;
        border-bottom: 2px solid #ccc;
        background: transparent;
        width: 100%;
        outline: none;
        padding: 8px 5px;
        transition: border-color 0.3s, background-color 0.3s;
    }

    .line-border-input input:focus,
    .line-border-input textarea:focus {
        border-bottom: 2px solid #007bff; /* Change to blue on focus */
    }

    /* Typing animation */
    .typing-effect {
        border-bottom: 2px solid #007bff;
        animation: pulse 1s infinite ease-in-out;
    }

    @keyframes pulse {
        0% {
            background-color: rgba(0, 123, 255, 0.1);
        }
        50% {
            background-color: rgba(0, 123, 255, 0.2);
        }
        100% {
            background-color: rgba(0, 123, 255, 0.1);
        }
    }
</style>

@section('content')
    <h1>Detail Laporan</h1>

    <!-- Tampilan Nomor Pendaftaran, PIN, Status, Judul, Deskripsi, dan Lokasi dalam bentuk card 3D -->
    <div class="card-3d">
        <div class="card-3d-content">
            <p><strong>Nomor Pendaftaran:</strong> <span>123456789</span></p>
            <p><strong>PIN:</strong> <span>987654</span></p>
            <p><strong>Status:</strong> <span>Diproses</span></p>
            <p><strong>Judul:</strong> <span>Kekurangan Tenaga Medis</span></p>
            <p><strong>Deskripsi:</strong> <span>Aduan terkait kekurangan tenaga medis di Rumah Sakit XYZ yang mengakibatkan waktu penanganan pasien terhambat.</span></p>
            <p><strong>Lokasi:</strong> <span>Rumah Sakit XYZ, Surabaya</span></p>
        </div>
    </div>

    <!-- Kolom Tanggapan -->
    <div class="mb-4">
        <h3>Kirim Tanggapan</h3>
        <form action="#" method="POST">
            @csrf
            <div class="line-border-input mb-3">
                <label for="tanggapan" class="form-label">Tanggapan</label>
                <textarea class="form-control" id="tanggapan" name="tanggapan" rows="5" placeholder="Masukkan tanggapan Anda di sini..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
@endsection

@section('scripts')
<script>
    // Menambahkan animasi while typing
    document.getElementById('tanggapan').addEventListener('input', function() {
        const textarea = this;

        if (textarea.value.length > 0) {
            textarea.classList.add('typing-effect');
        } else {
            textarea.classList.remove('typing-effect');
        }
    });
</script>
@endsection