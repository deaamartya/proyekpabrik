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
        <div class="col">
            <h2 class="page-title text-left pl-5">Persiapan Masak Kanji</h2>
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
                        <table id="datatable" class="display table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>HC</th>
                                    <th>SP</th>
                                    <th>GS</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>-</td>
                                    <td>40</td>
                                    <td>60</td>
                                    <td><button type="button" class="status btn btn-danger">Belum</button></td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>50</td>
                                    <td>-</td>
                                    <td>30</td>
                                    <td><button type="button" class="status btn btn-danger">Belum</button></td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>20</td>
                                    <td>50</td>
                                    <td>20</td>
                                    <td><button type="button" class="status btn btn-danger">Belum</button></td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>30</td>
                                    <td>30</td>
                                    <td>60</td>
                                    <td><button type="button" class="status btn btn-danger">Belum</button></td>
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
        $('#datatable').DataTable( {
            "searching" : false,
            "paging" : false,
            "info" : false,
            "order": [[ 1, "asc" ]],
            responsive: true
        });
        $('.status').click(function(){
            if( $(this).html() == "Belum" ){
                $(this).removeClass('btn-danger');
                $(this).addClass('btn-success');
                $(this).html("Ready");
            }
            else{
                $(this).addClass('btn-danger');
                $(this).removeClass('btn-success');
                $(this).html("Belum");
            }
        });
    });
</script>
@endsection 