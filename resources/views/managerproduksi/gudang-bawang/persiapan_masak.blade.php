@section('title') 
Persiapan Masak Kanji
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
            <h4 class="page-title">Data Persiapan Masak Kanji</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Produksi</a></li>
                    <li class="breadcrumb-item"><a href="#">Gudang Bawang</a></li>
                    <li class="breadcrumb-item"><a href="#">Kerja Harian</a></li>
                    <li class="breadcrumb-item"><a href="#">Persiapan Masak Kanji</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Persiapan Masak Kanji</li>
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

                    <div class="row">
                        <h5 class="card-title ml-3">Order Masak</h5>
                        <h5 class="card-title ml-auto mr-3" id="date"></h5>
                    </div>
                        
                       
                
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable1" class="display table table-bordered table-striped table-manpro-hover datatable" width="60%" >
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
                                    <td>10/06/20</td>
                                    <td>-</td>
                                    <td>40</td>
                                    <td>60</td>
                                    <td>
                                        <div class="badge-list">
                                            <span class="badge badge-success badge-font">Ready</span>
                                        </div>
                                    </td>
                                </tr>
                               
                                <tr>
                                    <td>11/06/20</td>
                                    <td>50</td>
                                    <td>-</td>
                                    <td>30</td>
                                   <td>
                                        <span class="badge badge-success badge-font">Ready</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>12/06/20</td>
                                    <td>60</td>
                                    <td>-</td>
                                    <td>30</td>
                                   <td>
                                        <span class="badge badge-danger badge-font">Belum</span>
                                    </td>
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
    $(document).ready(function() {
        $('#datatable1').DataTable( {
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });
    });

 $(document).ready(function() {
    var now = new Date();
    //var month = now.toLocaleString('default', { month: 'long' }); 
    var month_name = function(dt){
                    mlist = [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ];
                    return mlist[dt.getMonth()];
                    };
    var month = month_name(now);              
    var day = now.getDate();
    if (day < 10) 
        day = "0" + day;
    var today = day + ' ' + month + ' ' + now.getFullYear() ;
    document.getElementById('date').innerHTML = today;
});



</script>

@endsection 