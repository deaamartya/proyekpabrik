@section('title') 
Home Gudang Kacang
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
            <h4 class="page-title">Gudang Kacang & Gudang Kacang Sortir</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Produksi</a></li>
                    <li class="breadcrumb-item"><a href="#">Gudang Kacang</a></li>
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gudang Kacang & Gudang Kacang Sortir</li>
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
                        <h5 class="card-title ml-3">Gudang Kacang</h5>
                        <h5 class="card-title ml-auto mr-3" id="date"></h5>
                    </div>
                        
                       
                
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 16px; padding-left: 5px;">Kacang OB</h5>
                    <div class="table-responsive">
                        <table id="datatable1" class="display table table-bordered table-striped table-manpro-hover datatable" width="80%" >
                            <?php
                                    function tgl_indo($tanggal){
                                        $bulan = array (
                                            1 =>   'Januari',
                                            'Februari',
                                            'Maret',
                                            'April',
                                            'Mei',
                                            'Juni',
                                            'Juli',
                                            'Agustus',
                                            'September',
                                            'Oktober',
                                            'November',
                                            'Desember'
                                        );
                                        $pecahkan = explode('-', $tanggal);
                                        
                                        // variabel pecahkan 0 = tanggal
                                        // variabel pecahkan 1 = bulan
                                        // variabel pecahkan 2 = tahun
                                     
                                        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                                    }
                                     
                                    
                            ?>

                            <thead>
                                    <tr>
                                        <th width="60%">Tanggal Penerimaan Kacang</th>
                                        <th>Stock </th>
                                    </tr>
                          
                            </thead>
                            <tbody>      
                                @foreach($stockob as $ob)
                                <tr>
                                    

                                     <td>{{ tgl_indo(date('Y-m-d' , strtotime($ob->timestamp))) }}</td>
                                    <td>{{ $ob->stock }}</td>
                                </tr>
                                 @endforeach
                    

                            </tbody>
                        </table>
                    </div>

                    <br>

                    <h5 class="card-title" style="font-size: 16px; padding-left: 5px;">Kacang 7 ML</h5>
                    <div class="table-responsive">
                        <table id="datatable2" class="display table table-bordered table-striped table-manpro-hover datatable" width="80%" >
                           <thead>
                                    <tr>
                                        <th width="60%">Tanggal Penerimaan Kacang</th>
                                        <th>Stock </th>
                                    </tr>
                          
                            </thead>
                            <tbody>
                                 @foreach($stock7ml as $k)
                                <tr>
                                     <td>{{ tgl_indo(date('Y-m-d' , strtotime($k->timestamp))) }}</td>
                                    <td>{{ $k->stock }}</td>
                                </tr>
                                 @endforeach
                               

                            </tbody>
                        </table>
                    </div>

                    <br>

                    <h5 class="card-title" style="font-size: 16px; padding-left: 5px;">Kacang 8 ML</h5>
                    <div class="table-responsive">
                        <table id="datatable3" class="display table table-bordered table-striped table-manpro-hover datatable" width="80%" >
                           <thead>
                                    <tr>
                                        <th width="60%">Tanggal Penerimaan Kacang</th>
                                        <th>Stock </th>
                                    </tr>
                          
                            </thead>
                            <tbody>
                                @foreach($stock8ml as $c)
                                <tr>
                                     <td>{{ tgl_indo(date('Y-m-d' , strtotime($c->timestamp))) }}</td>
                                    <td>{{ $c->stock }}</td>
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
                    <div class="row">
                        <h5 class="card-title ml-3">Gudang Kacang Sortir</h5>
                        <h5 class="card-title ml-auto mr-3" id="date2"></h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable4" class="display table table-bordered table-striped table-manpro-hover datatable">
                           <thead>
                                    <tr>
                                        <th>Stock</th>
                                        <th>GS</th>
                                        <th>SP</th>
                                        <th>HC</th>
                                        <th>Telor</th>
                                      
                                    </tr>
                          
                            </thead>
                            <tbody>
                                

                                <tr>
                                    <td>Kg</td>
                                    <td>{{ $stockhc}}</td>
                                    <td>{{ $stocksp }}</td>
                                    <td>{{ $stockgs }}</td>
                                    <td>{{ $stocktelor}}</td>

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
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });

         $('#datatable3').DataTable( {
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });

          $('#datatable4').DataTable( {
            //"order": [[ 0, "asc" ]],
            "paging" : false,
            "info" : false,
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
    document.getElementById('date2').innerHTML = today;
});

</script>

@endsection 