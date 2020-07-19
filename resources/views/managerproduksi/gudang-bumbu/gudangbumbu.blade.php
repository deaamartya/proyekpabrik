{{-- Layout --}}
@extends('managerproduksi/layout')

{{-- Judul --}}
@section('title', 'Manager Produksi | Data Produksi | Gudang Bumbu')

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
@section('page-title', 'Gudang Bumbu')

{{-- Breadcrumbbar --}}
@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">Data Produksi</a></li>
<li class="breadcrumb-item active" aria-current="page">Gudang Bumbu</li>
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
                    <h5 class="card-title ml-3">Order Masak</h5>
                    <h5 class="card-title ml-auto mr-3">10 Juni 2020</h5>
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
                                 <th>Terambil</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>09/06/20</td>
                                 <td>-</td>
                                 <td>50</td>
                                 <td>30</td>
                                 <td class="ready">100%</td>
                                 <td class="ready">100%</td>
                             </tr>
                             <tr>
                                 <td>10/06/20</td>
                                 <td>-</td>
                                 <td>40</td>
                                 <td>60</td>
                                 <td class="belum">80%</td>
                                 <td class="belum">40%</td>
                             </tr>
                             <tr>
                                 <td>11/06/20</td>
                                 <td>50</td>
                                 <td>-</td>
                                 <td>30</td>
                                 <td class="belum">0%</td>
                                 <td class="belum">0%</td>
                             </tr>
                             <tr>
                                 <td>12/06/20</td>
                                 <td>20</td>
                                 <td>50</td>
                                 <td>60</td>
                                 <td class="belum">0%</td>
                                 <td class="belum">0%</td>
                             </tr>
                             <tr>
                                 <td>13/06/20</td>
                                 <td>30</td>
                                 <td>30</td>
                                 <td>20</td>
                                 <td class="belum">0%</td>
                                 <td class="belum">0%</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>

             </div>
         </div>
         {{-- End Order Masak --}}

         {{-- Start stock bahan --}}
         <div class="card m-b-30">
             <div class="card-header">
                <h5 class="card-title">Stock Bahan</h5>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="default-datatable" class="display table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>Gula (Kg)</th>
                                 <th>Garam 50 Kg (Kg)</th>
                                 <th>Garam 25 Kg (Kg)</th>
                                 <th>Bumbu (sachet)</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>20</td>
                                 <td>20</td>
                                 <td>12</td>
                                 <td>50</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>

             </div>
         </div>
         {{-- End Stock bahan --}}

         {{-- Start stock adonan gula --}}
         <div class="card m-b-30">
             <div class="card-header">
                <h5 class="card-title">Stock Adonan Gula</h5>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="default-datatable" class="display table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>HC</th>
                                 <th>SP</th>
                                 <th>GS</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>30</td>
                                 <td>0</td>
                                 <td>10</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>

             </div>
         </div>
         {{-- End Stock adonan gula --}}

         {{-- Start stock adonan gula + garam --}}
         <div class="card m-b-30">
             <div class="card-header">
                <h5 class="card-title">Stock Adonan Gula + Garam</h5>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="default-datatable" class="display table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>HC</th>
                                 <th>SP</th>
                                 <th>GS</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>70</td>
                                 <td>80</td>
                                 <td>50</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>

             </div>
         </div>
         {{-- End Stock adonan gula + garam--}}

         {{-- Start stock bumbu ready --}}
         <div class="card m-b-30">
             <div class="card-header">
                <h5 class="card-title">Stock Bumbu Ready</h5>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="default-datatable" class="display table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>HC</th>
                                 <th>SP</th>
                                 <th>GS</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>0</td>
                                 <td>20</td>
                                 <td>20</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>

             </div>
         </div>
         {{-- End Stock bumbu ready--}}

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
