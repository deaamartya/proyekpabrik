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
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col">
            <h1 class="page-title text-center pl-5">Proses Packing Tepung</h1>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-8">
            <h4 class="page-title text-left pl-5">Order Masak (Plastik)</h4>
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
                        <table id="default-datatable1" class="display table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>HC</th>
                                    <th>SP</th>
                                    <th>GS</th>
                                    <th>Stock Tepung</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ordermasak as $or)
                                    <tr>
                                        <td>{{date_format($or->tanggal_order_masak,'Y-m-d')}}</td>
                                        <td>{{$or->HC}}</td>
                                        <td>{{$or->SP}}</td>
                                        <td>{{$or->GS}}</td>
                                        <td>{{$stock2c}}</td>
                                        <td>@if($or->status == 0) Selesai
                                            @else
                                            @if($or->status == 1) Ready
                                            @else Belum
                                            @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Start row2 -->
                <form class="user" action="{{ url('/ambiltepung') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4 pl-5">                        
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Ambil Stock Tepung Karung
                            </button>                        
                        </div>
                        <div class="col-md-4">
                            <div class="col-md mb-3">
                              <label>Jenis Stock</label>
                              <input type="text" class="form-control" name="jenisstock" id="jenisstock" readonly="" required value="kg">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md mb-3">
                              <label>Berat (Kg)</label>
                              <input type="number" name="berat" id="berat" max="{{$stock1c}}" min="0" class="form-control" required placeholder="Maksimal ambil {{$stock1c}}">
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <!-- End row2 -->
                <!-- Start row3 -->
                <form class="user" action="{{ url('/tambahpacking') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4 pl-5">                        
                            <button class="btn btn-warning btn-lg btn-block" type="submit">Tambah Hasil Packing
                            </button>                        
                        </div>
                        <div class="col-md-4">
                            <div class="col-md mb-3">
                                <label>Hasil Packing (Plastik)</label>
                                <input type="number" class="form-control" id="hasilpack" name="hasilpack" placeholder="Hasil Packing" required>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- End row3 -->
            </div>
        </div>
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
    
</script>
@endsection 