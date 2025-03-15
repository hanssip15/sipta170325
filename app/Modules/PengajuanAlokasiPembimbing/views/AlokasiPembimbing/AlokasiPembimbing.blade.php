@extends('adminlte::page')

@section('title', 'Alokasi Dosen Pembimbing')

@section('content_header')
    <h1>Alokasi Dosen Pembimbing</h1>
@stop

@section('content')
    <div class="p-4">
        <div class="d-flex justify-content-between mb-2">
            <div id="dataTableControls"></div>
            <div id="searchBox"></div>
        </div>

        <div class="table-container">
            <table id="alokasiTable" class="table text-center" style="min-width: 1400px;">
                <thead class="sticky-header">
                    <tr class="bg-dark text-white">
                        <th rowspan="2" class="sticky-column no-sort" style="width: 5%; position: sticky; left: 0; background: rgba(0, 0, 0, 0.9);">No</th>
                        <th rowspan="2" class="sticky-column no-sort" style="width: 15%; position: sticky; left: 5%; background: rgba(0, 0, 0, 0.9);">Kelompok</th>
                        <th rowspan="2" class="no-sort" style="width: 20%;">Anggota</th>
                        <th rowspan="2" class="no-sort" style="width: 15%;">Bidang</th>
                        <th rowspan="2" class="no-sort" style="width: 20%;">Judul/Topik</th>
                        <th colspan="5" class="no-sort" style="width: 20%">Usulan Pembimbing</th>
                        <th colspan="4" class="no-sort" style="width: 30%">Pembimbing</th>
                        <th colspan="3" class="no-sort" style="width: 20%">Penguji</th>
                        <th rowspan="2" class="no-sort" style="width: 15%;">Catatan</th>
                    </tr>
                    <tr class="bg-secondary text-white">
                        <th class="no-sort" style="width: 4%">1</th>
                        <th class="no-sort" style="width: 4%">2</th>
                        <th class="no-sort" style="width: 4%">3</th>
                        <th class="no-sort" style="width: 4%">4</th>
                        <th class="no-sort" style="width: 4%">5</th>
                        <th class="no-sort" style="width: 10%">1</th>
                        <th class="no-sort" style="width: 15%">Detail</th>
                        <th class="no-sort" style="width: 10%">2</th>
                        <th class="no-sort" style="width: 15%">Detail</th>
                        <th class="no-sort" style="width: 10%">1</th>
                        <th class="no-sort" style="width: 10%">2</th>
                        <th class="no-sort" style="width: 10%">3</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $row)
                        <tr class="bg-light">
                            <td class="align-middle sticky-column" style="position: sticky; left: 0; background: white;">{{ $index + 1 }}</td>
                            <td class="align-middle sticky-column" style="position: sticky; left: 5%; background: white;">{{ $row['kota'] }}</td>
                            <td class="align-middle">
                                <ul class="m-0 p-0" style="list-style-type: none;">
                                    @foreach ($row['anggota'] as $anggota)
                                        <li>{{ $anggota }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="align-middle">{{ $row['bidang'] }}</td>
                            <td class="align-middle">{{ $row['judul'] }}</td>
                            @foreach ($row['usulanDosen'] as $dosen)
                                <td class="align-middle">{{ $dosen }}</td>
                            @endforeach
                            <td class="align-middle status-cell" data-status="belum_fix">
                                <input type="text" class="form-control text-center pembimbing mb-2" data-index="{{ $index }}" name="pembimbing1">
                                <label>Status:</label>
                                <select class="form-control status-dropdown w-100" onchange="updateStatus(this)">
                                    <option value="belum_fix" selected>Belum Fix</option>
                                    <option value="fix">Fix</option>
                                </select>
                            </td>
                            <td class="align-middle text-left">
                                <div class="detail-content">
                                    <div><strong>Nama:</strong> {{ $row['detailPembimbing']['nama'] ?? '-' }}</div>
                                    <div><strong>KoTA:</strong> P1: {{ $row['detailPembimbing']['pembimbing1_KoTA'] ?? '0' }} |
                                        P2: {{ $row['detailPembimbing']['pembimbing2_KoTA'] ?? '0' }} |
                                        Total: {{ $row['detailPembimbing']['jumlah_KoTA'] ?? '0' }}</div>
                                    <div><strong>Mhs:</strong> P1: {{ $row['detailPembimbing']['pembimbing1_Mhs'] ?? '0' }} |
                                        P2: {{ $row['detailPembimbing']['pembimbing2_Mhs'] ?? '0' }} |
                                        Total: {{ $row['detailPembimbing']['jumlahMahasiswa'] ?? '0' }}</div>
                                    <div><strong>Kuota:</strong> {{ $row['detailPembimbing']['kuota'] ?? '0' }}</div>
                                    <div><strong>Kelebihan:</strong>
                                        @if (($row['detailPembimbing']['jumlahMahasiswa'] ?? 0) > ($row['detailPembimbing']['kuota'] ?? 0))
                                            <span style="color: red;">
                                                {{ ($row['detailPembimbing']['jumlahMahasiswa'] ?? 0) - ($row['detailPembimbing']['kuota'] ?? 0) }} (Overload)
                                            </span>
                                        @else
                                            <span style="color: green;">Aman</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle status-cell" data-status="belum_fix">
                                <input type="text" class="form-control text-center pembimbing mb-2" data-index="{{ $index }}" name="pembimbing2">
                                <label>Status:</label>
                                <select class="form-control status-dropdown w-100" onchange="updateStatus(this)">
                                    <option value="belum_fix" selected>Belum Fix</option>
                                    <option value="fix">Fix</option>
                                </select>
                            </td>
                            <td class="align-middle text-left">
                                <div class="detail-content">
                                    <div><strong>Nama:</strong> {{ $row['detailPembimbing']['nama'] ?? '-' }}</div>
                                    <div><strong>KoTA:</strong> P1: {{ $row['detailPembimbing']['pembimbing1_KoTA'] ?? '0' }} |
                                        P2: {{ $row['detailPembimbing']['pembimbing2_KoTA'] ?? '0' }} |
                                        Total: {{ $row['detailPembimbing']['jumlah_KoTA'] ?? '0' }}</div>
                                    <div><strong>Mhs:</strong> P1: {{ $row['detailPembimbing']['pembimbing1_Mhs'] ?? '0' }} |
                                        P2: {{ $row['detailPembimbing']['pembimbing2_Mhs'] ?? '0' }} |
                                        Total: {{ $row['detailPembimbing']['jumlahMahasiswa'] ?? '0' }}</div>
                                    <div><strong>Kuota:</strong> {{ $row['detailPembimbing']['kuota'] ?? '0' }}</div>
                                    <div><strong>Kelebihan:</strong>
                                        @if (($row['detailPembimbing']['jumlahMahasiswa'] ?? 0) > ($row['detailPembimbing']['kuota'] ?? 0))
                                            <span style="color: red;">
                                                {{ ($row['detailPembimbing']['jumlahMahasiswa'] ?? 0) - ($row['detailPembimbing']['kuota'] ?? 0) }} (Overload)
                                            </span>
                                        @else
                                            <span style="color: green;">Aman</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                <input type="text" class="form-control text-center penguji" data-index="{{ $index }}" name="penguji1">
                            </td>
                            <td class="align-middle">
                                <input type="text" class="form-control text-center penguji" data-index="{{ $index }}" name="penguji2">
                            </td>
                            <td class="align-middle">
                                <input type="text" class="form-control text-center penguji" data-index="{{ $index }}" name="penguji3">
                            </td>
                            <td class="align-middle" style="min-width: 150px;">
                                <textarea class="form-control text-left auto-expand"
                                          name="catatan_{{ $index }}"
                                          rows="1"
                                          style="overflow: hidden; resize: none;"></textarea>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <button type="button" class="btn btn-dark mr-2">Cek Rekap</button>
            <button type="button" class="btn btn-secondary mr-2" id="saveDraftBtn">Simpan</button>
            <button type="button" class="btn btn-primary" id="openConfirmModal">Submit</button>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .table-container {
            max-height: 500px;
            overflow: auto;
            border: 1px solid #ddd;
            position: relative;
            width: 100%;
        }

        table {
            width: 100%;
            min-width: 1400px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc !important;
            padding: 10px;
            text-align: center;
            white-space: nowrap;
        }

        thead {
            position: sticky;
            top: 0;
            z-index: 1030;
            background: rgba(0, 0, 0, 0.9);
            color: white;
        }

        thead th {
            position: sticky;
            top: 0;
            z-index: 1031;
            background-color: rgba(0, 0, 0, 0.9);
            color: white !important;
            text-align: center;
            padding: 12px;
            border-bottom: 2px solid #fff;
        }

        th.sticky-column {
            background: rgba(0, 0, 0, 0.9) !important;
            color: white !important;
            z-index: 1032 !important;
        }

        td.sticky-column {
            color: black !important;
            background: white !important;
            z-index: 1025;
        }

        .sticky-column:first-child {
            background: rgba(0, 0, 0, 0.9);
            color: white;
        }

        th:first-child {
            white-space: nowrap; /* Mencegah tulisan terpotong */
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: #e2e6ea;
        }

        table.dataTable thead th.no-sort.sorting::before,
        table.dataTable thead th.no-sort.sorting::after,
        table.dataTable thead th.no-sort.sorting_asc::before,
        table.dataTable thead th.no-sort.sorting_asc::after,
        table.dataTable thead th.no-sort.sorting_desc::before,
        table.dataTable thead th.no-sort.sorting_desc::after {
            display: none !important;
            background-image: none !important;
        }

        table.dataTable thead th.no-sort {
            background-image: none !important;
        }
        .status-cell[data-status="fix"] {
            background-color: green !important;
            color: white;
        }
        .status-cell[data-status="belum_fix"] {
            background-color: yellow !important;
            color: white;
        }
        .status-cell {
            min-width: 120px;
            padding: 5px;
        }

        .status-dropdown {
            width: 100% !important;
            text-align: center;
            padding: 5px;
            font-weight: bold;
            min-width: 120px;
        }
    </style>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        var table = $('#alokasiTable').DataTable({
            responsive: true,
            paging: true,
            lengthMenu: [10, 25, 50, 100],
            pageLength: 10,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            columnDefs: [
                { orderable: false, targets: [0, 1, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13] }
            ]
        });

        $('#dataTableControls').html($('.dataTables_length'));
        $('#searchBox').html($('.dataTables_filter'));

        $('#openConfirmModal').click(function () {
            Swal.fire({
                icon: 'warning',
                title: 'Konfirmasi Submit',
                text: 'Finalisasi Alokasi Pembimbing?',
                showCancelButton: true,
                confirmButtonText: 'Ya, Submit',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Sukses',
                        text: 'Alokasi pembimbing berhasil diajukan!',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        });

        $('#saveDraftBtn').click(function () {
            $.ajax({
                url: "{{ route('pengajuanalokasipembimbing.alokasi-pembimbing.simpan') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data tersimpan sebagai draft!',
                        timer: 2000,
                        showConfirmButton: false
                    });
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan saat menyimpan data!',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        });

        $('.pembimbing').on('input', function () {
            var index = $(this).data('index');
            var idDosen = $(this).val();
            if (idDosen) {
                var dosenData = {
                    nama: "Nama Dosen " + idDosen,
                    kuota: 10,
                    jumlahMahasiswa: Math.floor(Math.random() * 20),
                    warning: false
                };
                if (dosenData.jumlahMahasiswa > dosenData.kuota) {
                    dosenData.warning = true;
                }
                var detailHTML = `<div>
                    <strong>Nama Dosen:</strong> ${dosenData.nama}<br>
                    <strong>Kuota:</strong> ${dosenData.kuota}<br>
                    ${dosenData.warning ? '<span style="color: red;">⚠️ Kuota sudah penuh!</span>' : ''}
                </div>`;
                if ($(this).attr('name') === 'pembimbing1') {
                    $('#detail-pembimbing1-' + index).html(detailHTML);
                } else {
                    $('#detail-pembimbing2-' + index).html(detailHTML);
                }
            }
        });
        $('.penguji').on('input', function () {
            var index = $(this).data('index');
            var idPenguji = $(this).val();
            if (idPenguji) {
                var pengujiData = {
                    nama: "Nama Penguji " + idPenguji,
                    kuota: 15,
                    jumlahMahasiswa: Math.floor(Math.random() * 30),
                    warning: false
                };
                if (pengujiData.jumlahMahasiswa > pengujiData.kuota) {
                    pengujiData.warning = true;
                }
                var detailHTML = `<div>
                    <strong>Nama Penguji:</strong> ${pengujiData.nama}<br>
                    <strong>Kuota:</strong> ${pengujiData.kuota}<br>
                    ${pengujiData.warning ? '<span style="color: red;">⚠️ Kuota sudah penuh!</span>' : ''}
                </div>`;
                $('#detail-penguji-' + index).html(detailHTML);
            }
        });
    });

    function updateStatus(selectElement) {
        let cell = selectElement.closest('.status-cell');
        cell.setAttribute('data-status', selectElement.value);
    }
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.auto-expand').forEach(function (textarea) {
            textarea.addEventListener('input', function () {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px'; // Sesuaikan tinggi textarea secara otomatis
            });
        });
    });
</script>
@stop
