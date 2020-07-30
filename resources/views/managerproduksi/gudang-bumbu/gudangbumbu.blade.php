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
                                 <th>Status (HC | SP | GS)</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach ($order_masak as $order_masak)
                               <tr>
                                   <td>
                                        {{ date('d/m/Y', strtotime( $order_masak->tanggal_order_masak ) ) }}
                                   </td>
                                   <td>
                                       {{ App\Models\DetailOrderMasak::where('id_order_masak', $order_masak->id_order_masak)
                                       ->where('id_bahan_product', 'PR00000000001')->value('jumlah') }}
                                   </td>
                                   <td>
                                       {{ App\Models\DetailOrderMasak::where('id_order_masak', $order_masak->id_order_masak)
                                       ->where('id_bahan_product', 'PR00000000002')->value('jumlah') }}
                                   </td>
                                   <td>
                                       {{ App\Models\DetailOrderMasak::where('id_order_masak', $order_masak->id_order_masak)
                                       ->where('id_bahan_product', 'PR00000000003')->value('jumlah') }}
                                   </td>
                                   <td colspan="3">
                                        {{ App\Models\DetailOrderMasak::where('id_order_masak', $order_masak->id_order_masak)
                                            ->where('id_bahan_product', 'PR00000000001')->value('presentase_status') }}
                                        % | 
                                        {{ App\Models\DetailOrderMasak::where('id_order_masak', $order_masak->id_order_masak)
                                            ->where('id_bahan_product', 'PR00000000002')->value('presentase_status') }}
                                        % | 
                                        {{ App\Models\DetailOrderMasak::where('id_order_masak', $order_masak->id_order_masak)
                                            ->where('id_bahan_product', 'PR00000000003')->value('presentase_status') }}
                                        %
                                   </td>
                               </tr>
                            @endforeach
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
                                 <th>Garam (Kg)</th>
                                 <th>Bumbu sachet</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr>
                                <td>{{ $stockgula }}</td>
                                <td>{{ $stockgaram }}</td>
                                <td>{{ $stockbumbu }}</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>

             </div>
         </div>
         {{-- End Stock bahan --}}

         {{-- Start stock adonan gula + garam --}}
         <div class="card m-b-30">
             <div class="card-header">
                <h5 class="card-title">Stock Bumbu</h5>
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
                            @foreach ($order_masak_2 as $order_masak_2)
                               <tr>
                                   <td>
                                       {{ App\Models\DetailOrderMasak::where('id_order_masak', $order_masak_2->id_order_masak)
                                       ->where('id_bahan_product', 'PR00000000001')->value('jumlah') }}
                                   </td>
                                   <td>
                                       {{ App\Models\DetailOrderMasak::where('id_order_masak', $order_masak_2->id_order_masak)
                                       ->where('id_bahan_product', 'PR00000000002')->value('jumlah') }}
                                   </td>
                                   <td>
                                       {{ App\Models\DetailOrderMasak::where('id_order_masak', $order_masak_2->id_order_masak)
                                       ->where('id_bahan_product', 'PR00000000003')->value('jumlah') }}
                                   </td>
                               </tr>
                            @endforeach
                        </tbody>
                     </table>
                 </div>

             </div>
         </div>
         {{-- End Stock adonan gula + garam--}}

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

{{-- Custom Script --}}
<script src="{{ asset('/managerproduksi/js/gudangbumbu.js') }}"></script>
@endsection
