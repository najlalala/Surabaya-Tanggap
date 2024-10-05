@extends('layouts.app1')

@section('title', 'Detail Laporan')

@section('content')
    <h1>Detail Laporan</h1>

    <!-- Menampilkan Nomor Pendaftaran dan PIN -->
    <div class="card mb-3">
        <div class="card-header">Laporan #{{ $laporan->id }}</div>
        <div class="card-body">
            <p><strong>Nomor Pendaftaran:</strong> {{ $laporan->nomor_pendaftaran }}</p>
            <p><strong>PIN:</strong> {{ $laporan->pin }}</p>
            <p><strong>Deskripsi:</strong> {{ $laporan->deskripsi }}</p>
            <p><strong>Status:</strong> {{ $laporan->status }}</p>
        </div>
    </div>

    <!-- Tanggapan -->
    <h3>Tanggapan</h3>

    @foreach($tanggapans as $tanggapan)
        <div class="card mb-3">
            <div class="card-body">
                <p><strong>{{ $tanggapan->user->name }}</strong> ({{ $tanggapan->user->role }}) berkata:</p>
                <p>{{ $tanggapan->isi_tanggapan }}</p>
            </div>
        </div>
    @endforeach

    <!-- Form untuk memberikan tanggapan -->
    <form action="{{ route('laporan.tanggapan', $laporan->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="tanggapan" class="form-label">Beri Tanggapan</label>
            <textarea class="form-control" id="tanggapan" name="tanggapan" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
    </form>
@endsection
