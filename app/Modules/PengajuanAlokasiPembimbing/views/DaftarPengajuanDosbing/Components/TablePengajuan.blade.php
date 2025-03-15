@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css" rel="stylesheet" />
<style>
    .btn-action {
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        display: block;
        width: 100%;
    }

    .btn-accept {
        background-color: #28a745 !important;
        color: white;
    }

    .btn-accept:hover {
        background-color: #218838;
    }

    .btn-reject {
        background-color: #dc3545 !important;
        color: white;
        margin-top: 5px;
    }

    .btn-reject:hover {
        background-color: #c82333;
    }

</style>
@stop

@section('content')
<div class="container">
    @if(isset($kelompokData) && count($kelompokData) > 0)
    <table id="kesediaanTable" class="table table-bordered table-striped">
        <thead class="text-center">
            <tr>
                <th>No</th>
                <th>Kelompok</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Bidang</th>
                <th>Judul TA</th>
                <th>Pengajuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($kelompokData as $kelompok)
            @foreach ($kelompok['anggota'] as $index => $anggota)
            <tr>
                @if ($index === 0)
                <td rowspan="{{ count($kelompok['anggota']) }}">{{ $no }}</td>
                <td rowspan="{{ count($kelompok['anggota']) }}">{{ $kelompok['kode'] }}</td>
                @endif
                <td>{{ $anggota['nama'] }}</td>
                <td>{{ $anggota['nim'] }}</td>
                @if ($index === 0)
                <td rowspan="{{ count($kelompok['anggota']) }}">{{ $kelompok['bidang'] }}</td>
                <td rowspan="{{ count($kelompok['anggota']) }}">{{ $kelompok['judul'] }}</td>
                <td rowspan="{{ count($kelompok['anggota']) }}">{{ $kelompok['tanggal'] }}</td>
                <td rowspan="{{ count($kelompok['anggota']) }}">
                    <button class="btn-action btn-accept" data-id="{{ $kelompok['id'] }}">Terima</button>
                    <button class="btn-action btn-reject" data-id="{{ $kelompok['id'] }}">Tolak</button>
                </td>
                @endif
            </tr>
            @endforeach
            @php $no++; @endphp
            @endforeach
        </tbody>
    </table>
    @else
    <p class="text-center">Tidak ada data tersedia.</p>
    @endif
</div>
@stop

@section('js')
@include('pengajuanalokasipembimbing.Helper.JS.SweetAlert')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {

        function handleAction(kelompokId, actionType) {
            let actionText = actionType === "accept" ? "menerima" : "menolak";
            let confirmButtonText = actionType === "accept" ? "Ya, Terima" : "Ya, Tolak";
            let confirmButtonColor = actionType === "accept" ? "#3085d6" : "#d33";

            Swal.fire({
                title: "Konfirmasi"
                , text: `Apakah Anda yakin ingin ${actionText} pengajuan ini?`
                , icon: "warning"
                , showCancelButton: true
                , confirmButtonColor: confirmButtonColor
                , cancelButtonColor: "#6c757d"
                , confirmButtonText: confirmButtonText
                , cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/pengajuan/${kelompokId}/${actionType}`
                        , method: "POST"
                        , data: {
                            _token: "{{ csrf_token() }}"
                        }
                        , success: function(response) {
                            Swal.fire({
                                title: "Berhasil!"
                                , text: `Kelompok ${kelompokId} telah ${actionText}.`
                                , icon: "success"
                            }).then(() => {
                                location.reload();
                            });
                        }
                        , error: function() {
                            Swal.fire({
                                title: "Error!"
                                , text: "Terjadi kesalahan saat memproses permintaan."
                                , icon: "error"
                            });
                        }
                    });
                }
            });
        }

        $(document).on("click", ".btn-accept", function() {
            handleAction($(this).data("id"), "accept");
        });

        $(document).on("click", ".btn-reject", function() {
            handleAction($(this).data("id"), "reject");
        });

    });

</script>
@stop
