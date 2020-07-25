{{-- Layout --}}
@extends('managerproduksi/layout')

{{-- Judul --}}
@section('title', 'Manager Produksi | Order Masak')

{{-- CSS Tambahan --}}
@section('extra-css')
<!-- DataTables css -->
<link href="{{ asset('/assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('/assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
{{-- Custom CSS --}}
<!-- Datepicker css -->
<link href="{{ asset('/assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('/managerproduksi/css/ordermasak.css') }}">
@endsection

{{-- Judul Halaman --}}
@section('page-title', 'Order Masak')

{{-- Breadcrumbbar --}}
@section('breadcrumb')
{{-- <li class="breadcrumb-item"><a href="#">Home</a></li> --}}
<li class="breadcrumb-item active" aria-current="page">Order Masak</li>
@endsection


{{-- Konten Utama --}}
@section('content')
 <!-- Start row -->
 <div class="row">
     <!-- Start col -->
     <div class="col-lg-12">
        {{-- Alert status --}}
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('status') }}
            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

         <div class="card m-b-30">
             <div class="card-header">
                 <h5 class="card-title">Order Masak</h5>
             </div>
             <div class="card-body">
                 <div class="my-2">
                     <button type="button" class="btn btn-primary tombol-input-order-masak" data-animation="zoomIn" data-toggle="modal" data-target="#modal-input-order-masak">
                        <i class="far fa-edit mr-1"></i>
                         INPUT ORDER MASAK
                     </button>
                 </div>
                 <div class="table-responsive">
                     <table id="default-datatable" class="display table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>Tanggal</th>
                                 <th>HC</th>
                                 <th>SP</th>
                                 <th>GS</th>
                                 <th>BAWANG</th>
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
                                    <td>
                                        {{ App\Models\DetailOrderMasak::where('id_order_masak', $order_masak->id_order_masak)
                                        ->where('id_bahan_product', 'BB000000004')->value('jumlah') }}
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


{{-- Modal Input Order Masak--}}
<div class="modal fade" id="modal-input-order-masak" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-form-lable">Input Order Masak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/manager-produksi/order-masak') }}" method="POST">
                    @csrf

                    {{-- <input type="hidden" name="id" id="id"> --}}

                    <div class="form-group">
                        <label for="input_tanggal">Tanggal</label>
                        <input type="date" name="input_tanggal" id="input_tanggal" class="form-control @error('input_tanggal') is-invalid @enderror">
                    
                        @error('input_tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="input_hc">HC</label>
                        <input type="number" name="input_hc" id="input_hc" class="form-control @error('input_hc') is-invalid @enderror" min="0" placeholder="Jumlah (Kg)" autocomplete="off" value="{{ old('input_hc') }}">
                    
                        @error('input_hc')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="input_sp">SP</label>
                        <input type="number" name="input_sp" id="input_sp" class="form-control @error('input_sp') is-invalid @enderror" min="0" placeholder="Jumlah (Kg)" autocomplete="off" value="{{ old('input_sp') }}">
                    
                        @error('input_sp')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="input_gs">GS</label>
                        <input type="number" name="input_gs" id="input_gs" class="form-control @error('input_gs') is-invalid @enderror" min="0" placeholder="Jumlah (Kg)" autocomplete="off" value="{{ old('input_gs') }}">
                    
                        @error('input_gs')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="input_bawang">BAWANG</label>
                        <input type="number" name="input_bawang" id="input_bawang" class="form-control @error('input_bawang') is-invalid @enderror" min="0" placeholder="Jumlah (Kg)" autocomplete="off" value="{{ old('input_bawang') }}">
                    
                        @error('input_bawang')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
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

<!-- Datepicker JS -->
<script src="{{ asset('/assets/plugins/datepicker/datepicker.min.js') }}"></script>
<script src="{{ asset('/assets/plugins/datepicker/i18n/datepicker.en.js') }}"></script>
<script src="{{ asset('/assets/js/custom/custom-form-datepicker.js') }}"></script>

{{-- Modal Script --}}
<script src="{{ asset('/managerproduksi/js/ordermasak.js') }}"></script>
<script src="{{ asset('/managerproduksi/js/ordermasak_tabel.js') }}"></script>
@endsection
