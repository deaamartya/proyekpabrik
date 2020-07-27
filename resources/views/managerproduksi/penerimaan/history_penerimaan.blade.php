@section('title') 
Penerimaan Barang
@endsection 
@extends('managerproduksi.layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />


<style type="text/css">
    tr {
        cursor: pointer;
    }
</style>

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">History Penerimaan Bahan</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Penerimaan Barang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">History Penerimaan Bahan</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a class="btn btn-primary-rgba" href="{{url('/penerimaan/create_penerimaan')}}"><i class="feather icon-plus mr-2"></i>Penerimaan Baru</a>
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
                    <h5 class="card-title">All History</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="display table table-bordered table-striped table-manpro-hover datatable">
                            <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th style="display: none;"></th>
                                    <th>Tanggal</th>
                                    <th>No. Surat Jalan</th>
                                    <th>Bahan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($historypenerimaan as $hp)
                               
                                <tr>
                                    <td style="display: none;">{{ $hp->id_penerimaan }}</td>
                                    <td style="display: none;">{{ $hp->id_jenis_penerimaan }}</td>
                                    <td>{{ date('d/m/Y' , strtotime($hp->timestamp)) }}</td>
                                    <td>{{ $hp->id_transaksi }}</td>
                                    <td>{{ $hp->nama_bahan_baku }}</td>
                                    
                                    <td>
                                        

                                        
                                            @if($hp->status_simpan == 0)
                                                <div class="badge-list">
                                                    <span class="badge badge-danger badge-font">Belum</span>                       
                                                </div>
                                            @else
                                                <div class="badge-list">
                                                    <span class="badge badge-success badge-font">Selesai</span>
                                                </div>
                                            @endif

                                        
                            
                                     
                                    </td>
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



//"use strict";
$(document).ready(function() {

    var msg = '{{Session::get('alert_simpan')}}';
    var exist = '{{Session::has('alert_simpan')}}';
    if(exist){
      alert(msg);
    }

    var msg2 = '{{Session::get('alert_simpan2')}}';
    var exist2 = '{{Session::has('alert_simpan2')}}';
    if(exist2){
      alert(msg2);
    }

    var msg3 = '{{Session::get('alert_update')}}';
    var exist3 = '{{Session::has('alert_update')}}';
    if(exist3){
      alert(msg3);
    }

    var msg4 = '{{Session::get('alert_update2')}}';
    var exist4 = '{{Session::has('alert_update2')}}';
    if(exist4){
      alert(msg4);
    }


        $('#datatable').DataTable( {
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });

        
        var table = document.getElementById("datatable");
        

        if (table) {
          for (var i = 0; i < table.rows.length; i++) {

            //var status = document.getElementsByClassName("status_simpan").value;

            //console.log(status);

                table.rows[i].onclick = function() {
                editPenerimaan(this);
                };
            
            
          }
        }

       
    
   

     function editPenerimaan(tableRow) {
          var id_penerimaan = tableRow.childNodes[1].innerHTML;
          var jenis_penerimaan = tableRow.childNodes[3].innerHTML;

          if (jenis_penerimaan == 1) {
            confirmEdit1(id_penerimaan);
          }else{
            confirmEdit2(id_penerimaan);
          }

          

        function confirmEdit1(id){
            let url = "{{ route('edit_penerimaan_supplier', ':id') }}";
            url = url.replace(':id', id);
            document.location.href=url;
        }

        function confirmEdit2(id){
            let url = "{{ route('edit_penerimaan_pemindahanbahan', ':id') }}";
            url = url.replace(':id', id);
            document.location.href=url;
        }


  

    }


 });



</script>

@endsection 