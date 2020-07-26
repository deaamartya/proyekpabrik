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
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Tenaga Kupas</h5>
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
        $('#default-datatable').DataTable( {
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });

       
    
    });


</script>

@endsection 