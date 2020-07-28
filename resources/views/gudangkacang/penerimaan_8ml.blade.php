@section('title') 
Input Penerimaan Kacang OB
@endsection 
@extends('gudangkacang.layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Input Penerimaan Kacang 8 ML</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Stock</a></li>
                    <li class="breadcrumb-item"><a href="">Gudang Kacang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Input Penerimaan Kacang 8 ML</li>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
            
            </div>                        
        </div>
    </div>          
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Input Penerimaan Kacang 8 ML</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="tanggal">Tanggal Sekarang</label>
                                <input type="text" class="form-control" name="tanggal" id="tanggal_sekarang" placeholder="<?php echo date("d/m/Y"); ?>" disabled="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="tanggal">Tanggal Penerimaan Kacang</label>
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" name="barcode" id="Barcode" placeholder="Input Nomor Barcode" required>
                            </div>
                            <div class="form-group col-md-7">
                                <button type="button" class="btn btn-primary">Scan Barcode</button>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" class="form-control" name="tanggal_penerimaan_kacang" id="tanggal_penerimaan_kacang" placeholder="Input Tanggal Penerimaan Kacang" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="tanggal">Jumlah Karung Diterima</label>
                                <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Karung Diterima" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection 
@section('script')
<!-- Datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-table-datatable.js') }}"></script>
@endsection 