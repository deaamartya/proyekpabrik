@section('title') 
Pembagian Bawang
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
            <h4 class="page-title">Data Pembagian Bawang</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Produksi</a></li>
                    <li class="breadcrumb-item"><a href="#">Gudang Bawang</a></li>
                    <li class="breadcrumb-item"><a href="#">Kerja Harian</a></li>
                    <li class="breadcrumb-item"><a href="#">Pembagian Bawang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Pembagian Bawang</li>
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

            @if (!empty( $alert_datakosong ))
                        <div class="alert alert-danger alert-dismissible fade show text-dark">
                            {{ $alert_datakosong }}
                            <button type="button" class="close text-dark" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            @endif
            <div class="card m-b-30">
                <div class="card-header">
                        
                    <div class="row">
                        <h5 class="card-title ml-3">Pembagian Bawang</h5>
                        <h5 class="card-title ml-auto mr-3" id="date"></h5>
                    </div>
                       
                
                </div>
                <div class="card-body">


                    <div class="row align-items-center px-5 py-3">
                        <div class="col">
                            <div class="widgetbar">
                                <form>
                                    <div class="form-row align-items-center">
                                        <div class="form-group col-sm-6">
                                            <label for="orderbesok" class="text-left">Order Besok</label>
                                            <input type="text" class="form-control" readonly name="orderbesok" id="orderbesok" placeholder="" value="@if(!$datakosong)  {{$orderbesok->jumlah}} @endif">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="stockbebas">Stock Bebas</label>
                                            <input type="text" class="form-control" name="stockbebas" id="stockbebas" placeholder="" value="@if(!$datakosong) {{$stockbebas}} @endif" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row align-items-center">
                                        <div class="form-group col-sm-4">
                                            <label for="ratasusut">Rata2 Susut</label>
                                            <input type="text" class="form-control disable" name="ratasusut" id="ratasusut" value="@if(!$datakosong) {{$ratasusut}}% @endif" readonly>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="targetkupas">Target Kupas (Kg)</label>
                                            <input type="text" class="form-control disable" name="targetkupas" id="targetkupas" value="@if(!$datakosong) {{$targetkupas->jumlah}} @endif" readonly>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="proseshariini">Proses Hari Ini</label>
                                            <input type="text" class="form-control" name="proseshariini" id="proseshariini" placeholder="" value="@if(!$datakosong) {{$totalproses->keluar}} @endif" readonly="">
                                        </div>
                                    </div>
                                </form>
                            </div> 
                        </div>  
                    </div>

                    <div class="table-responsive">
                        <table id="datatable1" class="display table table-bordered table-striped table-manpro-hover datatable" width="80%" >
                            <thead>
                                     <tr>
                                        <th width="60%">Nama</th>
                                        <th>Terima <h5 style="font-size: 11px;">(Kg)</h5></th>
                                    </tr>
                          
                            </thead>
                            <tbody>

                            @if(!$datakosong)
                                @if(!empty($tenagakupas))
                                    @php $i=0; @endphp
                                    @foreach($tenagakupas as $t)

                                        @if($t->status)
                                        <tr>
                                            <td>{{$t->nama}}</td>
                                            <td>{{$jumlah[$i]->jumlah}}</td>
                                        </tr>
                                        @endif
                                    @php $i++; @endphp
                                    @endforeach
                                @endif

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

</script>

@endsection 