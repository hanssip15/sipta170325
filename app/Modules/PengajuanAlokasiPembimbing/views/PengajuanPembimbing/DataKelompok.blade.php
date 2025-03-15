@extends('adminlte::page')

@section('title', 'Formulir Pengajuan Dosen Pembimbing')

@section('content_header')  
    <div class="m-3">
        <h1>Formulir Pengajuan Dosen Pembimbing</h1>
    </div>
@stop

@section('content')

    {{-- <p>Data Kelompok > <a href="www">Topik Tugas Akhir</a> > <a href="www">Prioritas Dosen Pembimbing</a> > <a href="www">Pratinjau</a></p> --}}

    <div class="container-fluid row w-100 justify-content-start">
        <div class="card p-4 bg-light">
            <x-pengajuan-alokasi-pembimbing.components.pengajuan-pembimbing.form-stepper step="4" currentStep="1"
                activeColor="primary" inactiveColor="secondary" 
                :hrefs="['data-kelompok', 'topik-tugas-akhir', 'prioritas-dosen-pembimbing', 'pratinjau-formulir']" />
        </div>

            <!-- Form Pengajuan -->
        <div class="col">
            <div class="card p-4 bg-light">
                <h5 class="mb-3">Data Mahasiswa</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $sessionUser['nama'] }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kelas</label>
                        <input type="text" class="form-control" value="{{ $sessionUser['kelas'] }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" value="{{ $sessionUser['nim'] }}" readonly>
                    </div>
                </div>

                <h5 class="mb-3">Data Kelompok</h5>
                @php
                    $anggota1 = $dataAnggota[0] ?? (object)['nama' => '-', 'nim' => '-'];
                    $anggota2 = $dataAnggota[1] ?? (object)['nama' => '-', 'nim' => '-'];
                @endphp
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Anggota 1</label>
                        <input type="text" class="form-control" value="{{ $anggota1->nama }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" value="{{ $anggota1->nim }}" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Anggota 2</label>
                        <input type="text" class="form-control" value="{{ $anggota2->nama }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" value="{{ $anggota2->nim }}" readonly>
                    </div>
                </div>

                <!-- Tombol Simpan & Selanjutnya -->
                <div class="d-flex justify-content-end mt-3">
                    <a href={{ route('pengajuanalokasipembimbing.pengajuan-pembimbing.topik-tugas-akhir') }} class="btn btn-info ml-3">Selanjutnya</a>
                </div>
            </div>
        </div>
    </div>

    
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link href=" https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" rel="stylesheet" />
@stop

@section('js')
    @include('pengajuanalokasipembimbing.Helper.JS.SweetAlert')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            SweetAlert('info', 'Periksa kembali data anggota kelompok', 'Jika ingin melakukan perubahan, harap lakukan pada pengaturan pengguna sebelum mengajukan dosen pembimbing', 'OK', '', '#3085d6', '', false, true);
        });
    </script>
@stop
