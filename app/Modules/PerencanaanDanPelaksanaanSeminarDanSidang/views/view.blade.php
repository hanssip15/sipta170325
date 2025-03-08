@extends('adminlte::page')

@section('title', 'PerencanaanDanPelaksanaanSeminarDanSidang')

@section('content_header')
    <h1>Presensi Pelaksanaan Seminar 3</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>MAHASISWA</th>
                        <th>KOTA</th>
                        <th>TANGGAL</th>
                        <th>RUANGAN</th>
                        <th>SESI</th>
                        <th>STATUS KEHADIRAN</th>
                        <th>DOKUMENTASI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($presensi as $index => $item)
                        @php
                            $waktuSidang = new DateTime($item['waktu_sidang']);
                            $satuJamSebelumSidang = (clone $waktuSidang)->modify('-1 hour');
                            $empatJamSetelahSidang = (clone $waktuSidang)->modify('+4 hours');
                        @endphp

                        <tr>
                            <td>{{ $item['nim'] }}</td>
                            <td>{{ $item['mahasiswa'] }}</td>
                            <td>{{ $item['kota'] }}</td>
                            <td>{{ $item['tanggal'] }}</td>
                            <td>{{ $item['ruangan'] }}</td>
                            <td>{{ $item['sesi'] }}</td>
                            <td>
                                @if($item['status_kehadiran'] == 'hadir')
                                    <button class="btn btn-success btn-sm" disabled>Hadir</button>
                                @elseif($item['status_kehadiran'] == 'absen')
                                    <button class="btn btn-danger btn-sm" disabled>Absen</button>
                                @elseif($sekarang < $satuJamSebelumSidang)
                                    <button class="btn btn-warning btn-sm" disabled>Absensi</button>
                                @elseif($sekarang >= $satuJamSebelumSidang && $sekarang <= $waktuSidang)
                                    <form action="{{ route('presensi.hadir') }}" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="nim" value="{{ $item['nim'] }}">
                                        <input type="hidden" name="nama" value="{{ $item['mahasiswa'] }}">
                                        <input type="hidden" name="kota" value="{{ $item['kota'] }}">
                                        <input type="hidden" name="ruangan" value="{{ $item['ruangan'] }}">
                                        <input type="hidden" name="sesi" value="{{ $item['sesi'] }}">
                                        <input type="hidden" name="status" value="hadir">
                                        <button type="submit" class="btn btn-info btn-sm">Absensi</button>
                                    </form>
                                @elseif($sekarang > $waktuSidang && $sekarang <= $empatJamSetelahSidang)
                                    <button class="btn btn-success btn-sm" disabled>Hadir</button>
                                @else
                                    <button class="btn btn-danger btn-sm" disabled>Absen</button>
                                @endif
                            </td>
                            <td>
                                <input type="file" class="form-control" {{ $item['status_kehadiran'] == 'hadir' ? '' : 'disabled' }}>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop