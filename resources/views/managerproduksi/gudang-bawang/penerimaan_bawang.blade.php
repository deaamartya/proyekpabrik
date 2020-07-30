@section('title') 
Penerimaan Bawang
@endsection 
@extends('managerproduksi.layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />


<style type="text/css">
    .redclass{
        border: red 1px solid !important;
    }
</style>


@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Data Penerimaan Bawang</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Produksi</a></li>
                    <li class="breadcrumb-item"><a href="#">Gudang Bawang</a></li>
                    <li class="breadcrumb-item"><a href="#">Kerja Harian</a></li>
                    <li class="breadcrumb-item"><a href="#">Penerimaan Bawang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Penerimaan Bawang</li>
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
                        <h5 class="card-title ml-3">Penerimaan Bawang</h5>
                        <h5 class="card-title ml-auto mr-3" id="date"></h5>
                    </div>
                       
                
                </div>
                <div class="card-body">
                    <p style="color: black;" id="input-bawang"></p>
                  
                    
                    <div class="table-responsive">
                        <table id="datatable1" class="display table table-bordered table-striped table-manpro-hover datatable" >
                            <thead>
                                    <tr>
                                        <th width="40%">Nama</th>
                                        <th width="20%">Terima Bawang <h5 style="font-size: 11px;">(Kg)</h5></th>
                                        <th width="20%">Bawang Kupas <h5 style="font-size: 11px;">(Kg)</h5></th>
                                        <th width="20%">Kulit <h5 style="font-size: 11px;">(Kg)</h5></th>
                                    </tr>
                          
                            </thead>
                            <tbody>
                                
                                @if(!empty($tenagakupas))
                                    @foreach($tenagakupas as $t)
                                    <tr>
                                        <td class="@if ($t->jumlah > intval($t->jumlahbawang+$t->jumlahkulit)) redclass @endif">{{$t->nama}}</td>
                                        <td class="@if ($t->jumlah > intval($t->jumlahbawang+$t->jumlahkulit)) redclass @endif" >{{$t->jumlah}}</td>
                                        <td class=" @if ($t->jumlah > intval($t->jumlahbawang+$t->jumlahkulit)) redclass @endif">{{$t->jumlahbawang}}</td>
                                        <td class=" @if ($t->jumlah > intval($t->jumlahbawang+$t->jumlahkulit)) redclass @endif">{{$t->jumlahkulit}}</td>
                                    </tr>
                                    @endforeach
                                @endif

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

$(document).ready(function() {
    var table = document.getElementById("datatable1");
    //var databawang = document.getElementsByClassName('bawang-kupas').innerHTML;

    var total=0;

    for (var i=1; i < table.rows.length; i++ ){
      total = total + Number((table.rows[i].childNodes[5].innerHTML));
      
    }

    document.getElementById('input-bawang').innerHTML = "Berat Bawang Kupas Diterima (Kg) : "+total ;
    
});
</script>

@endsection 