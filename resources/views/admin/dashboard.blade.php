@extends('layouts.app1')

@section('title', 'Dashboard Admin - SurabayaTanggap')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SurabayaTanggap</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .dark-mode {
            --primary-color: #8e2de2;
            --secondary-color: #4a00e0;
            --text-color: #e0e0e0;
            --bg-color: #1a1a2e;
            --card-bg: #16213e;
            --table-bg: #16213e;
            --shadow-color: rgba(255, 255, 255, 0.1);
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: all 0.3s ease;
        }

        .neumorphic {
            background: var(--card-bg);
            box-shadow: 8px 8px 15px var(--shadow-color), -8px -8px 15px rgba(255, 255, 255, 0.5);
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .neumorphic:hover {
            box-shadow: 10px 10px 20px var(--shadow-color), -10px -10px 20px rgba(255, 255, 255, 0.5);
        }

        .dark-mode .neumorphic {
            box-shadow: 8px 8px 15px rgba(0, 0, 0, 0.3), -8px -8px 15px rgba(255, 255, 255, 0.05);
        }

        .dark-mode .neumorphic:hover {
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.4), -10px -10px 20px rgba(255, 255, 255, 0.1);
        }

        .custom-table {
            border-collapse: separate;
            border-spacing: 0 15px;
        }

        .custom-row {
            background-color: var(--table-bg);
            box-shadow: 0 10px 20px var(--shadow-color);
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
        }

        .custom-row:hover {
            box-shadow: 0 12px 30px var(--shadow-color);
            transform: translateY(-3px);
        }

        .btn-info {
            background-color: var(--secondary-color);
            color: white;
        }

        .btn-info:hover {
            background-color: var(--primary-color);
        }

        #darkModeToggle {
            cursor: pointer;
        }

        .animate-number {
            transition: all 0.5s ease-out;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="font-sans">
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-bold text-primary-color">Dashboard Admin</h1>
            <button id="darkModeToggle" class="p-2 rounded-full neumorphic">
                <i class="fas fa-moon"></i>
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="neumorphic p-6 float-animation">
                <h3 class="text-xl font-semibold mb-4">Total Pengaduan</h3>
                <p class="text-3xl font-bold animate-number" data-target="100">0</p>
            </div>
            <div class="neumorphic p-6 float-animation">
                <h3 class="text-xl font-semibold mb-4">Belum Ditanggapi</h3>
                <p class="text-3xl font-bold animate-number" data-target="20">0</p>
            </div>
            <div class="neumorphic p-6 float-animation">
                <h3 class="text-xl font-semibold mb-4">Diproses</h3>
                <p class="text-3xl font-bold animate-number" data-target="50">0</p>
            </div>
            <div class="neumorphic p-6 float-animation">
                <h3 class="text-xl font-semibold mb-4">Selesai</h3>
                <p class="text-3xl font-bold animate-number" data-target="30">0</p>
            </div>
        </div>

        <div class="neumorphic p-6 mb-8">
            <h2 class="text-2xl font-semibold mb-4">Statistik Pengaduan</h2>
            <canvas id="complaintChart" width="400" height="200"></canvas>
        </div>

        <div class="neumorphic p-6">
            <h2 class="text-2xl font-semibold mb-4">Pengaduan Terbaru</h2>
            
            <div class="flex flex-wrap gap-4 mb-4">
                <input type="text" id="searchInput" class="neumorphic p-2 flex-grow" placeholder="Cari berdasarkan judul atau nomor aduan...">
                <select id="filterAll" class="neumorphic p-2">
                    <option value="">Filter</option>
                    <optgroup label="Kategori">
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Pendidikan">Pendidikan</option>
                    </optgroup>
                    <optgroup label="Status">
                        <option value="Diproses">Diproses</option>
                        <option value="Selesai">Selesai</option>
                    </optgroup>
                </select>
                <select id="sortBy" class="neumorphic p-2">
                    <option value="">Sorting</option>
                    <option value="noAduan-asc">No Aduan Ascending</option>
                    <option value="noAduan-desc">No Aduan Descending</option>
                    <option value="tanggal-asc">Tanggal Ascending</option>
                    <option value="tanggal-desc">Tanggal Descending</option>
                </select>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full custom-table">
                    <thead>
                        <tr>
                            <th class="p-3 text-left">No. Aduan</th>
                            <th class="p-3 text-left">Kategori</th>
                            <th class="p-3 text-left">Judul</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left">Tanggal</th>
                            <th class="p-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="aduanTable">
                        <tr class="custom-row">
                            <td class="p-3">001</td>
                            <td class="p-3">Kesehatan</td>
                            <td class="p-3">Kekurangan Tenaga Medis</td>
                            <td class="p-3">Diproses</td>
                            <td class="p-3">2024-09-20</td>
                            <td class="p-3"><button class="btn-info px-4 py-2 rounded">Detail</button></td>
                        </tr>
                        <tr class="custom-row">
                            <td class="p-3">002</td>
                            <td class="p-3">Pendidikan</td>
                            <td class="p-3">Kekurangan Buku Pelajaran</td>
                            <td class="p-3">Selesai</td>
                            <td class="p-3">2024-09-18</td>
                            <td class="p-3"><button class="btn-info px-4 py-2 rounded">Detail</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 flex justify-center">
                <nav class="neumorphic inline-flex rounded-md shadow-sm" aria-label="Pagination">
                    <a href="#" class="px-3 py-2 rounded-l-md hover:bg-gray-200">Previous</a>
                    <a href="#" class="px-3 py-2 hover:bg-gray-200">1</a>
                    <a href="#" class="px-3 py-2 hover:bg-gray-200">2</a>
                    <a href="#" class="px-3 py-2 hover:bg-gray-200">3</a>
                    <a href="#" class="px-3 py-2 rounded-r-md hover:bg-gray-200">Next</a>
                </nav>
            </div>
        </div>
    </div>

    <script>
        // Dark mode toggle
        const darkModeToggle = document.getElementById('darkModeToggle');
        darkModeToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            const icon = darkModeToggle.querySelector('i');
            icon.classList.toggle('fa-moon');
            icon.classList.toggle('fa-sun');
        });

        // Animate numbers
        const animateNumber = (el, target) => {
            let current = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                current += increment;
                el.textContent = Math.round(current);
                if (current >= target) {
                    clearInterval(timer);
                    el.textContent = target;
                }
            }, 10);
        };

        document.querySelectorAll('.animate-number').forEach(el => {
            const target = parseInt(el.getAttribute('data-target'));
            animateNumber(el, target);
        });

        // Chart
        const ctx = document.getElementById('complaintChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Pengaduan per Bulan',
                    data: [12, 19, 3, 5, 2, 3],
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function() {
            let searchValue = this.value.toLowerCase();
            let table = document.getElementById('aduanTable');
            let rows = Array.from(table.querySelectorAll('tr'));

            rows.forEach(row => {
                let noAduan = row.children[0].innerText.toLowerCase();
                let judul = row.children[2].innerText.toLowerCase();

                if (noAduan.includes(searchValue) || judul.includes(searchValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });

        // Filter functionality
        document.getElementById('filterAll').addEventListener('change', function() {
            let filterValue = this.value.toLowerCase();
            let table = document.getElementById('aduanTable');
            let rows = Array.from(table.querySelectorAll('tr'));

            rows.forEach(row => {
                let kategori = row.children[1].innerText.toLowerCase();
                let status = row.children[3].innerText.toLowerCase();

                if (kategori.includes(filterValue) || status.includes(filterValue) || filterValue === "") {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });

        // Sort functionality
        document.getElementById('sortBy').addEventListener('change', function() {
            let sortOption = this.value;
            let table = document.getElementById('aduanTable');
            let rows = Array.from(table.querySelectorAll('tr'));

            let [column, order] = sortOption.split('-');

            let getCellValue = (row, columnIndex) => row.children[columnIndex].innerText;

            let columnIndex = column === 'noAduan' ? 0 : 4;

            rows.sort((a, b) => {
                let aValue = getCellValue(a, columnIndex);
                let bValue = getCellValue(b, columnIndex);

                if (columnIndex === 4) {
                    aValue = new Date(aValue);
                    bValue = new Date(bValue);
                } else {
                    aValue = parseInt(aValue);
                    bValue = parseInt(bValue);
                }

                if (order === 'asc') {
                    return aValue > bValue ? 1 : -1;
                } else {
                    return aValue < bValue ? 1 : -1;
                }
            });

            table.innerHTML = '';
            rows.forEach(row => table.appendChild(row));
        });
    </script>
</body>
</html>
@endsection
