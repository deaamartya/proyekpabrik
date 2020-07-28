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
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-8">
            <h1 class="page-title text-left pl-5">Order Kupas Bawang</h1>
        </div>
        <div class="col-4">
            <h2 class="page-title text-right pr-5">@php echo date("d F Y"); @endphp</h2>
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
                        <table id="default-datatable1" class="display table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Target Kupas (Kg)</th>
                                    <th>Stock (Kg)</th>
                                    <th>Status %</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ordermasak2 as $ord)
                                    <tr>
                                        <td>{{date_format($ord->tanggal_order_masak,'Y-m-d')}}</td>
                                        <td>{{$ord->jumlah}}</td>   
                                        <td>{{$stock1c}}</td>
                                        <td>{{$ord->presentase_status}}</td>
                                    </tr>
                                @endforeach                                 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Target Kupas (Kg)</th>
                                    <th>Stock (Kg)</th>
                                    <th>Status %</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
            <div class="row align-items-center">
                <div class="">
                    <h5 class="page-title text-left pl-5">Order Masak</h5>
                </div>
            </div>
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default-datatable2" class="display table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>HC</th>
                                    <th>SP</th>
                                    <th>GS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ordermasak as $or)
                                    <tr>
                                        <td>{{date_format($or->tanggal_order_masak,'Y-m-d')}}</td>
                                        <td>{{$or->HC}}</td>
                                        <td>{{$or->SP}}</td>
                                        <td>{{$or->GS}}</td>
                                    </tr>
                                @endforeach                                 
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>HC</th>
                                    <th>SP</th>
                                    <th>GS</th>
                                </tr>
                            </tfoot>
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
    "use strict";
    $(document).ready(function() {
        /* -- Table - Datatable -- */
        $('#default-datatable2').DataTable( {
            "order": [[ 0, "asc" ]],
            responsive: true
        });
    });

    "use strict";
    $(document).ready(function() {
        /* -- Table - Datatable -- */
        $('#default-datatable1').DataTable( {
            "order": [[ 0, "asc" ]],
            responsive: true
        });
    });
</script>
@endsection 