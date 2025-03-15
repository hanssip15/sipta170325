@extends('adminlte::page')

@section('title', 'Formulir Pengajuan Dosen Pembimbing')

@section('content_header')
    <div class="m-3">
        <h1>Formulir Pengajuan Dosen Pembimbing</h1>
    </div>
@stop

@section('content')

    <div class="container-fluid row w-100 justify-content-start">
        <div class="card p-4 bg-light">
            <x-pengajuan-alokasi-pembimbing.components.pengajuan-pembimbing.form-stepper step="4" currentStep="4"
                activeColor="primary" inactiveColor="secondary" 
                :hrefs="['data-kelompok', 'topik-tugas-akhir', 'prioritas-dosen-pembimbing', 'pratinjau-formulir']" />
        </div>

        <div class="col">
            <div class="card p-4 bg-light">
                <h5 class="mb-3">Data Mahasiswa</h5>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Anggota 1</label>
                        <p>Nama Lengkap: {{ $sessionUser['nama'] }}</p>
                        <p>NIM: {{ $sessionUser['nim'] }}</p>
                    </div>
                
                    @foreach ($dataAnggota as $index => $anggota)
                        <div class="col-md-4">
                            <label class="form-label">Anggota {{ $index + 2 }}</label>
                            <p>Nama Lengkap: {{ $anggota->nama }}</p>
                            <p>NIM: {{ $anggota->nim }}</p>
                        </div>
                    @endforeach
                </div>

                <h5 class="mb-3 fw-bold">Topik Tugas Akhir</h5>
                <p id="preview-topik">Memuat...</p>

                <h5 class="mt-3 mb-3 fw-bold">Bidang Tugas Akhir</h5>
                <ul id="preview-bidang">
                    <li>Memuat...</li>
                </ul>

                <h5 class="mt-3 mb-3 fw-bold">Prioritas Dosen Pembimbing</h5>
                <ol>
                    <li>Nama Lengkap</li>
                    <li>Nama Lengkap</li>
                    <li>Nama Lengkap</li>
                    <li>Nama Lengkap</li>
                    <li>Nama Lengkap</li>
                </ol>

                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('pengajuanalokasipembimbing.pengajuan-pembimbing.prioritas-dosen-pembimbing.index') }}" class="btn btn-info">Sebelumnya</a>
                    <button type="submit" class="btn btn-sm btn-primary" style="font-size: 15px">Finalisasi Data</button>
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
        document.querySelector('button[type="submit"]').addEventListener('click', function(event) {
            event.preventDefault();
            SweetAlert('question', 'Lakukan Finalisasi Data?', 'Pastikan data yang ada isi sudah benar!', 'Submit', 'Kembali', '#3085d6', '#d33', true, true).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form
                    event.target.closest('form').submit();
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
        let savedData = JSON.parse(localStorage.getItem("pengajuanTopikDraft"));

            if (savedData) {
                document.getElementById("preview-topik").textContent = savedData.topik || "Tidak ada data";

                let bidangList = document.getElementById("preview-bidang");
                bidangList.innerHTML = ""; // Kosongkan daftar sebelum ditambahkan
                
                if (savedData.bidang.length > 0) {
                    savedData.bidang.forEach(function (bidang) {
                        let li = document.createElement("li");
                        li.textContent = bidang;
                        bidangList.appendChild(li);
                    });
                } else {
                    bidangList.innerHTML = "<li>Tidak ada bidang yang dipilih</li>";
                }
            }
        });
    </script>
    
@stop
