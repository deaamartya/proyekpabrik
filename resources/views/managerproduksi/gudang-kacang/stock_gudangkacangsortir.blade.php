@section('title') 
Stock Gudang Kacang Sortir
@endsection 
@extends('managerproduksi.layouts.main')
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
            <h4 class="page-title">Data Stock Gudang Kacang Sortir</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Produksi</a></li>
                    <li class="breadcrumb-item"><a href="#">Gudang Kacang</a></li>
                    <li class="breadcrumb-item"><a href="#">Stock</a></li>
                    <li class="breadcrumb-item"><a href="#">Gudang Kacang Sortir</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Stock Gudang Kacang Sortir</li>
                </ol>
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

                    <ul class="nav nav-pills justify-content-center custom-tab-button header-tab" id="pills-tab-button" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab-button" data-toggle="pill" href="#pills-home-button" role="tab" aria-controls="pills-home-button" aria-selected="true"><span class="tab-btn-icon"><i class="feather icon-tag"></i></span>GS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab-button" data-toggle="pill" href="#pills-profile-button" role="tab" aria-controls="pills-profile-button" aria-selected="false"><span class="tab-btn-icon"><i class="feather icon-tag"></i></span>SP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab-button" data-toggle="pill" href="#pills-contact-button" role="tab" aria-controls="pills-contact-button" aria-selected="false"><span class="tab-btn-icon"><i class="feather icon-tag"></i></span>HC</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-settings-tab-button" data-toggle="pill" href="#pills-settings-button" role="tab" aria-controls="pills-settings-button" aria-selected="false"><span class="tab-btn-icon"><i class="feather icon-tag"></i></span>Telor</a>
                        </li>
                    </ul>


                    <div class="tab-content" id="pills-tabContent-button">
                        <div class="tab-pane fade show active" id="pills-home-button" role="tabpanel" aria-labelledby="pills-home-tab-button">
                           <div class="card-header">
                                <h5 class="card-title" style="padding-left: 5px;">Kacang GS</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable1" class="display table table-bordered table-striped table-manpro-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Masuk</th>
                                                <th>Keluar</th>
                                                <th>Stock</th>
                                            </tr>
                                      
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>05/06/20</td>
                                                <td>Dari Proses Sortir</td>
                                                <td>10</td>
                                                <td>-</td>
                                                <td>20</td>
                                            </tr>
                                           
                                            <tr>
                                                <td>05/06/20</td>
                                                <td>Inter</td>
                                                <td>-</td>
                                                <td>10</td>
                                                <td>10</td>
                                            </tr>

                                            <tr>
                                                <td>06/06/20</td>
                                                <td>Sisa Dari Inter</td>
                                                <td>[20]</td>
                                                <td>-</td>
                                                <td>20<br>10</td>
                                            </tr>

                                            <tr>
                                                <td>06/06/20</td>
                                                <td>Inter</td>
                                                <td>-</td>
                                                <td>7<br>[20]</td>
                                                <td>3</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="pills-profile-button" role="tabpanel" aria-labelledby="pills-profile-tab-button">
                           <div class="card-header">
                                <h5 class="card-title" style=" padding-left: 5px;">Kacang SP</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable2" class="display table table-bordered table-striped table-manpro-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Masuk</th>
                                                <th>Keluar</th>
                                                <th>Stock</th>
                                            </tr>
                                      
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>05/06/20</td>
                                                <td>Inter</td>
                                                <td>-</td>
                                                <td>10</td>
                                                <td>10</td>
                                            </tr>

                                            <tr>
                                                <td>06/06/20</td>
                                                <td>Sisa Dari Inter</td>
                                                <td>[20]</td>
                                                <td>-</td>
                                                <td>20<br>10</td>
                                            </tr>

                                            <tr>
                                                <td>06/06/20</td>
                                                <td>Inter</td>
                                                <td>-</td>
                                                <td>7<br>[20]</td>
                                                <td>3</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-contact-button" role="tabpanel" aria-labelledby="pills-contact-tab-button">
                            <div class="card-header">
                                <h5 class="card-title" style="padding-left: 5px;">Kacang HC</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable3" class="display table table-bordered table-striped table-manpro-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Masuk</th>
                                                <th>Keluar</th>
                                                <th>Stock</th>
                                            </tr>
                                      
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>06/06/20</td>
                                                <td>Sisa Dari Inter</td>
                                                <td>[20]</td>
                                                <td>-</td>
                                                <td>20<br> 10</td>
                                            </tr>

                                            <tr>
                                                <td>06/06/20</td>
                                                <td>Inter</td>
                                                <td>-</td>
                                                <td>7<br>[20]</td>
                                                <td>3</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-settings-button" role="tabpanel" aria-labelledby="pills-settings-tab-button">
                            <div class="card-header">
                                <h5 class="card-title" style="padding-left: 5px;">Kacang Telor</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="datatable4" class="display table table-bordered table-striped table-manpro-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Masuk</th>
                                                <th>Keluar</th>
                                                <th>Stock</th>
                                            </tr>
                                      
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>06/06/20</td>
                                                <td>Sisa Dari Inter</td>
                                                <td>[20]</td>
                                                <td>-</td>
                                                <td>20<br> 10</td>
                                            </tr>

                                            <tr>
                                                <td>06/06/20</td>
                                                <td>Inter</td>
                                                <td>-</td>
                                                <td>7<br>[20]</td>
                                                <td>3</td>
                                            </tr>

                                        </tbody>
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
<!-- End Contentbar -->
@endsection 
@section('script')
<!-- Datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#datatable1').DataTable( {
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });
    });

    $(document).ready(function() {
        $('#datatable2').DataTable( {
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });
    });

    $(document).ready(function() {
        $('#datatable3').DataTable( {
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });
    });

    $(document).ready(function() {
        $('#datatable4').DataTable( {
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });
    });

 

</script>

@endsection 