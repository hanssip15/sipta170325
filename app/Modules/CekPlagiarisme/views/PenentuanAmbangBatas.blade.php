@extends('adminlte::page')

@section('title', 'Penentuan Ambang Batas')

@section('content_header')
<h1 class="text-center">PENENTUAN AMBANG BATAS</h1>
@stop

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="search-box">
            <input type="text" class="form-control" id="searchInput" placeholder="Search here...">
        </div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#addAmbangBatasModal">
            + TAMBAH AMBANG BATAS
        </button>
    </div>

    <table class="table table-bordered text-center">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Ambang Batas</th>
                <th>Tanggal</th>
                <th>Nama Koordinator TA</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php
            $data = [
            ['no' => 1, 'ambang_batas' => '20', 'tanggal' => '03-03-2025', 'koordinator' => 'Maman Sumaman', 'status' => true],
            ['no' => 2, 'ambang_batas' => '30', 'tanggal' => '28-02-2025', 'koordinator' => 'Maman Sumaman', 'status' => false],
            ['no' => 3, 'ambang_batas' => '50', 'tanggal' => '25-02-2025', 'koordinator' => 'Maman Sumaman', 'status' => false],
            ];
            @endphp

            @foreach ($data as $row)
            <tr>
                <td>{{ $row['no'] }}</td>
                <td>{{ $row['ambang_batas'] }}%</td>
                <td>{{ $row['tanggal'] }}</td>
                <td>{{ $row['koordinator'] }}</td>
                <td>{{ $row['status'] ? 'Sedang Digunakan' : 'Tidak Digunakan' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah Dokumen -->
<div class="modal fade" id="addAmbangBatasModal" tabindex="-1" aria-labelledby="addAmbangBatasModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAmbangBatasModal">Tambah Ambang Batas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Presentase Ambang Batas:</label>
                        <input type="number" class="form-control" id="deskripsi" required min="1" max="100" step="1">
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal" id="closeModalBtn">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
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

    .search-box input {
        width: 250px;
    }

    .modal-content {
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .modal-header h5 {
        font-weight: bold;
    }

    hr {
        margin: 0;
        border-top: 2px solid #ddd;
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function() {
        $('#addAmbangBatasModal').on('hidden.bs.modal', function () {
            $('#deskripsi').val('');
        });
    });
</script>
@stop