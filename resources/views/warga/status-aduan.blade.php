@extends('layouts.app1')

@section('title', 'Status Aduan - SurabayaTanggap')

@section('content')
<style>
    :root {
        --primary-color: #6a11cb;
        --secondary-color: #2575fc;
        --text-color: #333333;
        --bg-color: #f9f9f9;
    }

    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 15px;
    }

    .custom-row {
        background-color: #fff;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        transition: all 0.3s ease-in-out;
    }

    .custom-row td {
        padding: 15px;
    }

    .custom-row:hover {
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        transform: translateY(-3px);
    }

    .btn-info {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
        color: white;
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

    h1 {
        font-size: 2rem;
        font-weight: bold;
        color: var(--primary-color);
        text-align: center;
        margin-bottom: 1.5rem;
    }
</style>

<h1>Status Aduan</h1>

<!-- Search, Filter Kategori, and Filter Status in one row -->
<div class="row mb-4">
    <div class="col-md-4">
        <input type="text" class="form-control" placeholder="Cari berdasarkan judul..." id="searchInput">
    </div>
    <div class="col-md-4">
        <select class="form-control" id="filterKategori">
            <option value="">Filter Kategori</option>
            <optgroup label="Kategori">
                <option value="Kesehatan">Kesehatan</option>
                <option value="Pendidikan">Pendidikan</option>
                <option value="Sosial">Sosial</option>
                <option value="Kependudukan">Kependudukan</option>
            </optgroup>
        </select>
    </div>
    <div class="col-md-4">
        <select class="form-control" id="filterStatus">
            <option value="">Filter Status</option>
            <optgroup label="Status">
                <option value="diproses">Diproses</option>
                <option value="selesai">Selesai</option>
            </optgroup>
        </select>
    </div>
</div>

<!-- Custom Table Styling -->
<div class="table-responsive">
    <table class="table custom-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="aduanTable">
            @if ($aduans->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Belum ada aduan yang dibuat.</td>
                </tr>
            @else
                @foreach ($aduans as $aduan)
                    <tr class="custom-row">
                        <td>{{ $loop->iteration }}</td> <!-- Menggunakan $loop->iteration untuk nomor urut -->
                        <td>{{ $aduan->topik->nama_topik }}</td>
                        <td>{{ $aduan->judul_aduan }}</td>
                        <td>{{ $aduan->status }}</td>
                        <td>{{ $aduan->tanggal_pengaduan }}</td>
                        <td><a href="{{ route('warga.aduan.show', $aduan->aduan_id) }}" class="btn btn-sm btn-info">Detail</a></td>
                        </tr>
                @endforeach
            @endif
        </tbody>
        </table>
    <!-- Pesan ketika tidak ada data yang cocok -->
    <div id="noDataMessage" class="text-center" style="display: none;">Tidak ada data yang cocok.</div>
</div>
<!-- Pagination -->
<nav>
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>

<!-- JavaScript for search and filtering -->
<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        filterTable();
    });

    // Filter kategori functionality
    document.getElementById('filterKategori').addEventListener('change', function() {
        filterTable();
    });

    // Filter status functionality
    document.getElementById('filterStatus').addEventListener('change', function() {
        filterTable();
    });

    function filterTable() {
    let searchValue = document.getElementById('searchInput').value.toLowerCase();
    let kategoriFilter = document.getElementById('filterKategori').value.toLowerCase();
    let statusFilter = document.getElementById('filterStatus').value.toLowerCase();
    let table = document.getElementById('aduanTable');
    let rows = Array.from(table.querySelectorAll('tr'));
    let hasVisibleRow = false;

    rows.forEach(row => {
        let judul = row.children[2].innerText.toLowerCase();
        let kategori = row.children[1].innerText.toLowerCase();
        let status = row.children[3].innerText.toLowerCase();

        // Memeriksa apakah baris cocok dengan kriteria pencarian dan filter
        let matchesSearch = judul.includes(searchValue);
        let matchesKategori = kategoriFilter === "" || kategori.includes(kategoriFilter);
        let matchesStatus = statusFilter === "" || status.includes(statusFilter);

        if (matchesSearch && matchesKategori && matchesStatus) {
            row.style.display = ""; // Tampilkan baris jika cocok
            hasVisibleRow = true; // Menandai ada baris yang terlihat
        } else {
            row.style.display = "none"; // Sembunyikan baris jika tidak cocok
        }
    });

    // Menampilkan atau menyembunyikan pesan tidak ada data
    document.getElementById('noDataMessage').style.display = hasVisibleRow ? 'none' : 'block';
}

</script>


@endsection
