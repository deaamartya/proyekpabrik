@section('title') 
Tenaga Kupas
@endsection 
@extends('managerproduksi.layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Data Tenaga Kupas</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Produksi</a></li>
                    <li class="breadcrumb-item"><a href="#">Gudang Bawang</a></li>
                    <li class="breadcrumb-item"><a href="#">Kerja Harian</a></li>
                    <li class="breadcrumb-item"><a href="#">Tenaga Kupas</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Tenaga Kupas</li>
                </ol>
            </div>
        </div>
    </div>          
</div>

@if (session('alert_datakosong'))
                <div class="alert alert-danger">
                      {{ session('alert_datakosong') }}
                 </div>
 @endif
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
                        <h5 class="card-title ml-3">Tenaga Kupas</h5>
                        <h5 class="card-title ml-auto mr-3" id="date"></h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="default-datatable" class="display table table-bordered table-striped table-manpro-hover datatable" width="80%">
                            <thead>
                                <tr>
                                    <th width="60%;">Nama</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                            @if(!empty($tenagakupas))

                               @foreach($tenagakupas as $t)
                                <tr>
                                    <td>{{ $t->nama }}</td>
                                    <td>
                                        @if($t->status == 1)
                                            <div class="badge-list">
                                                <span class="badge badge-success badge-font">Aktif</span>
                                            </div>
                                        @else
                                            <div class="badge-list">
                                            <span class="badge badge-danger badge-font">Tidak Aktif</span>
                                        </div>
                                        @endif
                                    </td>
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
    //"use strict";
    $(document).ready(function() {



    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }


        $('#default-datatable').DataTable( {
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