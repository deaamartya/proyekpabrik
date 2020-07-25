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
@endsection 
@section('rightbar-content')

<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Datatable</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Datatable</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Actions</button>
            </div>                        
        </div>
    </div>          
</div>
<!-- Start Contentbar -->    
<div class="contentbar">                
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title"> Stock Bawang Kulit</h5>

                </div>
                <div class="card-body">
                    {{-- <h6 class="card-subtitle">With DataTables you can alter the ordering characteristics of the table at initialisation time.</h6> --}}
                    <button type="button" class="status btn btn-warning" style="width: 100% ; height:50px"> <a href="/gudang-bawang/penerimaanstockbawangkulit" style="color:white">Penerimaan </a></button>
                    
                    <div class="row"  style="margin: 10px 0px">
                        <div class="column" style="width : 35%">
                          <h4> Awal</h4>
                          <input type="date" class="form-control" name="inputDate" id="inputDate" placeholder="date picker">
                        </div>
                        <div class="column" style="width : 35%">
                          <h4>Akhir</h4>
                          <input type="date" class="form-control" name="inputDate" id="inputDate" placeholder="date picker">
                        </div>
                        <button type="button" class="status btn btn-primary" style="width: 30% ; height:50px;margin: 5px 0px"> Terapkan </button>
                      </div>
                    
                    
                    
                    <div class="table-responsive">
                        <table id="default-datatable" class="display table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Merk/Tanggal Terima</th>
                                    <th>masuk(kg)</th>
                                    <th>keluar(kg)</th>
                                    <th>Stock (kg)</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stock as $stk ) 
                                <tr>
                                    <td>{{ $stk->TIMESTAMP}}</td>
                                    <td>{{ $stk->keterangan}}</td>
                                    <td>{{ $stk->masuk}}</td>
                                    <td>{{ $stk->keluar}}</td>
                                    <td>{{ $stk->stock}}</td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                {{-- <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr> --}}
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        
    </div>
    <!-- End row -->
</div>
@endsection 
@section('script')
<!-- Datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    
</script>
@endsection 
