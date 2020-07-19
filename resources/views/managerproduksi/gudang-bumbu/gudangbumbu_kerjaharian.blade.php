{{-- Layout --}}
@extends('managerproduksi/layout')

{{-- Judul --}}
@section('title', 'Manager Produksi | Data Produksi | Gudang Bumbu | Kerja Harian')

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
@section('page-title', 'Kerja Harian')

{{-- Breadcrumbbar --}}
@section('breadcrumb')
<li class="breadcrumb-item"><a href="">Data Produksi</a></li>
<li class="breadcrumb-item"><a href="{{ url('/manager-produksi/gudang-bumbu') }}">Gudang Bumbu</a></li>
<li class="breadcrumb-item active" aria-current="page">Kerja Harian</li>
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

         {{-- Start kerja harian adonan gula --}}
         <div class="card m-b-30">
             <div class="card-header">
                <h5 class="card-title">Kerja Harian Adonan Gula</h5>
             </div>
             <div class="card-body">

                 <div class="table-responsive">
                     <table id="default-datatable" class="display table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>Terima (Kg)</th>
                                 <th>Sisa (Kg)</th>
                                 <th>Prive (Kg)</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>20</td>
                                 <td>20</td>
                                 <td>5</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>

                 <h5 class="card-subtitle mt-2">Persediaan Adonan Gula</h5>
                 <div class="table-responsive">
                     <table id="default-datatable" class="display table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>HC (Kg)</th>
                                 <th>SP (Kg)</th>
                                 <th>GS (Kg)</th>
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
         {{-- End kerja harian adonan gula --}}
         
         {{-- Start Kerja Harian Adonan Gula + Garam --}}
         <div class="card m-b-30">
             <div class="card-header">
                <h5 class="card-title">Kerja Harian Adonan Gula + Garam</h5>
             </div>
             <div class="card-body">

                 <div class="table-responsive">
                     <table id="default-datatable" class="display table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>Terima (Kg)</th>
                                 <th>Sisa (Kg)</th>
                                 <th>Prive (Kg)</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                 <td>20</td>
                                 <td>20</td>
                                 <td>5</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>

                 <h5 class="card-subtitle mt-2">Persediaan Adonan Gula + Garam</h5>
                 <div class="table-responsive">
                     <table id="default-datatable" class="display table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>HC (Kg)</th>
                                 <th>SP (Kg)</th>
                                 <th>GS (Kg)</th>
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
         {{-- End Kerja Harian Adonan Gula + Garam --}}

         {{-- Start Kerja Harian Bumbu Ready --}}
         <div class="card m-b-30">
             <div class="card-header">
                <h5 class="card-title">Kerja Harian Bumbu Ready</h5>
             </div>
             <div class="card-body">
                 <h5 class="card-subtitle mt-2">Persediaan Bumbu Ready</h5>
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
         {{-- End Kerja Harian Bumbu Ready --}}

         

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
