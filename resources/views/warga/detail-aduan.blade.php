@extends('layouts.app')

@section('title', 'Detail Laporan')

<style>
    /* 3D Card Styling */
    .card-3d {
        background-color: #fff;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        padding: 20px;
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 20px;
    }

    .card-3d:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
    }

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
        border-bottom: 2px solid #007bff;
    }

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

    <!-- Tampilan Judul, Deskripsi, dan Lokasi dalam bentuk card 3D -->
    <div class="card-3d">
        <div class="card-3d-content">
            <p><strong>Status:</strong> <span>{{ $aduan->status }}</span></p>
            <p><strong>Judul:</strong> <span>{{ $aduan->judul_aduan }}</span></p>
            <p><strong>Deskripsi:</strong> <span>{{ $aduan->deskripsi_aduan }}</span></p>
            <p><strong>Lokasi:</strong> <span>{{ $aduan->lokasi_detail }}</span></p>
        </div>
    </div>

    <!-- Kolom Tanggapan -->
    <div class="mb-4">
        <h3>Kirim Tanggapan</h3>
        <form action="{{ route('warga.aduan.respon', $aduan->aduan_id) }}" method="POST">
            @csrf
            <div class="line-border-input mb-3">
                <label for="tanggapan" class="form-label">Tanggapan</label>
                <textarea class="form-control" id="tanggapan" name="pesan_respon" rows="5" placeholder="Masukkan tanggapan Anda di sini..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>

    <!-- Menampilkan Tanggapan -->
    <h3>Tanggapan</h3>
    <div class="tanggapan-list">
        @if($aduan->responAduan->isNotEmpty()) <!-- Cek jika ada tanggapan -->
            @foreach ($aduan->responAduan as $respon)
                <div class="card-3d mb-2">
                    <p><strong>{{ $respon->user->name }}:</strong></p>
                    <p>{{ $respon->pesan_respon }}</p>
                    <p><small>{{ $respon->tanggal_respon }}</small></p>
                </div>
            @endforeach
        @else
            <div class="card-3d mb-2">
                <p>Tidak ada tanggapan untuk aduan ini.</p>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
<script>
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
