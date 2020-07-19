@section('title') 
Soyuz - Datatable
@endsection 
@extends('gudangbumbu.layouts.main')
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
                                    <th>Terambil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2011/04/25</td>
                                    <td>50</td>
                                    <td>-</td>
                                    <td>50</td>
                                    <td class="text-danger">100%</td>
                                    <td class="text-danger">100%</td>
                                </tr>
                                <tr>
                                    <td>2011/04/25</td>
                                    <td>-</td>
                                    <td>40</td>
                                    <td>60</td>
                                    <td class="text-danger">80%</td>
                                    <td class="text-danger">40%</td>
                                </tr>
                                <tr>
                                    <td>2011/04/25</td>
                                    <td>50</td>
                                    <td>-</td>
                                    <td>30</td>
                                    <td class="text-danger">0%</td>
                                    <td class="text-danger">0%</td>
                                </tr>
                                <tr>
                                    <td>2011/04/25</td>
                                    <td>20</td>
                                    <td>30</td>
                                    <td>60</td>
                                    <td class="text-danger">0%</td>
                                    <td class="text-danger">0%</td>
                                </tr>
                                <tr>
                                    <td>2011/04/25</td>
                                    <td>30</td>
                                    <td>20</td>
                                    <td>20</td>
                                    <td class="text-danger">0%</td>
                                    <td class="text-danger">0%</td>
                                </tr>                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>HC</th>
                                    <th>SP</th>
                                    <th>GS</th>
                                    <th>Status</th>
                                    <th>Terambil</th>
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
                    <h5 class="page-title text-left pl-5">Stock Bahan</h5>
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
                                    <th>Gula Karung (Kg)</th>
                                    <th>Garam 50 Kg Karung (Kg)</th>
                                    <th>Garam 25 Kg Karung (Kg)</th>
                                    <th>Bumbu Sachet</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>30[20]</td>
                                    <td>20</td>
                                    <td>10[12]</td>
                                    <td>50</td>
                                </tr>                               
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Gula Karung (Kg)</th>
                                    <th>Garam 50 Kg Karung (Kg)</th>
                                    <th>Garam 25 Kg Karung (Kg)</th>
                                    <th>Bumbu Sachet</th>
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
                    <h5 class="page-title text-left pl-5">Stock Adonan Gula</h5>
                </div>
            </div>
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default-datatable3" class="display table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>HC</th>
                                    <th>SP</th>
                                    <th>GS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>20</td>
                                    <td>30</td>
                                    <td>60</td>
                                </tr>
                                <tr>
                                    <td>30</td>
                                    <td>20</td>
                                    <td>20</td>
                                </tr>                                
                            </tbody>
                            <tfoot>
                                <tr>
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
        <div class="row align-items-center">
                <div class="">
                    <h5 class="page-title text-left pl-5">Stock Adonan Gula + Garam</h5>
                </div>
            </div>
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default-datatable4" class="display table table-striped table-bordered">
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
                                    <td>20</td>
                                    <td>80</td>
                                </tr>
                                <tr>
                                    <td>70</td>
                                    <td>50</td>
                                    <td>50</td>
                                </tr>                                
                            </tbody>
                            <tfoot>
                                <tr>
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
        <div class="row align-items-center">
                <div class="">
                    <h5 class="page-title text-left pl-5">Stock Bumbu Ready</h5>
                </div>
            </div>
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default-datatable5" class="display table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>HC</th>
                                    <th>SP</th>
                                    <th>GS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>50</td>
                                    <td>80</td>
                                    <td>40</td>
                                </tr>                            
                            </tbody>
                            <tfoot>
                                <tr>
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
        $('#default-datatable1').DataTable( {
            "order": [[ 0, "asc" ]],
            responsive: true
        });
    });

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
        $('#default-datatable3').DataTable( {
            "order": [[ 0, "asc" ]],
            responsive: true
        });
    });

    "use strict";
    $(document).ready(function() {
        /* -- Table - Datatable -- */
        $('#default-datatable4').DataTable( {
            "order": [[ 0, "asc" ]],
            responsive: true
        });
    });

    "use strict";
    $(document).ready(function() {
        /* -- Table - Datatable -- */
        $('#default-datatable5').DataTable( {
            "order": [[ 0, "asc" ]],
            responsive: true
        });
    });    
</script>
@endsection 