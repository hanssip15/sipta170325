@extends('adminlte::page')

@section('title', 'Penentuan Ambang Batas')

@section('content_header')
<h1 class="text-center">PENENTUAN AMBANG BATAS</h1>
@stop

@section('content')
<section class="content">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="search-box">
                <input type="text" class="form-control" id="searchInput" placeholder="Search here...">
            </div>
            <div class="ml-auto d-flex align-items-center">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addAmbangBatasModal">
                    <i class="fas fa-plus mr-2"></i>
                    TAMBAH AMBANG BATAS
                </button>
            </div>
        </div>

        <div class="card-body">
            <div id="jsGrid1"></div>
        </div>
    </div>
</section>

<!-- Modal Tambah Ambang Batas -->
<div class="modal fade" id="addAmbangBatasModal" tabindex="-1" aria-labelledby="addAmbangBatasModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Ambang Batas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Presentase Ambang Batas:</label>
                        <input type="number" class="form-control" id="deskripsi" required min="1" max="100" step="1">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
    $(document).ready(function() {
        $('#addAmbangBatasModal').on('hidden.bs.modal', function() {
            $('#deskripsi').val('');
        });
    });

    $(document).ready(function() {
        console.log("DOM siap, inisialisasi jsGrid..."); // Debugging

        var data = [{
                No: 1,
                AmbangBatas: "20",
                Tanggal: "03-03-2025",
                Koordinator: "Maman Sumaman",
                Status: true
            },
            {
                No: 2,
                AmbangBatas: "30",
                Tanggal: "28-02-2025",
                Koordinator: "Maman Sumaman",
                Status: false
            },
            {
                No: 3,
                AmbangBatas: "50",
                Tanggal: "25-02-2025",
                Koordinator: "Mimin Sumimin",
                Status: false
            }
        ];

        $("#jsGrid1").jsGrid({
            width: "100%",
            height: "400px",
            data: data,
            fields: [{
                    name: "No",
                    type: "number",
                    width: 50,
                    align: "center"
                },
                {
                    name: "AmbangBatas",
                    type: "text",
                    title: "Ambang Batas (%)",
                    width: 100,
                    align: "center"
                },
                {
                    name: "Tanggal",
                    type: "text",
                    width: 150,
                    align: "center"
                },
                {
                    name: "Koordinator",
                    type: "text",
                    title: "Nama Koordinator TA",
                    width: 200,
                    align: "center"
                },
                {
                    name: "Status",
                    type: "text",
                    title: "Status",
                    width: 150,
                    align: "center",
                    itemTemplate: function(value) {
                        return value ? "Sedang Digunakan" : "Tidak Digunakan";
                    }
                }
            ]
        });

        // Fungsi Pencarian
        $("#searchInput").on("keyup", function() {
            var searchValue = $(this).val().toLowerCase();
            var filteredData = data.filter(function(item) {
                var statusText = item.Status ? "Sedang Digunakan" : "Tidak Digunakan";
                return Object.values(item).some(value =>
                    String(value).toLowerCase().includes(searchValue) || statusText.toLowerCase().includes(searchValue)
                );
            });
            $("#jsGrid1").jsGrid("option", "data", filteredData);
        });
    });
</script>
@stop