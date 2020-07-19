{{-- Layout --}}
@extends('managerproduksi/layout')

{{-- Judul --}}
@section('title', 'Manager Produksi | Data Produksi | Gudang Bumbu | Stock Bahan')

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
@section('page-title', 'Stock Bahan')

{{-- Breadcrumbbar --}}
@section('breadcrumb')
<li class="breadcrumb-item"><a href="">Data Produksi</a></li>
<li class="breadcrumb-item"><a href="{{ url('/manager-produksi/gudang-bumbu') }}">Gudang Bumbu</a></li>
<li class="breadcrumb-item active" aria-current="page">Stock Bahan</li>
@endsection


{{-- Konten Utama --}}
@section('content')
 <!-- Start row -->
 <div class="row">
     <!-- Start col -->
     <div class="col-lg-12">

        {{-- Start Gula --}}
         <div class="card m-b-30">
             <div class="card-header">
                <h5 class="card-title">Stock Gula</h5>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="default-datatable" class="display table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>Tanggal</th>
                                 <th>Keterangan</th>
                                 <th>Masuk (Kg)</th>
                                 <th>Keluar (Kg)</th>
                                 <th>Stock (Kg)</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>07/06/20</td>
                                 <td>Sisa dari packing</td>
                                 <td>60</td>
                                 <td>-</td>
                                 <td>60</td>
                             </tr>
                             <tr>
                                 <td>08/06/20</td>
                                 <td>Proses packing</td>
                                 <td>-</td>
                                 <td>15</td>
                                 <td>45</td>
                             </tr>
                             <tr>
                                 <td>09/06/20</td>
                                 <td>Proses packing</td>
                                 <td>-</td>
                                 <td>14</td>
                                 <td>31</td>
                             </tr>
                             <tr>
                                 <td>09/06/20</td>
                                 <td>Prive dari stock</td>
                                 <td>-</td>
                                 <td>-</td>
                                 <td>30</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>

             </div>
         </div>
         {{-- End Gula --}}

        {{-- Start Garam 50 Kg --}}
         <div class="card m-b-30">
             <div class="card-header">
                <h5 class="card-title">Stock Garam 50 Kg</h5>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="default-datatable-2" class="display table table-striped table-bordered multi-datatable">
                         <thead>
                             <tr>
                                 <th>Tanggal</th>
                                 <th>Keterangan</th>
                                 <th>Masuk (Kg)</th>
                                 <th>Keluar (Kg)</th>
                                 <th>Stock (Kg)</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>07/06/20</td>
                                 <td>Sisa dari packing</td>
                                 <td>60</td>
                                 <td>-</td>
                                 <td>60</td>
                             </tr>
                             <tr>
                                 <td>08/06/20</td>
                                 <td>Proses packing</td>
                                 <td>-</td>
                                 <td>15</td>
                                 <td>45</td>
                             </tr>
                             <tr>
                                 <td>09/06/20</td>
                                 <td>Proses packing</td>
                                 <td>-</td>
                                 <td>14</td>
                                 <td>31</td>
                             </tr>
                             <tr>
                                 <td>09/06/20</td>
                                 <td>Prive dari stock</td>
                                 <td>-</td>
                                 <td>-</td>
                                 <td>30</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>

             </div>
         </div>
         {{-- End Garam 50 Kg --}}

        {{-- Start Garam 25 Kg --}}
         <div class="card m-b-30">
             <div class="card-header">
                <h5 class="card-title">Stock Garam 25 Kg</h5>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="default-datatable-3" class="display table table-striped table-bordered multi-datatable">
                         <thead>
                             <tr>
                                 <th>Tanggal</th>
                                 <th>Keterangan</th>
                                 <th>Masuk (Kg)</th>
                                 <th>Keluar (Kg)</th>
                                 <th>Stock (Kg)</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>07/06/20</td>
                                 <td>Sisa dari packing</td>
                                 <td>60</td>
                                 <td>-</td>
                                 <td>60</td>
                             </tr>
                             <tr>
                                 <td>08/06/20</td>
                                 <td>Proses packing</td>
                                 <td>-</td>
                                 <td>15</td>
                                 <td>45</td>
                             </tr>
                             <tr>
                                 <td>09/06/20</td>
                                 <td>Proses packing</td>
                                 <td>-</td>
                                 <td>14</td>
                                 <td>31</td>
                             </tr>
                             <tr>
                                 <td>09/06/20</td>
                                 <td>Prive dari stock</td>
                                 <td>-</td>
                                 <td>-</td>
                                 <td>30</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>

             </div>
         </div>
         {{-- End Garam 25 Kg --}}

        {{-- Start Bumbu --}}
         <div class="card m-b-30">
             <div class="card-header">
                <h5 class="card-title">Stock Bumbu</h5>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="default-datatable-4" class="display table table-striped table-bordered multi-datatable">
                         <thead>
                             <tr>
                                 <th>Tanggal</th>
                                 <th>Keterangan (Kg)</th>
                                 <th>Masuk (Kg)</th>
                                 <th>Keluar (Kg)</th>
                                 <th>Stock (Kg)</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>07/06/20</td>
                                 <td>Sisa dari packing</td>
                                 <td>60</td>
                                 <td>-</td>
                                 <td>60</td>
                             </tr>
                             <tr>
                                 <td>08/06/20</td>
                                 <td>Proses packing</td>
                                 <td>-</td>
                                 <td>15</td>
                                 <td>45</td>
                             </tr>
                             <tr>
                                 <td>09/06/20</td>
                                 <td>Proses packing</td>
                                 <td>-</td>
                                 <td>14</td>
                                 <td>31</td>
                             </tr>
                             <tr>
                                 <td>09/06/20</td>
                                 <td>Prive dari stock</td>
                                 <td>-</td>
                                 <td>-</td>
                                 <td>30</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>

             </div>
         </div>
         {{-- End Bumbu --}}

         

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
<script src="{{ asset('/managerproduksi/js/multi-datatable.js') }}"></script>
@endsection
