@extends('adminlte::page')

@section('title', 'PengajuanAlokasiPembimbing')

@section('content_header')
    <h1>Jadwal Dosen Membimbing</h1>
@stop

@section('css')
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" rel="stylesheet" />
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#jadwalTable').DataTable();
        });
    </script>
@stop

@section('content')
    <p>Beranda > <a href="www">Jadwal Dosen Membimbing</a></p>
    <div class="table-responsive">
    <table id="jadwalTable" class="table table-bordered">
    <thead>
        <tr class="bg-dark text-white">
            <th class="text-center" style="min-width: 0.5vw;">No</th>
            <th class="text-center">Hari</th>
            <th class="text-center" >Jam Awal</th>
            <th class="text-center">Jam Akhir</th>
        </tr>
    </thead>

    <tbody>
        @foreach ( $data as $item)
            <tr>
                <td class="text-center align-middle"> {{ $loop->iteration }} </td>
                <td class="text-center align-middle"> {{ ucfirst($item->hari) }} </td>
                <td class="text-center align-middle"> {{ $item->jam_mulai }} </td>
                <td class="text-center align-middle"> {{ $item->jam_selesai }} </td>
            </tr>
        @endforeach
    </tbody>
    </div>
@stop

