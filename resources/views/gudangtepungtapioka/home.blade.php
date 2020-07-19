@section('title') 
Soyuz - Datatable
@endsection 
@extends('gudangtepungtapioka.layouts.main')
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
        <div class="col">
            <h1 class="page-title text-center pl-5">Gudang Tepung Tapioka</h1>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-8">
            <h2 class="page-title text-left pl-5">Order Masak</h2>
        </div>
        <div class="col-4">
            <h2 class="page-title text-right pr-5">10 Juni 2020</h2>
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
                                    <th>HC</th>
                                    <th>SP</th>
                                    <th>GS</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2011/04/25</td>
                                    <td>50</td>
                                    <td>-</td>
                                    <td>50</td>
                                    <td>Selesai</td>
                                </tr>
                                <tr>
                                    <td>2011/04/25</td>
                                    <td>-</td>
                                    <td>40</td>
                                    <td>60</td>
                                    <td class="text-danger">Ready</td>
                                </tr>
                                <tr>
                                    <td>2011/04/25</td>
                                    <td>50</td>
                                    <td>-</td>
                                    <td>30</td>
                                    <td class="text-danger">Ready</td>
                                </tr>
                                <tr>
                                    <td>2011/04/25</td>
                                    <td>20</td>
                                    <td>30</td>
                                    <td>60</td>
                                    <td class="text-danger">Belum</td>
                                </tr>
                                <tr>
                                    <td>2011/04/25</td>
                                    <td>30</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td class="text-danger">Belum</td>
                                </tr>                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>HC</th>
                                    <th>SP</th>
                                    <th>GS</th>
                                    <th>Status</th>
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
                    <h5 class="page-title text-left pl-5">Stock Gudang</h5>
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
                                    <th>Karung 25 (Kg)</th>
                                    <th>Karung 50 (Kg)</th>
                                    <th>Masakan Plastik</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>500</td>
                                    <td>650</td>
                                    <td>200</td>
                                </tr>
                                <tr>
                                    <td>700</td>
                                    <td>200</td>
                                    <td>450</td>
                                </tr>                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Karung 25 (Kg)</th>
                                    <th>Karung 50 (Kg)</th>
                                    <th>Masakan Plastik</th>
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