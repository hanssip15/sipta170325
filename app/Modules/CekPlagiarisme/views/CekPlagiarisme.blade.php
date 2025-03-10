@extends('adminlte::page')

@section('title', 'Cek Plagiarisme')

@section('content_header')
<h1 class="text-center mb-3">Cek Plagiarisme</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="search-box d-flex align-items-center">
            <select class="form-control" id="sortSelect" style="width: 200px; margin-right: 10px;">
                <option>Urutkan berdasarkan</option>
                <option value="judul">Judul</option>
                <option value="waktu">Waktu Pengecekan</option>
                <option value="penulis">Penulis</option>
                <option value="presentase">Presentase</option>
            </select>
            <input type="text" class="form-control" id="searchInput" placeholder="Cari">
            <button class="btn btn-outline-secondary">
                <i class="fas fa-search"></i>
            </button>
        </div>
        <button class="btn btn-outline-secondary">
            <i class="fas fa-filter"></i>
        </button>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Waktu Pengecekan</th>
                        <th>Penulis</th>
                        <th>Presentase</th>
                        <th>Status</th>
                        <th>Komentar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Implementasi Algoritma Naive</td>
                        <td>28-02-2025 21:00:11</td>
                        <td>Maman Sumaman</td>
                        <td><i class="fas fa-spinner fa-spin"></i></td>
                        <td><span class="badge badge-warning">Processing</span></td>
                        <td class="text-muted">Belum ada komentar</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Implementasi Algoritma Naive</td>
                        <td>28-02-2025 19:28:24</td>
                        <td>Maman Samaman</td>
                        <td><a href="#" class="text-primary">15%</a></td>
                        <td><span class="badge badge-success">Tidak Plagiat</span></td>
                        <td class="text-muted">Belum ada komentar</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Implementasi Algoritma Naive</td>
                        <td>28-02-2025 14:20:14</td>
                        <td>Mumun Sumumun</td>
                        <td><a href="#" class="text-primary">50%</a></td>
                        <td><span class="badge badge-danger">Plagiat</span></td>
                        <td><a href="#" class="text-primary">Komentar diberikan</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Implementasi Algoritma Naive</td>
                        <td>28-02-2025 09:30:45</td>
                        <td>Mimin Simimin</td>
                        <td><a href="#" class="text-primary">80%</a></td>
                        <td><span class="badge badge-danger">Plagiat</span></td>
                        <td><a href="#" class="text-primary">Komentar diberikan</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    .table th,
    .table td {
        vertical-align: middle;
    }

    .container-fluid {
        padding-bottom: 20px;
    }

    .card {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .badge {
        padding: 5px 10px;
        font-size: 0.9rem;
    }

    .badge-warning {
        background-color: yellow;
        color: black;
    }

    .badge-success {
        background-color: green;
        color: white;
    }

    .badge-danger {
        background-color: red;
        color: white;
    }

    .table {
        margin-bottom: 0;
    }
</style>
@stop

@section('js')
<script>
    console.log("Laporan TA page loaded.");

    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("tbody tr");

        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(filter) ? "" : "none";
        });
    });
</script>
@stop