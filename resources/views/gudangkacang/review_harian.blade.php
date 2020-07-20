@section('title') 
Kerja Harian
@endsection 
@extends('gudang_kacang.layouts.main')
@section('style')
<!-- Apex css -->
<link href="{{ asset('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet" type="text/css" />
<!-- jvectormap css -->
<link href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" type="text/css" />
<!-- Slick css -->
<link href="{{ asset('assets/plugins/slick/slick.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/slick/slick-theme.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('rightbar-content')

<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4>Kerja Hari Ini</h4>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <?php echo date("d-m-Y"); ?>
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
        <div class="col-lg-12 col-xl-12">
            <!-- Start row -->
            <div class="row">
                <!-- Start col -->
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body" style="padding-top: 0px;">
                            <ul class="nav nav-tabs nav-justified mb-3" id="defaultTabJustified" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#home-justified" role="tab" aria-controls="home" aria-selected="true" style="font-size: 14px">Proses Sortir</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-justified" data-toggle="tab" href="#profile-justified" role="tab" aria-controls="profile" aria-selected="false" style="font-size: 14px">Pengambilan Inter</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="defaultTabJustifiedContent">
                                <div class="tab-pane fade show active text-center" id="home-justified" role="tabpanel" aria-labelledby="home-tab-justified">
                                    <h2 style="color: red">Tutup Hari</h2>
                                    <div class="row" style="margin-top: 20px;">
                                    <div class="col-sm-12">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 100px; text-align: center" aria-sort="ascending" aria-label="Penerimaan: activate to sort column descending">Penerimaan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="OB: activate to sort column ascending">OB</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="HC: activate to sort column ascending">HC</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="8ML: activate to sort column ascending">8 ML</th>
                                            </thead>
                                            <tbody>
                                                <tr role="row">
                                                    <td>Karung</td>
                                                    <td>10</td>
                                                    <td>7</td>
                                                    <td>0</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="row" style="margin-top: 20px;">
                                    <div class="col-sm-12">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 100px; text-align: center" aria-sort="ascending" aria-label="Hasil: activate to sort column descending">Hasil</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="GS: activate to sort column ascending">GS</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="SP: activate to sort column ascending">SP</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="HC: activate to sort column ascending">HC</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="Telor: activate to sort column ascending">Telor</th>
                                            </thead>
                                            <tbody>
                                                <tr role="row" class="odd">
                                                    <td>Karung Full</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                </tr>
                                                <tr role="row">
                                                    <td>Tidak Full (Kg)</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                </tr>
                                                <tr role="row">
                                                    <td>Total (Kg)</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                </tr>
                                                <tr role="row">
                                                    <td>BS (Kg)</td>
                                                    <td colspan="4"><input type="number" class="form-control" id="inputmask-card-number" name="BS"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="row" style="margin-top: 20px;">
                                    <div class="col-sm-12">
                                        <h6>Pengambilan Inter</h6>
                                        <table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 100px; text-align: center" aria-sort="ascending" aria-label="Inter: activate to sort column descending">Inter</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="GS: activate to sort column ascending">GS</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="SP: activate to sort column ascending">SP</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="HC: activate to sort column ascending">HC</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="Telor: activate to sort column ascending">Telor</th>
                                            </thead>
                                            <tbody>
                                                <tr role="row" class="odd">
                                                    <td>Karung</td>
                                                    <td>4</td>
                                                    <td>6</td>
                                                    <td>6</td>
                                                    <td>-</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade item-center" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab-justified">
                                    <div class="col-lg-12">
                                        <div class="card m-b-30">
                                            <div class="card-header">
                                                <h5 class="card-title">Pengeluaran Gudang Kacang Sortir</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive m-b-30">
                                                    <table class="table table-borderless">
                                                        <!-- <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">First</th>
                                                            </tr>
                                                        </thead> -->
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">GS<br><button type="button" class="btn btn-info">+</button><br>
                                                                <button type="button" class="btn btn-danger" style="margin-top: 5px; height: 19px; padding-top: 0px; padding-bottom: 0px; width: 46px; margin-bottom: 0px;">-</button>
                                                                </th>
                                                                <td>Jumlah Karung<br><input type="number" class="form-control" id="inputmask-card-number" name="GS"></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">SP<br><button type="button" class="btn btn-info">+</button><br>
                                                                <button type="button" class="btn btn-danger" style="margin-top: 5px; height: 19px; padding-top: 0px; padding-bottom: 0px; width: 46px; margin-bottom: 0px;">-</button>
                                                                </th>
                                                                <td>Jumlah Karung<br><input type="number" class="form-control" id="inputmask-card-number" name="SP"></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">HC<br><button type="button" class="btn btn-info">+</button><br>
                                                                <button type="button" class="btn btn-danger" style="margin-top: 5px; height: 19px; padding-top: 0px; padding-bottom: 0px; width: 46px; margin-bottom: 0px;">-</button>
                                                                </th>
                                                                <td>Jumlah Karung<br><input type="number" class="form-control" id="inputmask-card-number" name="HC"></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Telor<br><button type="button" class="btn btn-info">+</button><br>
                                                                <button type="button" class="btn btn-danger" style="margin-top: 5px; height: 19px; padding-top: 0px; padding-bottom: 0px; width: 46px; margin-bottom: 0px;">-</button>
                                                                </th>
                                                                <td>Jumlah Karung<br><input type="number" class="form-control" id="inputmask-card-number" name="Telor"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection 
@section('script')
<!-- Apex js -->
<script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexcharts/irregular-data-series.js') }}"></script>
<!-- jVector Maps js -->
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- Slick js -->
<script src="{{ asset('assets/plugins/slick/slick.min.js') }}"></script>
<!-- Custom Dashboard js -->  
<script src="{{ asset('assets/js/custom/custom-dashboard.js') }}"></script>
@endsection 