@section('title') 
Kerja Hari Ini
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
            <h4 class="page-title">Data Kerja Hari Ini</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Produksi</a></li>
                    <li class="breadcrumb-item"><a href="#">Gudang Kacang</a></li>
                    <li class="breadcrumb-item"><a href="#">Kerja Harian</a></li>
                    <li class="breadcrumb-item"><a href="#">Hari Ini</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Kerja Hari Ini</li>
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
                        <h5 class="card-title ml-3">Kerja Hari Ini</h5>
                        <h5 class="card-title ml-auto mr-3" id="date"></h5>
                    </div>
                        
                       
                
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 16px; padding-left: 5px;">Proses Sortir</h5>
                    <div class="table-responsive">
                        <table id="datatable1" class="display table table-bordered table-striped table-manpro-hover datatable" width="80%" >
                            <thead>
                                    <tr>
                                        <th>Penerimaan</th>
                                        <th>OB</th>
                                        <th>HC</th>
                                        <th>8ML</th>
                                    </tr>
                          
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Karung</td>
                                    <td>10</td>
                                    <td>7</td>
                                    <td>0</td>
                                </tr>
                               

                            </tbody>
                        </table>
                    </div>

                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable2" class="display table table-bordered table-striped table-manpro-hover datatable" width="80%" >
                           <thead>
                                     <tr>
                                        <th>Hasil</th>
                                        <th>GS</th>
                                        <th>SP</th>
                                        <th>HC</th>
                                        <th>Telor</th>
                                    </tr>
                          
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Karung Full</td>
                                    <td>4</td>
                                    <td>6</td>
                                    <td>6</td>
                                    <td>-</td>
                                </tr>

                                <tr>
                                    <td>Tidak Full (Kg)</td>
                                    <td>15</td>
                                    <td>8</td>
                                    <td>13</td>
                                    <td>-</td>
                                </tr>

                                <tr>
                                    <td>Total (Kg)</td>
                                    <td>215</td>
                                    <td>308</td>
                                    <td>313</td>
                                    <td>-</td>
                                </tr>

                                <tr>
                                    <td>BS (Kg)</td>
                                    <td colspan="4" style="border: 2px solid #4682B4;">5</td>
                                    <td style="display: none"></td>
                                    <td style="display: none"></td>
                                    <td style="display: none"></td>
                                </tr>
                               

                            </tbody>
                        </table>
                    </div>

                    <br><br>

                    <h5 class="card-title" style="font-size: 16px; padding-left: 5px;">Pengambilan Inter</h5>
                    <div class="table-responsive">
                        <table id="datatable3" class="display table table-bordered table-striped table-manpro-hover datatable" width="80%" >
                           <thead>
                                     <tr>
                                        <th>Inter</th>
                                        <th>GS</th>
                                        <th>SP</th>
                                        <th>HC</th>
                                        <th>Telor</th>
                                    </tr>
                          
                            </thead>
                            <tbody>
                                <tr >
                                    <td>Karung</td>
                                    <td>4</td>
                                    <td>6</td>
                                    <td>6</td>
                                    <td>-</td>
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

         $('#datatable2').DataTable( {
            "order": [[ 0, "desc" ]],
            "searching" : false,
            responsive: true
        });

         $('#datatable3').DataTable( {
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