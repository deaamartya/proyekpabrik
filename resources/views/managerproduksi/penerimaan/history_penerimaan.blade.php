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
                                    <th>Tanggal</th>
                                    <th>No. Surat Jalan</th>
                                    <th>Bahan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--
                                <tr>
                                    <td>10/06/2020</td>
                                    <td>SJ100620002</td>
                                    <td>Kacang OB</td>
                                    <td>
                                        <div class="badge-list">
                                            <span class="badge badge-danger badge-font">Belum</span>                       
                                        </div>
                                    </td>
                                </tr>
                            -->
                            @foreach($historypenerimaan as $hp)
                               
                                <tr>
                                    <td>{{ date('d/m/Y' , strtotime($hp->timestamp)) }}</td>
                                    <td>{{ $hp->id_transaksi }}</td>
                                    <td>{{ $hp->nama_bahan_baku }}</td>
                                    <td>
                                        <div class="badge-list">
                                            <span class="badge badge-success badge-font">Selesai</span>                  
                                        </div>
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
<!--
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-table-datatable.js') }}"></script>
-->

<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    //"use strict";
    $(document).ready(function() {
        $('#datatable').DataTable( {
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });

        
        
        var table = document.getElementById("datatable");
        if (table) {
          for (var i = 0; i < table.rows.length; i++) {
            table.rows[i].onclick = function() {
              editPenerimaan(this);
            };
          }
        }

       
    
    });

     function editPenerimaan(tableRow) {
          var tgl = tableRow.childNodes[1].innerHTML;
          var nomorsurat = tableRow.childNodes[3].innerHTML;
          var nama = tableRow.childNodes[5].innerHTML;
          var status = tableRow.childNodes[7].childNodes[0].innerHTML;
          var obj = {'tgl': tgl, 'nomorsurat': nomorsurat, 'nama': nama, 'status':status};
          console.log(obj);
          confirmEdit(nomorsurat);

        function confirmEdit(id){
            let url = "{{ route('edit_penerimaan', ':id') }}";
            url = url.replace(':id', id);
            document.location.href=url;
        }


  

        }



</script>

@endsection 