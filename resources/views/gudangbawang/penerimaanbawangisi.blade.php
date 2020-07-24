@section('title') 
Soyuz - Datatable
@endsection 
@extends('gudangbawang.layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<style type="text/css">
    .redclass{
        border-color: red !important;
    }
    .form-control[readonly] {
        background-color: white !important; 
    }
</style>
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-8">
            <h2 class="page-title text-left pl-5">Penerimaan Bawang</h2>
        </div>
        <div class="col-4">
            <div class="widgetbar">
                <h5 class="page-subtitle text-left pl-5">10 Juni 2020</h5>
            </div>                        
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-6 pl-5">
              <label for="validationCustom01">Berat Bawang Kupas Diterima (Kg)</label>
              <input type="text" class="form-control" name="berat" id="berat" required readonly>
        </div>
        <div class="col-6 pt-2">
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="display table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Terima Bawang (Kg)</th>
                                    <th>Bawang Kupas (Kg)</th>
                                    <th>Kulit (Kg)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tenagakupas as $t)
                                <tr>
                                    <td id="nama{{$t->id_pegawai}}">{{$t->nama}}</td>
                                    <td id="tb{{$t->id_pegawai}}" >{{$t->jumlah}}</td>
                                    <td id="bk{{$t->id_pegawai}}" class="jmbawangkulit">{{$t->jumlahbawang}}</td>
                                    <td id="kulit{{$t->id_pegawai}}" class="jmkulit">{{$t->jumlahkulit}}</td>
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
    "use strict";
    $(document).ready(function() {
        /* -- Table - Datatable -- */
        $('#datatable').DataTable({
            "searching" : false,
            "paging" : false,
            "info" : false,
            "order": [[ 1, "asc" ]],
            responsive: true
        });

        var pegawai = <?php echo json_encode($tenagakupas)?>;

        function hitungBawang(){
            let jumlah = 0;

            $(".jmbawangkulit").each(function(){
                jumlah = jumlah + Number($(this).html());
            });

            $("#berat").val(jumlah);
        }
        hitungBawang();
        
    });
</script>
@endsection 