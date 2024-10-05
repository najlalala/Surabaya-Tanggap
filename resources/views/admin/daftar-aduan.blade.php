@extends('layouts.app1')

@section('title', 'Daftar Aduan Masuk - SurabayaTanggap')

@section('styles')
    <style>
        :root {
            --primary-color: #6a11cb;
            --secondary-color: #2575fc;
            --text-color: #333333;
            --bg-color: #f0f4f8;
            --card-bg: #ffffff;
            --table-bg: #ffffff;
            --shadow-color: rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        .table {
            background-color: var(--table-bg);
            border: 1px solid var(--shadow-color);
            border-radius: 8px;
            box-shadow: 0 4px 8px var(--shadow-color);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: var(--primary-color);
            color: white;
        }

        tr:nth-child(even) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .btn-primary {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: darken(var(--secondary-color), 10%);
        }

        .btn-info {
            background-color: #17a2b8;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn-info:hover {
            background-color: darken(#17a2b8, 10%);
        }
    </style>
@endsection

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4">Daftar Aduan Masuk</h1>
        <table class="table mt-4 w-full rounded-lg overflow-hidden">
            <thead>
                <tr>
                    <th>No. Aduan</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Pelapor</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>Kesehatan</td>
                    <td>Kekurangan Tenaga Medis</td>
                    <td>John Doe</td>
                    <td>Belum Ditanggapi</td>
                    <td>2024-09-22</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info">Detail</a>
                        <a href="#" class="btn btn-sm btn-primary">Tanggapi</a>
                    </td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Pendidikan</td>
                    <td>Kekurangan Buku Pelajaran</td>
                    <td>Jane Smith</td>
                    <td>Diproses</td>
                    <td>2024-09-21</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info">Detail</a>
                        <a href="#" class="btn btn-sm btn-primary">Tanggapi</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection