@section('title') 
Home
@endsection 
@extends('gudangkacang.layouts.main')
@section('style')
<!-- Apex css -->
<link href="{{ asset('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet" type="text/css" />
<!-- jvectormap css -->
<link href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" type="text/css" />
<!-- Slick css -->
<link href="{{ asset('assets/plugins/slick/slick.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/slick/slick-theme.css') }}" rel="stylesheet" type="text/css" />
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
            <h4 class="page-title">Gudang Kacang</h4>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <?php echo date("d-m-Y"); ?>
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
        <div class="col-lg-12 col-xl-12">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">Kacang OB</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="default-datatable1" class="display table table-striped table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th>Tanggal Penerimaan Kacang</th>
                                                    <th>Stock (Kg)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($stockob as $ob)
                                                    <tr>
                                                        <td>{{$ob->timestamp}}</td>
                                                        <td>{{$ob->stock}}</td>
                                                    </tr>
                                                @endforeach 
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Tanggal Penerimaan Kacang</th>
                                                    <th>Stock (Kg)</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">Kacang 7 Ml</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="default-datatable2" class="display table table-striped table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th>Tanggal Penerimaan Kacang</th>
                                                    <th>Stock (Kg)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($stock7ml as $x)
                                                    <tr>
                                                        <td>{{$x->timestamp}}</td>
                                                        <td>{{$x->stock}}</td>
                                                    </tr>
                                                @endforeach 
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Tanggal Penerimaan Kacang</th>
                                                    <th>Stock (Kg)</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
                <!-- Start col -->
                <div class="col-lg-12 col-xl-4">
                    <div class="card m-b-30">
                        <div class="card-header">                                
                            <div class="row align-items-center">
                                <div class="col-9">
                                    <h5 class="card-title mb-0">Kacang 8 Ml</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table id="default-datatable3" class="display table table-striped table-bordered">
                                            <thead>
                                                <tr>      
                                                    <th>Tanggal Penerimaan Kacang</th>
                                                    <th>Stock (Kg)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($stock8ml as $y)
                                                    <tr>
                                                        <td>{{$y->timestamp}}</td>
                                                        <td>{{$y->stock}}</td>
                                                    </tr>
                                                @endforeach 
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Tanggal Penerimaan Kacang</th>
                                                    <th>Stock (Kg)</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->                        
        </div>
        <!-- End col -->
        <div class="col-md-8 col-lg-8">
            <h4>Gudang Kacang Sortir</h4>
        </div>
        <div class="col-lg-12 col-xl-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable4" class="table table-striped table-bordered dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 100px; text-align: center" aria-sort="ascending" aria-label="Stock: activate to sort column descending">Stock</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="GS: activate to sort column ascending">GS</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="SP: activate to sort column ascending">SP</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="HC: activate to sort column ascending">HC</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="Telor: activate to sort column ascending">Telor</th>
                                </thead>
                                <tbody>
                                    <tr role="row">
                                        <td>Kilogram</td>
                                        <td>{{$stockgs}}</td>
                                        <td>{{$stocksp}}</td>
                                        <td>{{$stockhc}}</td>
                                        <td>{{$stocktelor}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

</script>
<!-- Apex js -->
<script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexcharts/irregular-data-series.js') }}"></script>
<!-- jVector Maps js -->
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- Slick js -->
<script src="{{ asset('assets/plugins/slick/slick.min.js') }}"></script>
<!-- Custom Dashboard js -->  
<script src="{{ asset('assets/js/custom/custom-dashboard.js') }}"></script>
@endsection 