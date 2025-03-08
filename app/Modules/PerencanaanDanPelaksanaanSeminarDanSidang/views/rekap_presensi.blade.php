@extends('adminlte::page')

@section('title', 'Rekap Presensi Seminar dan Sidang')

@section('content_header')
    <h1>Rekap Presensi Seminar dan Sidang</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tombol untuk reset data rekap presensi -->
            <div class="mb-3">
                <a href="{{ route('rekap.presensi.reset') }}" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i> Reset Data Rekap Presensi
                </a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>NAMA</th>
                        <th>KOTA</th>
                        <th>TANGGAL</th>
                        <th>RUANGAN</th>
                        <th>SESI</th>
                        <th>STATUS KEHADIRAN</th>
                        <th>DOKUMENTASI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rekapPresensi as $item)
                        <tr>
                            <td>{{ $item['nim'] }}</td>
                            <td>{{ $item['nama'] }}</td>
                            <td>{{ $item['kota'] }}</td>
                            <td>{{ $item['tanggal'] }}</td>
                            <td>{{ $item['ruangan'] }}</td>
                            <td>{{ $item['sesi'] }}</td>
                            <td>
                                @if($item['status_kehadiran'] == 'hadir')
                                    <span class="badge bg-success">Hadir</span>
                                @else
                                    <span class="badge bg-danger">Tidak Hadir</span>
                                @endif
                            </td>
                            <td>
                                @if($item['dokumentasi'])
                                    <a href="{{ $item['dokumentasi'] }}" target="_blank">Lihat Dokumentasi</a>
                                @else
                                    <span class="text-muted">Tidak ada</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    {{-- Tambahkan stylesheet tambahan jika diperlukan --}}
@stop

@section('js')
    <script> console.log("Halaman rekap presensi untuk koordinator TA."); </script>
@stop