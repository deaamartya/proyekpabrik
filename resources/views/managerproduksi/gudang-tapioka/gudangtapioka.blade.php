{{-- Layout --}}
@extends('managerproduksi/layout')

{{-- Judul --}}
@section('title', 'Manager Produksi | Data Produksi | Gudang Tepung Tapioka')

{{-- CSS Tambahan --}}
@section('extra-css')
<!-- DataTables css -->
<link href="{{ asset('/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
{{-- Custom CSS --}}
<link rel="stylesheet" href="{{ asset('/managerproduksi/css/gudangtapioka.css') }}">
@endsection

{{-- Judul Halaman --}}
@section('page-title', 'Gudang Tepung Tapioka')

{{-- Breadcrumbbar --}}
@section('breadcrumb')
<li class="breadcrumb-item"><a href="">Data Produksi</a></li>
<li class="breadcrumb-item active" aria-current="page">Gudang Tepung Tapioka</li>
@endsection


{{-- Konten Utama --}}
@section('content')
 <!-- Start row -->
 <div class="row">
     <!-- Start col -->
     <div class="col-lg-12">

        {{-- Start Order Masak --}}
         <div class="card m-b-30">
             <div class="card-header">
                 <div class="row">
                     <h5 class="card-title mx-4">Order Masak</h5>
                     <h5 class="card-title ml-auto mr-4">10 JUni 2020</h5>
                </div>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="default-datatable" class="display table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>Tanggal</th>
                                 <th>HC</th>
                                 <th>SP</th>
                                 <th>GS</th>
                                 <th>Status</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>09/06/20</td>
                                 <td>50</td>
                                 <td>-</td>
                                 <td>50</td>
                                 <td class="selesai">Selesai</td>
                             </tr>
                             <tr>
                                 <td>10/06/20</td>
                                 <td>-</td>
                                 <td>40</td>
                                 <td>60</td>
                                 <td class="ready">Ready</td>
                             </tr>
                             <tr>
                                 <td>11/06/20</td>
                                 <td>50</td>
                                 <td>-</td>
                                 <td>30</td>
                                 <td class="ready">Ready</td>
                             </tr>
                             <tr>
                                 <td>12/06/20</td>
                                 <td>20</td>
                                 <td>50</td>
                                 <td>60</td>
                                 <td class="belum">Belum</td>
                             </tr>
                             <tr>
                                 <td>13/06/20</td>
                                 <td>230</td>
                                 <td>30</td>
                                 <td>20</td>
                                 <td class="belum">Belum</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>

             </div>
         </div>
         {{-- End Order Masak --}}

         {{-- Start Stock Gudang --}}
         <div class="card m-b-30">
             <div class="card-header">
                <h5 class="card-title">Stock Gudang</h5>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="default-datatable" class="display table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>Kacang 25 (Kg)</th>
                                 <th>Kacang 50 (Kg)</th>
                                 <th>Masakan (Plastik)</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>500</td>
                                 <td>600</td>
                                 <td>2000</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>

             </div>
         </div>
         {{-- End Stock Gudang --}}

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
<script src="{{ asset('/managerproduksi/js/gudangtapioka.js') }}"></script>
@endsection
