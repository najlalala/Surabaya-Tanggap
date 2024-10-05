@extends('layouts.app1')

@section('title', 'Tanggapi Aduan - SurabayaTanggap')

@section('content')
    <h1>Tanggapi Aduan</h1>
    <div class="card mt-4">
        <div class="card-header">
            Aduan #001 - Kekurangan Tenaga Medis
        </div>
        <div class="card-body">
            <h5 class="card-title">Detail Aduan:</h5>
            <p class="card-text">Rumah Sakit X kekurangan tenaga medis, terutama untuk bagian UGD. Mohon ditindaklanjuti segera.</p>
            <p><strong>Pelapor:</strong> John Doe</p>
            <p><strong>Tanggal Laporan:</strong> 2024-09-22</p>
            <p><strong>Status:</strong> Belum Ditanggapi</p>
        </div>
    </div>

    <form action="{{ route('admin.tanggapi-aduan', $aduan->id) }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="tanggapan" class="form-label">Tanggapan</label>
            <textarea class="form-control" id="tanggapan" name="tanggapan" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Ubah Status</label>
            <select class="form-select" id="status" name="status" required>
                <option value="diproses">Diproses</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
    </form>
@endsection