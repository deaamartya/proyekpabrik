{{-- Layout --}}
@extends('managerproduksi/layout')

{{-- Judul --}}
@section('title', 'Manager Produksi | Data Produksi | Gudang Bumbu | Stock Bumbu Ready')

{{-- CSS Tambahan --}}
@section('extra-css')
<!-- DataTables css -->
<link href="{{ asset('/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
{{-- Custom CSS --}}
<link rel="stylesheet" href="{{ asset('/managerproduksi/css/gudangbumbu.css') }}">
@endsection

{{-- Judul Halaman --}}
@section('page-title', 'Stock Bumbu Ready')

{{-- Breadcrumbbar --}}
@section('breadcrumb')
<li class="breadcrumb-item"><a href="">Data Produksi</a></li>
<li class="breadcrumb-item"><a href="{{ url('/manager-produksi/gudang-bumbu') }}">Gudang Bumbu</a></li>
<li class="breadcrumb-item active" aria-current="page">Stock Bumbu Ready</li>
@endsection


{{-- Konten Utama --}}
@section('content')
 <!-- Start row -->
 <div class="row">
     <!-- Start col -->
     <div class="col-lg-12">

        {{-- Start Adonan Bumbu Ready --}}
         <div class="card m-b-30">
             <div class="card-header">
                <h5 class="card-title">Bumbu Ready</h5>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="default-datatable" class="display table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>Tanggal</th>
                                 <th>Masuk (Kg)</th>
                                 <th>Keluar (Kg)</th>
                                 <th>Stock (Kg)</th>
                                 <th>Target Keluar (Kg)</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>07/06/20</td>
                                 <td>45</td>
                                 <td>50</td>
                                 <td>18</td>
                                 <td>18</td>
                             </tr>
                             <tr>
                                 <td>07/06/20</td>
                                 <td>45</td>
                                 <td>50</td>
                                 <td>18</td>
                                 <td>18</td>
                             </tr>
                             <tr>
                                 <td>07/06/20</td>
                                 <td>45</td>
                                 <td>50</td>
                                 <td>18</td>
                                 <td>18</td>
                             </tr>
                             <tr>
                                 <td>07/06/20</td>
                                 <td>45</td>
                                 <td>50</td>
                                 <td>18</td>
                                 <td>18</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>

             </div>
         </div>
         {{-- End Adonan Bumbu Ready--}}

     </div>
     <!-- End col -->
 </div>
 <!-- End row -->

@endsection


{{-- Script Tambahan --}}
@section('extra-script')
<!-- Datatable js -->
<script src="{{ asset('/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
{{-- <script src="{{ asset('/assets/plugins/datatables/dataTables.responsive.min.js') }}"></script> --}}
{{-- <script src="{{ asset('/assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script> --}}
<script src="{{ asset('/assets/js/custom/custom-table-datatable.js') }}"></script>

{{-- Modal Script --}}
<script src="{{ asset('/managerproduksi/js/gudangbumbu.js') }}"></script>
@endsection
