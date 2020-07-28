{{-- Layout --}}
@extends('managerproduksi/layout')

{{-- Judul --}}
@section('title', 'Manager Produksi')

{{-- CSS Tambahan --}}
@section('extra-css')

@endsection

{{-- Judul Halaman --}}
@section('page-title', 'Dashboard')

{{-- Breadcrumbbar --}}
@section('breadcrumb')
{{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endsection

{{-- Konten Utama --}}
@section('content')

@endsection

{{-- Script Tambahan --}}
@section('extra-script')
<script src="{{ asset('/managerproduksi/js/dashboard.js') }}"></script>
@endsection