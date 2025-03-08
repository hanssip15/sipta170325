@extends('adminlte::page')

@section('title', 'PengajuanAlokasiPembimbing')

@section('content_header')
    <div class="m-3">
        <h1>Formulir Pengajuan Dosen Pembimbing</h1>
    </div>
@stop

@section('content')

    {{-- <p>Data Kelompok > <a href="www">Topik Tugas Akhir</a> > <a href="www">Prioritas Dosen Pembimbing</a> > <a href="www">Pratinjau</a></p> --}}

    <div class="container-fluid row w-100 justify-content-start">
        <div class="card p-4 bg-light">
            <x-pengajuan-alokasi-pembimbing.components.pengajuan-pembimbing.form-stepper step="4" currentStep="2"
                activeColor="primary" inactiveColor="secondary" :hrefs="['#', '#', '#', '#']" />
        </div>
            <!-- Form Pengajuan -->
        <div class="col">
            <div class="card p-4 bg-light">
                <h5 class="mb-3">Topik Tugas Akhir</h5>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label">Topik/Judul Tugas Akhir</label>
                        <textarea class="form-control" rows="3" placeholder="Masukkan topik/judul"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label">Bidang Tugas Akhir</label>
                        <div class="container-fluid bg-gradient-info rounded-top">
                            <div class="container">
                                <div class="row row-cols-2 p-2">
                                    <div class="col">
                                        <p class="m-0">Daftar Bidang</p>
                                    </div>
                                    <div class="col text-right">
                                        <a class="m-0 text-light"> <i class="fas fa-plus"></i> Tambah Bidang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- ================== --}}
                        <div class="container-fluid bg-secondary rounded-bottom bg-opacity-25 pre-scrollable mb-4">
                    
                            <div class="container text-center ">
                                <div class="row row-cols-2 p-3">
                                    @for ($i = 0; $i < 50; $i++)
                                        <div class="col">
                                            <div class="pretty p-default p-fill">
                                                <input type="checkbox" />
                                                <div class="state p-info text-left" style="min-width: 150px;">
                                                    <label>
                                                        Bidang {{ $i + 1 }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tombol Simpan & Selanjutnya -->
                <div class="d-flex justify-content-between mt-3">
                    <a href={{ route('data-kelompok') }} class="btn btn-info ml-3">Sebelumnya</a>
                    <a href={{ route('topik-tugas-akhir') }} class="btn btn-primary ml-3">Simpan Draft</a>
                    <a href={{ route('prioritas-dosen-pembimbing') }} class="btn btn-info ml-3">Selanjutnya</a>
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

{{-- @section('js')
@stop --}}
