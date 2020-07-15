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
                <form action="" method="POST">
                    @csrf

                    {{-- <input type="hidden" name="id" id="id"> --}}

                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" name="" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">HC</label>
                        <input type="number" name="" id="" class="form-control" min="0">
                    </div>

                    <div class="form-group">
                        <label for="">SP</label>
                        <input type="number" name="" id="" class="form-control" min="0">
                    </div>

                    <div class="form-group">
                        <label for="">GS</label>
                        <input type="number" name="" id="" class="form-control" min="0">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                        <button type="button" class="btn btn-primary">SIMPAN</button>
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
@endsection
