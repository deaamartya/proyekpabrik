{{-- Layout --}}
@extends('managerproduksi/layout')

{{-- Judul --}}
@section('title', 'Manager Produksi')

{{-- CSS Tambahan --}}
@section('extra-css')
<link rel="stylesheet" href="{{ asset('/managerproduksi/css/dashboard.css') }}">
@endsection

{{-- Judul Halaman --}}
@section('page-title', '')

{{-- Breadcrumbbar --}}
@section('breadcrumb')
{{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
{{-- <li class="breadcrumb-item active" aria-current="page">Dashboard</li> --}}
@endsection

{{-- Konten Utama --}}
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="welcome-picture d-flex justify-content-center">
            <img src="{{ asset('/managerproduksi/img/dashboard_manpro.png') }}" alt="Welcome Picture">
        </div>
    </div>
</div>
@endsection

{{-- Script Tambahan --}}
@section('extra-script')
<script src="{{ asset('/managerproduksi/js/dashboard.js') }}"></script>
@endsection