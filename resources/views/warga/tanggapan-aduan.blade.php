@extends('layouts.app1')

@section('title', 'Tanggapan Aduan - SurabayaTanggap')

@section('content')
    <h1>Tanggapan Aduan</h1>
    <div class="mt-4">
        <div class="card mb-4">
            <div class="card-header">
                Aduan #001 - Kekurangan Tenaga Medis
            </div>
            <div class="card-body">
                <h5 class="card-title">Tanggapan Admin:</h5>
                <p class="card-text">Terima kasih atas laporan Anda. Kami sedang meninjau kebutuhan tenaga medis dan akan segera mengambil tindakan yang diperlukan.</p>
                <p class="card-text"><small class="text-muted">Ditanggapi pada: 2024-09-21</small></p>
                <a href="#" class="btn btn-primary">Balas</a>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                Aduan #002 - Kekurangan Buku Pelajaran
            </div>
            <div class="card-body">
                <h5 class="card-title">Tanggapan Admin:</h5>
                <p class="card-text">Kami telah mengirimkan tambahan buku pelajaran ke sekolah yang bersangkutan. Mohon konfirmasi jika masalah sudah teratasi.</p>
                <p class="card-text"><small class="text-muted">Ditanggapi pada: 2024-09-19</small></p>
                <a href="#" class="btn btn-primary">Balas</a>
            </div>
        </div>
    </div>
@endsection