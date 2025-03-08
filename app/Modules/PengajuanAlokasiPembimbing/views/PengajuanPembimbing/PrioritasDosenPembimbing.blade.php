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
            <x-pengajuan-alokasi-pembimbing.components.pengajuan-pembimbing.form-stepper step="4" currentStep="3"
                activeColor="primary" inactiveColor="secondary" :hrefs="['#', '#', '#', '#']" />
        </div>

        <div class="col">
            <div class="card p-4 bg-light">
                <h5 class="mb-3">Prioritas Dosen Pembimbing</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">List Dosen Pembimbing</label>
                        <div class="border p-2" style="max-height: 70vh; overflow-y: auto;">
                            <ul id="dosenList" class="list-group">
                                @php
                                    $dosen = ['Dr. Andi', 'Prof. Budi', 'Dr. Citra', 'Dr. Dani', 'Prof. Eka', 'Prof. Budi', 'Dr. Citra', 'Dr. Dani', 'Prof. Eka'];
                                @endphp
                                @foreach ($dosen as $d)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>{{ $d }}</span>
                                        <div>
                                            <button class="btn btn-sm btn-secondary viewHistory" data-name="{{ $d }}">
                                                <i class="fas fa-file-alt"></i>
                                            </button>
                                            <button class="btn btn-sm btn-primary addDosen" data-name="{{ $d }}">+</button>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                            <label class="form-label">Urutan Prioritas Dosen Pembimbing (Maks. 5)</label>
                            <div class="d-flex justify-content-end align-items-center">
                                <button id="moveUp" class="btn btn-sm btn-primary"><i class="fas fa-chevron-up"></i></button>
                                <button id="moveDown" class="btn btn-sm btn-primary ml-1"><i class="fas fa-chevron-down"></i></button>
                            </div>
                            <ul id="prioritasList" class="list-group mt-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span class="priority-number">{{ $i }}</span>
                                        <span class="priority-name">-</span>
                                        <button class="btn btn-sm btn-danger removeDosen" style="display: none;">X</button>
                                    </li>
                                @endfor
                            </ul>
                    </div>
                </div>

                <!-- Tombol Simpan & Selanjutnya -->
                <div class="d-flex justify-content-between mt-3">
                    <a href={{ route('topik-tugas-akhir') }} class="btn btn-info ml-3">Sebelumnya</a>
                    <a href={{ route('prioritas-dosen-pembimbing') }} class="btn btn-primary ml-3">Simpan Draft</a>
                    <a href={{ route('prioritas-dosen-pembimbing') }} class="btn btn-info ml-3">Selanjutnya</a>
                </div>
            </div>
    </div>

    <!-- Modal untuk Riwayat Topik -->
    <div class="modal fade" id="historyModal" tabindex="-1" aria-labelledby="historyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="historyModalLabel">Riwayat Topik</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="dosenName"></p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Tahun</th>
                                <th>Riwayat Topik</th>
                            </tr>
                        </thead>
                        <tbody id="historyContent">
                            {{-- Data akan diisi lewat JS --}}
                        </tbody>
                    </table>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let selectedItem = null;

        document.querySelectorAll('.addDosen').forEach(button => {
            button.addEventListener('click', function () {
                let name = this.getAttribute('data-name');
                let prioritasList = document.querySelectorAll('#prioritasList .priority-name');
                for (let item of prioritasList) {
                    if (item.textContent === '-') {
                        item.textContent = name;
                        item.parentElement.querySelector('.removeDosen').style.display = 'inline-block';
                        break;
                    }
                }
            });
        });

        document.querySelectorAll('#prioritasList .list-group-item').forEach(item => {
            item.addEventListener('click', function () {
                document.querySelectorAll('#prioritasList .list-group-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                selectedItem = this;
            });
        });

        document.getElementById('moveUp').addEventListener('click', function () {
            if (selectedItem && selectedItem.previousElementSibling) {
                selectedItem.parentNode.insertBefore(selectedItem, selectedItem.previousElementSibling);
            }
        });

        document.getElementById('moveDown').addEventListener('click', function () {
            if (selectedItem && selectedItem.nextElementSibling) {
                selectedItem.parentNode.insertBefore(selectedItem.nextElementSibling, selectedItem);
            }
        });

        document.addEventListener('click', function (event) {
            if (!event.target.closest('#prioritasList .list-group-item')) {
                document.querySelectorAll('#prioritasList .list-group-item').forEach(i => i.classList.remove('active'));
                selectedItem = null;
            }
        });
        
        // Riwayat Topik Dosen Pembimbing
        document.querySelectorAll('.viewHistory').forEach(button => {
            button.addEventListener('click', function () {
                let name = this.getAttribute('data-name');
                document.getElementById('dosenName').textContent = name;
                let historyContent = document.getElementById('historyContent');
                historyContent.innerHTML = `
                    <tr>
                        <td>2024</td>
                        <td>
                            <ul>
                                <li>Data and Information Management</li>
                                <li>Machine Learning</li>
                                <li>Computer Vision</li>
                                <li>Pengembangan Perangkat Lunak</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>2025</td>
                        <td>
                            <ul>
                                <li>Pengembangan Perangkat Lunak</li>
                                <li>Data and Information Management</li>
                            </ul>
                        </td>
                    </tr>
                `;
                new bootstrap.Modal(document.getElementById('historyModal')).show();
            });
        });
    });
</script>
@stop