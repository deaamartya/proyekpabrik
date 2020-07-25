@section('title') 
Soyuz - Datatable
@endsection 
@extends('gudangbawang.layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<style>
    .hide{
        display: none !important;
    }
    .form-control[readonly] {
        background-color: white !important; 
    }
</style>
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center mb-5">
        <div class="col-8">
            <h4 class="page-title text-left pl-5">Pembagian Bawang</h4>
        </div>
        <div class="col-4">
            <h4 class="page-title text-right pr-5">10 Juni 2020</h4>           
        </div>
    </div>
    <div class="row align-items-between">
        @if(!$cek)
        <div class="col">
            <div class="widgetbar">
                <button class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#addModal">Tambah</button>
            </div>                        
        </div>
        <div class="col">
            <div class="widgetbar">
                <button id="hapus" class="btn btn-danger btn-lg btn-block">Hapus</button>
            </div>                        
        </div>
        <div class="col">
            <div class="widgetbar">
                <button class="btn btn-success btn-lg btn-block" id="btn-simpan">Simpan Data</button>
            </div>                        
        </div>
        @endif
    </div>
    <div class="row align-items-center px-5 py-3">
        <div class="col">
            <div class="widgetbar">
                <form>
                    <div class="form-row align-items-center">
                        <div class="form-group col-sm-6">
                            <label for="orderbesok" class="text-left">Order Besok</label>
                            <input type="text" class="form-control" readonly name="orderbesok" id="orderbesok" placeholder="100" value="{{$orderbesok->jumlah}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="stockbebas">Stock Bebas</label>
                            <input type="text" class="form-control" name="stockbebas" id="stockbebas" placeholder="10" value="{{$stockbebas}}" readonly>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="form-group col-sm-4">
                            <label for="ratasusut">Rata2 Susut</label>
                            <input type="text" class="form-control disable" name="ratasusut" id="ratasusut" value="{{$ratasusut}}%" readonly>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="targetkupas">Target Kupas (Kg)</label>
                            <input type="text" class="form-control disable" name="targetkupas" id="targetkupas" value="{{$targetkupas->jumlah}}" readonly>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="proseshariini">Proses Hari Ini</label>
                            <input type="text" class="form-control" name="proseshariini" id="proseshariini" placeholder="77" value="{{$totalproses->keluar}}">
                        </div>
                    </div>
                </form>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="display table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Terima (Kg)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach($tenagakupas as $t)

                                    @if($t->status)
                                    <tr>
                                        <td>{{$t->nama}}</td>
                                        <td>{{$jumlah[$i]->jumlah}}</td>
                                    </tr>
                                    @endif
                                    @php $i++; @endphp
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
</div>
<!-- End Contentbar -->
@endsection 
@section('script')
<!-- Datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        "use strict";
        var table = $('#datatable').DataTable({
            "searching" : false,
            "paging" : false,
            "info" : false,
            "order": [[ 0, "asc" ]],
            responsive: true,
            "columnDefs": [
                { "targets": 0 , "width": "50%" },
                { "targets": 1 , "width": "45%" }
            ]
        });
    });
    

</script>
@endsection 