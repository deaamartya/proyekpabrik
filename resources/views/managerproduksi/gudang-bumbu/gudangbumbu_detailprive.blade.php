{{-- Layout --}}
@extends('managerproduksi/layout')

{{-- Judul --}}
@section('title', 'Manager Produksi | Data Produksi | Gudang Bumbu | Detail Prive')

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
@section('page-title', 'Detail Prive')

{{-- Breadcrumbbar --}}
@section('breadcrumb')
<li class="breadcrumb-item"><a href="">Data Produksi</a></li>
<li class="breadcrumb-item"><a href="{{ url('/manager-produksi/gudang-bumbu') }}">Gudang Bumbu</a></li>
<li class="breadcrumb-item active" aria-current="page">Detail Prive</li>
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
                <h5 class="card-title">Detail Prive Gula</h5>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="default-datatable-1" class="display table table-striped table-bordered multi-datatable">
                         <thead>
                             <tr>
                                 <th>Tanggal</th>
                                 <th>Keterangan</th>
                                 <th>Prive (Kg)</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>01/06/20</td>
                                 <td>Prive dari stock</td>
                                 <td>10</td>
                             </tr>
                             <tr>
                                 <td>04/06/20</td>
                                 <td>Prive dari proses packing</td>
                                 <td>4</td>
                             </tr>
                             <tr>
                                 <td>06/06/20</td>
                                 <td>Prive dari proses packing</td>
                                 <td>6</td>
                             </tr>
                             <tr>
                                 <td>09/06/20</td>
                                 <td>Prive dari stock</td>
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
                <h5 class="card-title">Detail Prive Garam 50 Kg</h5>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="default-datatable-2" class="display table table-striped table-bordered multi-datatable">
                         <thead>
                             <tr>
                                 <th>Tanggal</th>
                                 <th>Keterangan</th>
                                 <th>Prive (Kg)</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>01/06/20</td>
                                 <td>Prive dari stock</td>
                                 <td>10</td>
                             </tr>
                             <tr>
                                 <td>04/06/20</td>
                                 <td>Prive dari proses packing</td>
                                 <td>4</td>
                             </tr>
                             <tr>
                                 <td>06/06/20</td>
                                 <td>Prive dari proses packing</td>
                                 <td>6</td>
                             </tr>
                             <tr>
                                 <td>09/06/20</td>
                                 <td>Prive dari stock</td>
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
                <h5 class="card-title">Detail Prive Garam 25 Kg</h5>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="default-datatable-3" class="display table table-striped table-bordered multi-datatable">
                         <thead>
                             <tr>
                                 <th>Tanggal</th>
                                 <th>Keterangan</th>
                                 <th>Prive (Kg)</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>01/06/20</td>
                                 <td>Prive dari stock</td>
                                 <td>10</td>
                             </tr>
                             <tr>
                                 <td>04/06/20</td>
                                 <td>Prive dari proses packing</td>
                                 <td>4</td>
                             </tr>
                             <tr>
                                 <td>06/06/20</td>
                                 <td>Prive dari proses packing</td>
                                 <td>6</td>
                             </tr>
                             <tr>
                                 <td>09/06/20</td>
                                 <td>Prive dari stock</td>
                                 <td>30</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>

             </div>
         </div>
         {{-- End Garam 25 Kg --}}


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
