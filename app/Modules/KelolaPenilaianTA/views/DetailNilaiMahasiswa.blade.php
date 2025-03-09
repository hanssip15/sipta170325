@extends('adminlte::page')

@section('title', 'KelolaPenilaianTA')

@section('content_header')
    <div class="d-flex flex-column pl-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="/KelolaPenilaianTA/pengelolaan-nilai">Kelola Penilaian</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
        </nav>
        <h1>Detail Nilai {{ $kategori }}</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex flex-row justify-content-end gap-3">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Status
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Dinilai</a></li>
                        <li><a class="dropdown-item" href="#">Belum dinilai</a></li>
                    </ul>
                </div>
                <div class="search">
                    <input type="text" class="form-control" placeholder="Search">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" data-bs-toggle="tooltip" title="Search"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered text-center">
                <thead class="bg-brown text-white">
                    <tr>
                        <td>No</td>
                        <td>Kelompok TA</td>
                        <td>Penguji</td>
                        <td>Status</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['kelompok'] as $index => $kelompok)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kelompok['kelompok_ta'] }}</td>
                            <td>{{ implode('; ', $kelompok['penguji']) }}</td>
                            <td>
                                @if ($kelompok['status'])
                                    <svg fill="#000000" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg" data-bs-toggle="tooltip" title="Success"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><defs><style>.cls-1{fill:none;}</style></defs><title>task</title><polygon points="14 20.18 10.41 16.59 9 18 14 23 23 14 21.59 12.58 14 20.18"></polygon><path d="M25,5H22V4a2,2,0,0,0-2-2H12a2,2,0,0,0-2,2V5H7A2,2,0,0,0,5,7V28a2,2,0,0,0,2,2H25a2,2,0,0,0,2-2V7A2,2,0,0,0,25,5ZM12,4h8V8H12ZM25,28H7V7h3v3H22V7h3Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="<Transparent Rectangle>" class="cls-1" width="32" height="32"></rect></g></svg>
                                @else
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" data-bs-toggle="tooltip" title="Delay"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 7V12L14.5 13.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                @endif
                            </td>
                            <td>
                                <div class="action d-flex flex-row align-items-center justify-content-center"> 
                                    <div class="edit btn btn-primary btn-sm">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" data-bs-toggle="tooltip" title="Edit"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M9 5H7C5.89543 5 5 5.89543 5 7V19C5 20.1046 5.89543 21 7 21H9M15 5H17C18.1046 5 19 5.89543 19 7V9" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14.902 20.3343L12.7153 20.7716L13.1526 18.585C13.1914 18.3914 13.2865 18.2136 13.4261 18.074L17.5 14L19.5 12L21.4869 13.9869L19.4869 15.9869L15.413 20.0608C15.2734 20.2004 15.0956 20.2956 14.902 20.3343Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>    
                                    </div>
                                    <div class="buka btn btn-primary btn-sm" data-bs-toggle="collapse" data-bs-target="#anggota-{{ $index }}">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" data-bs-toggle="tooltip" title="Buka Detail"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16.1795 3.26875C15.7889 2.87823 15.1558 2.87823 14.7652 3.26875L8.12078 9.91322C6.94952 11.0845 6.94916 12.9833 8.11996 14.155L14.6903 20.7304C15.0808 21.121 15.714 21.121 16.1045 20.7304C16.495 20.3399 16.495 19.7067 16.1045 19.3162L9.53246 12.7442C9.14194 12.3536 9.14194 11.7205 9.53246 11.33L16.1795 4.68297C16.57 4.29244 16.57 3.65928 16.1795 3.26875Z" fill="#ffffff"></path> </g></svg>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr id="anggota-{{ $index }}" class="collapse">
                            <td colspan="5">
                                <table class="table table-light table-bordered">
                                    @foreach ($data['anggota_kelompok'][$index] as $anggota)
                                        <tr>
                                            <td>{{ $anggota['nama'] }}</td>
                                            <td>{{ $anggota['nilai'] }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <ul class="pagination justify-content-end">
                <li class="page-item">
                    <a class="page-link" href="#">Previous</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </div>
    </div>
@stop

@section('css')
    <style>
        .bg-brown {
            background-color: #3E3E3E;
        }

        .text-center {
            text-align: center;
        }
        
        .align-items-center {
            align-items: center;
        }

        .gap-3 {
            gap: 1rem;
        }

        .action {
            gap: 1rem;
        }

        .header svg {
            width: 3rem;
        }

        svg {
            width:1.5rem;
        }

        .search {
            position: relative;
        }

        .search svg {
            position: absolute;
            top: 50%;
            right: 1rem;
            transform: translateY(-50%);
        }

        .rotate-90 {
            transform: rotate(-90deg);
        }

        .buka {
            outline: none;
            box-shadow: none;
        }
    </style>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-bs-toggle="tooltip"]').tooltip(); 

            $('.buka').on('click', function() {
                $(this).find('svg').toggleClass('rotate-90');
            });
        });
        console.log("Hi, I'm using the Laravel-AdminLTE package!"); 
    </script>
@stop