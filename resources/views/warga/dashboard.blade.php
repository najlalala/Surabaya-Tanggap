@extends('layouts.app1')

@section('title', 'Dashboard Warga - SurabayaTanggap')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SurabayaTanggap')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6a11cb;
            --secondary-color: #2575fc;
            --text-color: #333;
            --bg-color: #ffffff;
            --card-bg: #f8f9fa;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        header {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }

        h1 {
            font-size: 2.5rem;
            color: var(--primary-color);
        }

        .intro-text {
            font-size: 1.2rem;
            text-align: center;
            color: black;
            margin-bottom: 2rem;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background-color: var(--card-bg);
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1), -5px -5px 10px rgba(255, 255, 255, 0.5);
        }

        .stat-card h3 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }

        .stat-card p {
            font-size: 2rem;
            font-weight: bold;
            margin: 0;
        }

        .chart-container {
            background-color: var(--card-bg);
            padding: 1.5rem;
            border-radius: 1rem;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1), -5px -5px 10px rgba(255, 255, 255, 0.5);
            margin-bottom: 2rem;
        }

        .table-container {
            background-color: var(--card-bg);
            border-radius: 1rem;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1), -5px -5px 10px rgba(255, 255, 255, 0.5);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 1rem;
            text-align: left;
        }

        thead {
            background-color: rgba(0, 0, 0, 0.05);
        }

        tr:not(:last-child) {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .status-badge {
            padding: 0.25rem 0.5rem;
            border-radius: 1rem;
            font-size: 0.875rem;
        }

        .status-processed {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-completed {
            background-color: #d1fae5;
            color: #065f46;
        }
    </style>
@section('content')

</head>
<body>
    <div class="container">
        <header>
            <h1>Dashboard Warga</h1>
        </header>

        <p class="intro-text">Laporkan Keluhan Anda, Kami Tindak Lanjuti dengan Cepat dan Tepat</p>

        <div class="action-buttons">
            <a href="{{ route('warga.buat-aduan') }}" class="btn btn-primary">Buat Aduan</a>
            <a href="{{ route('warga.status-aduan') }}" class="btn btn-secondary">Status Aduan</a>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <h3>Total Aduan</h3>
                <p class="count-number" data-target="{{ $totalAduan }}">{{ $totalAduan }}</p>
            </div>
            <div class="stat-card">
                <h3>Aduan Diproses</h3>
                <p class="count-number" data-target="{{ $aduanDiproses }}">0</p>
            </div>
            <div class="stat-card">
                <h3>Aduan Selesai</h3>
                <p class="count-number" data-target="{{ $aduanSelesai }}">0</p>
            </div>
        </div>

        <h2>Statistik Aduan</h2>
        <div class="chart-container">
            <canvas id="aduanChart" width="400" height="200"></canvas>
        </div>

        <h2>Aduan Terbaru</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No. Aduan</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aduans as $aduan)
                    <tr>
                        <td>{{ $aduan->aduan_id }}</td>
                        <td>{{ optional($aduan->topik)->nama_topik }}</td>
                        <td>
                            <span class="status-badge {{ $aduan->status == 'diproses' ? 'status-processed' : 'status-completed' }}">
                                {{ ucfirst($aduan->status) }}
                            </span>
                        </td>
                        <td>{{ $aduan->tanggal_pengaduan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('aduanChart').getContext('2d');
        const aduanChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Jumlah Aduan',
                    data: @json($aduanCounts),
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 2,
                    fill: true,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah Aduan'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
@endsection
