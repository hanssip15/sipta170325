@extends('adminlte::page')

@section('title', 'Cek Plagiarisme')

@section('content_header')
    <h1>Daftar Dokumen</h1>
@stop

@section('content')
    <p>Belum ada dokumen yang tersedia.</p>
    <a href="{{ url('/cek-plagiarisme/1') }}" class="btn btn-primary">Lihat Contoh Detail</a>
@stop


@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop