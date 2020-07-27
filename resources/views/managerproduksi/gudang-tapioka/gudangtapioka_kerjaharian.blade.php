{{-- Layout --}}
@extends('managerproduksi/layout')

{{-- Judul --}}
@section('title', 'Manager Produksi | Data Produksi | Gudang Tapioka | Kerja Harian')

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
@section('page-title', 'Kerja Harian Gudang Tepung Tapioka')

{{-- Breadcrumbbar --}}
@section('breadcrumb')
<li class="breadcrumb-item"><a href="">Data Produksi</a></li>
<li class="breadcrumb-item"><a href="{{ url('/manager-produksi/gudang-tapioka') }}">Gudang Tapioka</a></li>
<li class="breadcrumb-item active" aria-current="page">Kerja Harian</li>
@endsection


{{-- Konten Utama --}}
@section('content')
<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header d-flex justify-content-center">
                <h5 class="card-title">Proses Packing Tepung</h5>
            </div>
            <div class="card-body">
                <h4 class="card-subtitle">Order Masak (Plastik)</h4>
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
                            @foreach ($order_masak as $order_masak)
                               <tr>
                                   <td>
                                       {{ $order_masak->tanggal_order_masak }}
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
                                   <td class="status_order">
                                       {{ $order_masak->status }}
                                   </td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End col -->
</div>
<!-- End row -->


{{-- Modal Ambil Stock Tepung--}}
<div class="modal fade" id="modal-ambil-tepung" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
   aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="modal-form-lable">Ambil Stock Karung</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <form action="" method="POST">
                   @csrf

                   {{-- <input type="hidden" name="id" id="id"> --}}
                   <div class="form-group form-jenis-kacang">
                       <label for="jenis-karung" class="form-label">Jenis Karung</label>
                       <select name="jenis-karung" id="jenis-karung" class="select2-single form-control">
                           <option value="">25 Kg</option>
                           <option value="">50 Kg</option>
                       </select>
                   </div>

                   <div class="form-group">
                       <label for="berat" class="col-form-label">Berat Diambil (Kg)</label>
                       <input type="text" class="form-control @error('berat') is-invalid @enderror" id="berat"
                           name="berat" value="{{ old('berat') }}" autocomplete="off">

                       @error('berat')
                       <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                       <button type="button" class="btn btn-primary">OK</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
</div>

{{-- Modal Tambah Hasil Packing--}}
<div class="modal fade" id="modal-tambah-packing" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
   aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="modal-form-lable">Tambah Hasil Packing</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="modal-body">
               <form action="" method="POST">
                   @csrf

                   {{-- <input type="hidden" name="id" id="id"> --}}

                   <div class="form-group">
                       <label for="jumlah-hasil" class="col-form-label">Jumlah Hasil (Plastik)</label>
                       <input type="text" class="form-control @error('jumlah-hasil') is-invalid @enderror" id="jumlah-hasil"
                           name="jumlah-hasil" value="{{ old('jumlah-hasil') }}" autocomplete="off">

                       @error('jumlah-hasil')
                       <div class="invalid-feedback">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                       <button type="button" class="btn btn-primary">OK</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
</div>
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
