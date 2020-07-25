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
                                    <th>Stock Tersedia</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2011/04/25</td>
                                    <td>50</td>
                                    <td>-</td>
                                    <td>50</td>
                                    <td class="text-danger">100</td>
                                    <td>Terambil</td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Start row2 -->
                <div class="row">
                    <div class="col-md-4 pl-5">                        
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleStandardModal">Ambil Stock Tepung Karung
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleStandardModal" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="col">
                                            <h2 class="page-title text-center">Ambil Stock Karung</h2>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Jenis Karung</label>
                                            <select class="form-control" id="jeniskarung" name="jeniskarung">
                                              <option id="kg" name="kg">Kg</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Berat Diambil (Kg)</label>
                                            <input type="number" name="beratdiambil" id="beratdiambil" class="form-control" placeholder="Maksimal ambil {{$stock1c}} Kg">
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary mx-auto" id="submit" href="#">OK</button>
                                        </div>
                                    </div>                                        
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                    </div>
                    <div class="col-md-4">
                        <table class="display table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Jenis Stock</th>
                                    <th>Berat (Kg)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><br>
                <!-- End row2 -->
                <!-- Start row3 -->
                <div class="row">
                    <div class="col-md-4 pl-5">                        
                        <button type="button" class="btn btn-warning btn-lg btn-block" data-toggle="modal" data-target="#exampleStandardModal2">Tambah Hasil Packing
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleStandardModal2" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="col">
                                            <h2 class="page-title text-center">Tambah Hasil Packing</h2>
                                        </div>                                        
                                        <div class="form-group">
                                            <label>Jumlah Hasil (Plastik)</label>
                                            <input type="number" name="beratdiambil" class="form-control">
                                        </div>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary mx-auto">OK</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <label>Hasil Packing (Plastik)</label>
                      <input type="text" class="form-control" readonly="" required>
                    </div>
                </div>
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