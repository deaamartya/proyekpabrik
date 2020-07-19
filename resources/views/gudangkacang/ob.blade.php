@section('title') 
Stock 
@endsection 
@extends('layouts.main')
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
            <h4 class="page-title">History Penerimaan Bahan</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Stock</a></li>
                    <li class="breadcrumb-item"><a href="">Gudang Kacang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">OB</li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
            
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
                        <h5 class="card-title">Gudang Kacang</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" id="defaultTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">OB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">7 ML</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">8 ML</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="defaultTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="ob">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="button-list">
                                        <button type="button" href="/stock_gudang_kacang_penerimaan_ob" class="btn btn-warning btn-lg btn-block">Penerimaan</button>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                <label for="no_surat_jalan">Awal</label>
                                </div>
                                <div class="form-group col-md-4">
                                <label for="no_surat_jalan">Akhir</label>
                                </div>
                                <div class="form-group col-md-4">
                                </div>

                                <div class="form-group col-md-4">
                                    <input type="date" class="form-control" name="awal" id="Input Tanggal Awal">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="date" class="form-control" name="akhir" id="Input Tanggal Akhir">
                                </div>
                                <div class="form-group col-md-4">
                                    <button type="button" class="btn btn-primary">Terapkan</button>
                                </div>
                                <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Tanggal Penerimaan Kacang</th>
                                <th>Keterangan</th>
                                <th>Masuk</th>
                                <th>Keluar</th>
                                <th>Stock</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>05/06/2020</td>
                                <td>10 Juni 2020</td>
                                <td>Dari Coolstorage 1</td>
                                <td>50</td>
                                <td>-</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>05/06/2020</td>
                                <td>12 Juni 2020</td>
                                <td>Dari Proses Sortir</td>
                                <td>-</td>
                                <td>20</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>05/06/2020</td>
                                <td>10 Juni 2020</td>
                                <td>Dari Coolstorage 1</td>
                                <td>50</td>
                                <td>-</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>05/06/2020</td>
                                <td>12 Juni 2020</td>
                                <td>Dari Proses Sortir</td>
                                <td>-</td>
                                <td>20</td>
                                <td>10</td>
                            </tr><tr>
                                <td>05/06/2020</td>
                                <td>10 Juni 2020</td>
                                <td>Dari Coolstorage 1</td>
                                <td>50</td>
                                <td>-</td>
                                <td>50</td>
                            </tr>
                            <tr>
                                <td>05/06/2020</td>
                                <td>12 Juni 2020</td>
                                <td>Dari Proses Sortir</td>
                                <td>-</td>
                                <td>20</td>
                                <td>10</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="7ml">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="8ml">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                        </div>
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
@endsection 