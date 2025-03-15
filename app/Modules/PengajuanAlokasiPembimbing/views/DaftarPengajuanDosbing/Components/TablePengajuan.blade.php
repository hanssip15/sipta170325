@section('css')
<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" rel="stylesheet" />
<style>
    #kesediaanTable thead {
        background-color: black;
        color: white;
    }

</style>
@stop

@section('content')
<div class="container">
    @if(isset($kelompokData) && count($kelompokData) > 0)
    <table id="kesediaanTable" class="display" style="width:100%">
        <thead>
            <tr style="background-color: black; color: white; text-align: center;">
                <th>No</th>
                <th>Kelompok</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Bidang</th>
                <th>Judul TA</th>
                <th>Pengajuan</th>
                <th>Aksi</th> <!-- Kolom baru untuk aksi -->
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($kelompokData as $kelompok)
            @foreach ($kelompok['anggota'] as $index => $anggota)
            <tr class="kelompok-row" data-id="{{ $kelompok['id'] }}">
                @if ($index === 0)
                <td>{{ $no }}</td>
                <td class="merge-col" data-value="{{ $kelompok['kode'] }}">{{ $kelompok['kode'] }}</td>
                <td>{{ $anggota['nama'] }}</td>
                <td>{{ $anggota['nim'] }}</td>
                <td class="merge-col" data-value="{{ $kelompok['bidang'] }}">{{ $kelompok['bidang'] }}</td>
                <td class="merge-col" data-value="{{ $kelompok['judul'] }}">{{ $kelompok['judul'] }}</td>
                <td class="merge-col" data-value="{{ $kelompok['tanggal'] }}">{{ $kelompok['tanggal'] }}</td>
                <td rowspan="{{ count($kelompok['anggota']) }}" class="text-center align-middle">
                    <button class="btn btn-success btn-accept" data-id="{{ $kelompok['id'] }}">Terima</button>
                    <button class="btn btn-danger btn-reject" data-id="{{ $kelompok['id'] }}" style="margin-top: 10px;">Tolak</button>
                </td>
                @else
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>{{ $anggota['nama'] }}</td>
                <td>{{ $anggota['nim'] }}</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                @endif
            </tr>
            @endforeach
            @php $no++; @endphp
            @endforeach
        </tbody>
    </table>
    @else
    <p>Tidak ada data tersedia.</p>
    @endif
</div>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kesediaanTable').DataTable({
            "paging": true
            , "searching": true
            , "ordering": true
            , "info": true
            , "pageLength": 5
            , "lengthMenu": [
                [5, 10, 25, 50]
                , [5, 10, 25, 50]
            ]
            , "order": [
                [0, "asc"]
            ]
            , "language": {
                "search": "Cari:"
                , "lengthMenu": "Tampilkan _MENU_ data per halaman"
                , "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data"
                , "paginate": {
                    "first": "Awal"
                    , "last": "Akhir"
                    , "next": "Selanjutnya"
                    , "previous": "Sebelumnya"
                }
            }
        });
    });

</script>
@stop
