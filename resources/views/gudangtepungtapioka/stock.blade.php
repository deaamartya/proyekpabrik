@section('title') 
Soyuz - Datatable
@endsection 
@extends('gudangtepungtapioka.layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar"></div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start col -->
        <div class="col-md-12 col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">                        
                    <ul class="nav nav-tabs nav-justified mb-3" id="defaultTabJustified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#home-justified" role="tab" aria-controls="home" aria-selected="true">Kg</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab-justified" data-toggle="tab" href="#contact-justified" role="tab" aria-controls="contact" aria-selected="false">Masakan</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="defaultTabJustifiedContent">
                        <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab-justified">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title text-left">Stock Tepung Tapioka</h3>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="page-title text-left">Karung</h4>
                                </div>
                            </div>
                            <form action="{{ url('/gudang-tepung-tapioka/cari-stock') }}" method="post">
                                    @csrf
                                <div class="row"  style="margin: 10px 0px">
                                    <div class="column" style="width : 35%">
                                        <h4> Awal</h4>
                                        <input type="datetime-local" class="form-control" name="awalDate" id="inputDate" placeholder="date picker">
                                    </div>
                                    <div class="column" style="width : 35%">
                                        <h4>Akhir</h4>
                                        <input type="datetime-local" class="form-control" name="akhirDate" id="inputDate" placeholder="date picker">
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-lg btn-block" style="width: 30% ; height:50px;margin: 5px 0px"> Terapkan </button>
                                </div>
                            </form>
                            <div class="table-responsive">
                        <table id="default-datatable1" class="display table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>
                                    <th>Masuk (Kg)</th>
                                    <th>Keluar (Kg)</th>
                                    <th>Stock (Kg)</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($stock1 as $stck)
                                <tr>
                                  <td>{{ $stck-> TIMESTAMP }}</td>
                                  <td>{{ $stck-> keterangan }}</td>
                                  <td>{{ $stck-> masuk }}</td>
                                  <td>{{ $stck-> keluar }}</td>
                                  <td>{{ $stck-> stock }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                        </div>
                        <div class="tab-pane fade" id="contact-justified" role="tabpanel" aria-labelledby="contact-tab-justified">
                            <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab-justified">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title text-left">Stock Tepung Tapioka</h3>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="page-title text-left">Masakan</h4>
                                </div>
                            </div>
                            <form action="{{ url('/gudang-tepung-tapioka/cari-stock') }}" method="post">
                                    @csrf
                                <div class="row"  style="margin: 10px 0px">
                                    <div class="column" style="width : 35%">
                                        <h4> Awal</h4>
                                        <input type="datetime-local" class="form-control" name="awalDate" id="inputDate" placeholder="date picker">
                                    </div>
                                    <div class="column" style="width : 35%">
                                        <h4>Akhir</h4>
                                        <input type="datetime-local" class="form-control" name="akhirDate" id="inputDate" placeholder="date picker">
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-lg btn-block" style="width: 30% ; height:50px;margin: 5px 0px"> Terapkan </button>
                                </div>
                            </form>
                            <div class="table-responsive">
                        <table id="default-datatable1" class="display table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Masuk (Plastik)</th>
                                    <th>Keluar (Plastik)</th>
                                    <th>Stock (Plastik)</th>
                                </tr>
                            </thead>
                            <tbody>                                
                            @foreach($stock2 as $stck2)
                                <tr>
                                  <td>{{ $stck2-> TIMESTAMP }}</td>
                                  <td>{{ $stck2-> masuk }}</td>
                                  <td>{{ $stck2-> keluar }}</td>
                                  <td>{{ $stck2-> stock }}</td>
                                </tr>
                            @endforeach                                
                            </tbody>
                        </table>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
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
        $('#default-datatable2').DataTable( {
            "order": [[ 0, "asc" ]],
            responsive: true
        });
    });

    "use strict";
    $(document).ready(function() {
        /* -- Table - Datatable -- */
        $('#default-datatable').DataTable( {
            "order": [[ 0, "asc" ]],
            responsive: true
        });
    });
</script>
@endsection 