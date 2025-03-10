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
                    @foreach($cekPlagiarisme as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->judul }}</td>
                        <td>{{ $data->waktu }}</td>
                        <td>{{ $data->penulis }}</td>
                        <td>
                            @if(is_null($data->presentase))
                            <i class="fas fa-spinner fa-spin"></i>
                            @else
                            <a href="{{ route('plagiarism.detail', ['id' => $data->id]) }}" class="text-primary">
                                {{ $data->presentase }}%
                            </a>
                            @endif
                        </td>
                        <td>
                            @if(is_null($data->presentase))
                            <span class="badge badge-warning">Processing</span>
                            @elseif($data->presentase < 20)
                                <span class="badge badge-success">Tidak Plagiat</span>
                                @elseif($data->presentase >= 20 && $data->presentase < 50)
                                    <span class="badge badge-warning">Perlu Ditinjau</span>
                                    @else
                                    <span class="badge badge-danger">Plagiat</span>
                                    @endif
                        </td>
                        <td>
                            @if($data->komentar)
                            <a href="{{ route('plagiarism.detail', ['id' => $data->id]) }}" class="text-primary">Komentar diberikan</a>
                            @else
                            <span class="text-muted">Belum ada komentar</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
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