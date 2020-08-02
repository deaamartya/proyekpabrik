@section('title') 
Home Gudang Bawang
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
            <h4 class="page-title">Data Order Kupas Bawang & Order Masak</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Produksi</a></li>
                    <li class="breadcrumb-item"><a href="#">Gudang Bawang</a></li>
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Order Kupas Bawang & Order Masak</li>
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
                <div class="card-header">

                        <h5 class="card-title ml-3">Order Kupas Bawang</h5>
                      
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" class="display table table-bordered table-striped table-manpro-hover datatable" width="80%" >
                            <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Target Kupas <h5 style="font-size: 11px;">(Kg)</h5></th>
                                        <th>Stock <h5 style="font-size: 11px;">(Kg)</h5></th>
                                        <th>Status %</th>
                                        
                                    </tr>
                          
                            </thead>
                            <tbody>

                                    @foreach($orderkupasbawang as $okb)
                                    <tr>
                                        <td>{{date_format($okb->tanggal_order_masak,'d/m/Y')}}</td>
                                        <td>{{$okb->jumlah}}</td>   
                                        <td>{{$stock1c}}</td>
                                        <td>{{$okb->presentase_status}}</td>
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

    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
              
                        <h5 class="card-title ml-3">Order Masak</h5>
                      
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable2" class="display table table-bordered table-striped table-manpro-hover datatable" width="80%" >
                            <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>HC</th>
                                        <th>SP</th>
                                        <th>GS</th>
                                        
                                    </tr>
                          
                            </thead>
                            <tbody>
                                @foreach($ordermasak as $ord)
                                    <tr>
                                        <td>{{date_format($ord->tanggal_order_masak,'d/m/Y')}}</td>
                                        <td>{{$ord->HC}}</td>
                                        <td>{{$ord->SP}}</td>
                                        <td>{{$ord->GS}}</td>
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

         $('#datatable2').DataTable( {
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });
    });



</script>

@endsection 