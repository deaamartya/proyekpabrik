@section('title') 
Kerja Harian
@endsection 
@extends('gudangkacang.layouts.main')
@section('style')
<!-- Apex css -->
<link href="{{ asset('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet" type="text/css" />
<!-- jvectormap css -->
<link href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" type="text/css" />
<!-- Slick css -->
<link href="{{ asset('assets/plugins/slick/slick.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/slick/slick-theme.css') }}" rel="stylesheet" type="text/css" />
<!-- Online -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

@endsection 
@section('rightbar-content')

<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Kerja Hari Ini</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Kerja Harian</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/hari_ini')}}">Hari Ini</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Kerja Hari Ini</li>
                </ol>
            </div>
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
                                    <button type="button" class="btn btn-primary" style="margin-right: 10px;" onclick="show()">Tambah Grup</button>
                                    <button type="button" class="btn btn-warning" onclick="y()" id="tutuphari" style="margin-left: 10px;" data-toggle="modal" data-target="#exampleModalLong">Tutup Hari</button>
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
                                            <!-- <tbody>
                                                <tr role="row">
                                                    <td>Tidak Full (Kg)</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                </tr> -->
                                                <tr role="row">
                                                    <td>Total (Kg)</td>
                                                    <td id="hsl_gs">-</td>
                                                    <td id="hsl_sp">-</td>
                                                    <td id="hsl_hc">-</td>
                                                    <td id="hsl_telor">-</td>
                                                </tr>
                                                <tr role="row">
                                                    <td>BS (Kg)</td>
                                                    <td colspan="4"><input type="number" class="form-control" id="inputmask-card-number" name="BS" min="0"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">       
                                            <div class="modal-body">
                                                <h2 style="color: red">Tutup Hari</h2>
                                                <div class="row" style="margin-top: 20px;">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                        <!-- <div class="col-sm-12"> -->
                                                            <div class="col-sm-2 text-left">
                                                                <h6 style="color: blue;">Jumlah Grup</h6>
                                                                <input type="number" id="jml_grup" name="jml_grup" min="0" style="width: 50%">
                                                            </div>
                                                            <div class="col-sm-2 text-left">
                                                                <h6 style="color: blue;">Jumlah Pekerja</h6>
                                                                <input type="number" id="jml_Pekerja" name="jml_Pekerja" min="0" style="width: 50%">
                                                            </div>
                                                            <!-- </div> -->
                                                        </div>
                                                        <br>
                                                        <table id="review_penerimaan" class="table table-striped table-bordered dataTable no-footer dtr-inline" role="grid" aria-describedby="datatable-buttons_info">
                                                            <thead>
                                                                <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 100px; text-align: center" aria-sort="ascending" aria-label="Penerimaan: activate to sort column descending">Penerimaan</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="OB: activate to sort column ascending">OB</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="HC: activate to sort column ascending">HC</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 50px; text-align: center" aria-label="8ML: activate to sort column ascending">8 ML</th>
                                                            </thead>
                                                            <tbody>
                                                                <tr role="row">
                                                                    <td>Kilogram</td>
                                                                    <td id="p_ob">-</td>
                                                                    <td id="p_hc">-</td>
                                                                    <td id="p_8ml">-</td>
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
                                                                <tr role="row">
                                                                    <td>Total (Kg)</td>
                                                                    <td id="h_gs">-</td>
                                                                    <td id="h_sp">-</td>
                                                                    <td id="h_hc">-</td>
                                                                    <td id="h_telor">-</td>
                                                                </tr>
                                                                <tr role="row">
                                                                    <td>BS (Kg)</td>
                                                                    <td colspan="4"><input type="number" class="form-control" id="bs" name="BS"></td>
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
                                                                            <td>Kilogram</td>
                                                                            <td id="pi_gs">-</td>
                                                                            <td id="pi_sp">-</td>
                                                                            <td id="pi_hc">-</td>
                                                                            <td id="pi_telor">-</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <br><button type="button" id="simpandata" class="btn btn-primary" style="margin-right: 10px;" onclick="kirimData()">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="modal fade bd-example-modal-sm" id="mdlgs" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <h4>Grup I</h4>
                                                <h5>Tambah Hasil GS</h5>
                                                <h6 style="color: blue;">Berat (Kg)</h6>
                                                <input type="number" id="brtgs" name="beratgs" min="0">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <button type="button" class="btn btn-primary" style="margin-right: 10px;margin-top:10px;" onclick="savegs()">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="modal fade bd-example-modal-sm" id="mdlsp" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <h4>Grup I</h4>
                                                <h5>Tambah Hasil SP</h5>
                                                <h6 style="color: blue;">Berat (Kg)</h6>
                                                <input type="number" id="brtsp" name="beratsp" min="0">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <button type="button" class="btn btn-primary" style="margin-right: 10px;margin-top:10px;" onclick="savesp()">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="modal fade bd-example-modal-sm" id="mdlhc" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <h4>Grup I</h4>
                                                <h5>Tambah Hasil HC</h5>
                                                <h6 style="color: blue;">Berat (Kg)</h6>
                                                <input type="number" id="brthc" name="berathc" min="0">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <button type="button" class="btn btn-primary" style="margin-right: 10px;margin-top:10px;" onclick="savehc()">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="modal fade bd-example-modal-sm" id="mdltelor" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-body text-center">
                                                <h4>Grup I</h4>
                                                <h5>Tambah Hasil Telor</h5>
                                                <h6 style="color: blue;">Berat (Kg)</h6>
                                                <input type="number" id="brttelor" name="berattelor" min="0">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <button type="button" class="btn btn-primary" style="margin-right: 10px;margin-top:10px;" onclick="savetelor()">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <p class="text-muted">Data Kosong. Tambah Berat Terlebih Dahulu!!!</p>
                                                    <button type="button" class="btn btn-primary" onclick="alert()">Ok</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="addgrup" style="visibility: hidden; display: none;">
                                        <div class="col-sm-12">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th>Grup I<br>Penerimaan</th>
                                                        <th>Berisi <input type="number" id="jml_pekerja" name="org_dlm_grup" style="width: 25%"> Orang</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPenerimaan">Tambah Penerimaan</button></td>
                                                        <td>
                                                        <div class="table-responsive">
                                                            <table class="table" id="pen">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th>Jenis Kacang</th>
                                                                        <th>Jumlah Kg</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <!-- <tr>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr> -->
                                                                </tbody>
                                                            </table>          
                                                        </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                                                            <th scope="row">GS<br><button type="button" class="btn btn-info" id="plusgs" onclick="gs()">+</button><br>
                                                            <button type="button" class="btn btn-danger" onclick="mgs()" id="mings" style="margin-top: 5px; height: 19px; padding-top: 0px; padding-bottom: 0px; width: 46px; margin-bottom: 0px;">-</button>
                                                            </th>
                                                            <td><input type="text" class="form-control" id="inputgs" onKeyUp="valgs(event)" style="height: 64px"></td>
                                                            <td>Jumlah (Kg)<br><input type="number" class="form-control" id="jmlgs" name="GS"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">SP<br><button type="button" class="btn btn-info" id="plussp" onclick="sp()">+</button><br>
                                                            <button type="button" class="btn btn-danger" onclick="msp()" id="minsp" style="margin-top: 5px; height: 19px; padding-top: 0px; padding-bottom: 0px; width: 46px; margin-bottom: 0px;">-</button>
                                                            </th>
                                                            <td><input type="text" class="form-control" id="inputsp" onKeyUp="valsp(event)" style="height: 64px"></td>
                                                            <td>Jumlah (Kg)<br><input type="number" class="form-control" id="jmlsp" name="SP"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">HC<br><button type="button" class="btn btn-info" id="plushc" onclick="hc()">+</button><br>
                                                            <button type="button" class="btn btn-danger" onclick="mhc()" id="minhc" style="margin-top: 5px; height: 19px; padding-top: 0px; padding-bottom: 0px; width: 46px; margin-bottom: 0px;">-</button>
                                                            </th>
                                                            <td><input type="text" class="form-control" id="inputhc" onKeyUp="valhc(event)" style="height: 64px"></td>
                                                            <td>Jumlah (Kg)<br><input type="number" class="form-control" id="jmlhc" name="HC"></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Telor<br><button type="button" class="btn btn-info" id="plustelor" onclick="telor()">+</button><br>
                                                            <button type="button" class="btn btn-danger" onclick="mtelor()" id="mintelor" style="margin-top: 5px; height: 19px; padding-top: 0px; padding-bottom: 0px; width: 46px; margin-bottom: 0px;">-</button>
                                                            </th>
                                                            <td><input type="text" class="form-control" id="inputtelor" onKeyUp="valtelor(event)" style="height: 64px"></td>
                                                            <td>Jumlah (Kg)<br><input type="number" class="form-control" id="jmltelor" name="Telor"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="addPenerimaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                                </button>
                                                        <h5>Tambah Penerimaan</h5>
                                                        <div class="table-responsive">
                                                            <table class="table table-borderless">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Jenis Kacang<br>
                                                                            <select name="jenis_kc" id="jns_kcg">
                                                                                <option value="OB">OB</option>
                                                                                <option value="HC">HC</option>
                                                                                <option value="8ML">8ML</option>
                                                                            </select>
                                                                        </th>
                                                                        <th scope="col">Jumlah Kilogram<br><input type="number" class="form-control" id="jml_kg" name="jml_kg"></th>
                                                                    </tr>
                                                                </thead>
                                                            </table>  
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" onclick="x()" id="save-penerimaan">Simpan</button>
                                                    </div>
                                                </div>
                                            </div>
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
                                                                <th scope="row">GS<br><button type="button" class="btn btn-info" id="plussortirgs" onclick="sgs()">+</button><br>
                                                                <button type="button" class="btn btn-danger" id="minsortirgs" onclick="msgs()" style="margin-top: 5px; height: 19px; padding-top: 0px; padding-bottom: 0px; width: 46px; margin-bottom: 0px;">-</button>
                                                                </th>
                                                                <td>Jumlah Kilogram<br><input type="number" class="form-control" id="sortirgs" name="GS"></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">SP<br><button type="button" class="btn btn-info" id="plussortirsp" onclick="ssp()">+</button><br>
                                                                <button type="button" class="btn btn-danger" id="minsortirsp" onclick="mssp()" style="margin-top: 5px; height: 19px; padding-top: 0px; padding-bottom: 0px; width: 46px; margin-bottom: 0px;">-</button>
                                                                </th>
                                                                <td>Jumlah Kilogram<br><input type="number" class="form-control" id="sortirsp" name="SP"></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">HC<br><button type="button" class="btn btn-info" id="plussortirhc" onclick="shc()">+</button><br>
                                                                <button type="button" class="btn btn-danger" id="minsortirhc" onclick="mshc()" style="margin-top: 5px; height: 19px; padding-top: 0px; padding-bottom: 0px; width: 46px; margin-bottom: 0px;">-</button>
                                                                </th>
                                                                <td>Jumlah Kilogram<br><input type="number" class="form-control" id="sortirhc" name="HC"></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Telor<br><button type="button" class="btn btn-info" id="plussortirtelor" onclick="stelor()">+</button><br>
                                                                <button type="button" class="btn btn-danger" id="minsortirtelor" onclick="mstelor()" style="margin-top: 5px; height: 19px; padding-top: 0px; padding-bottom: 0px; width: 46px; margin-bottom: 0px;">-</button>
                                                                </th>
                                                                <td>Jumlah Kilogram<br><input type="number" class="form-control" id="sortirtelor" name="Telor"></td>
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
<script>

        function x(){
            var select = document.getElementById('jns_kcg');
            var jml = document.getElementById('jml_kg');
            
            var table = document.getElementById('pen');
            var row = table.insertRow(table.rows.length);

            var cell_1 = row.insertCell(0);
            var cell_2 = row.insertCell(1);

            cell_1.innerHTML = select.value;
            cell_2.innerHTML = jml.value;
            if(select.value=="OB"){
                document.getElementById('p_ob').innerHTML = jml.value;
            }else if(select.value=="HC"){
                document.getElementById('p_hc').innerHTML = jml.value;
            }else if(select.value=="8ML"){
                document.getElementById('p_8ml').innerHTML = jml.value;
            }
        }

        function y(){
            var gs = document.getElementById('jmlgs');
            var sp = document.getElementById('jmlsp');
            var hc = document.getElementById('jmlhc');
            var telor = document.getElementById('jmltelor');

            document.getElementById('h_gs').innerHTML = gs.value;
            document.getElementById('h_sp').innerHTML = sp.value;
            document.getElementById('h_hc').innerHTML = hc.value;
            document.getElementById('h_telor').innerHTML = telor.value;

            var strgs = document.getElementById('sortirgs');
            var strsp = document.getElementById('sortirsp');
            var strhc = document.getElementById('sortirhc');
            var strtelor = document.getElementById('sortirtelor');

            document.getElementById('pi_gs').innerHTML = strgs.value;
            document.getElementById('pi_sp').innerHTML = strsp.value;
            document.getElementById('pi_hc').innerHTML = strhc.value;
            document.getElementById('pi_telor').innerHTML = strtelor.value;
        }
    
    //Kirim Data
    function kirimData(){
        let jsonberat = [];
        var data;
        data = {
            pekerja : Number(document.getElementById('jml_pekerja').value),

            penerimaan_ob : document.getElementById('p_ob').innerHTML,
            penerimaan_hc : document.getElementById('p_hc').innerHTML,
            penerimaan_8ml : document.getElementById('p_8ml').innerHTML,

            hasil_gs : $('#jmlgs').val(),
            hasil_sp : $('#jmlsp').val(),
            hasil_hc : $('#jmlhc').val(),
            hasil_telor : $('#jmltelor').val(),

            sortir_gs : $('#sortirgs').val(),
            sortir_sp : $('#sortirsp').val(),
            sortir_hc : $('#sortirhc').val(),
            sortir_telor : $('#sortirtelor').val(),

            bs : $('#bs').val(),

            

        }
            jsonberat.push(data);

            let jsondata = JSON.stringify(jsonberat);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ url('/kerjaharian/simpanhasil') }}",
            method: 'POST',
            data: {
                data : jsondata,
            },
                success: function(result){
                    $("#exampleModalLong").modal('hide');
                    swal({
                        title: 'Berhasil!',
                        text: 'Data Berhasil Disimpan',
                        timer: 3000,
                        showConfirmButton: false,
                        type: 'success',
                    }).then(
                    function () {
                    },
                    function (dismiss) {
                        if (dismiss === 'timer') {
                        }
                    }
                    );
                }
            });

    }

    function show() {
        var table = document.getElementById("addgrup");
        table.setAttribute("style", "display: table; visibility: visible")
    }
    function savegs(){
        $('#mdlgs').modal('hide');
        document.getElementById('inputgs').value = document.getElementById('brtgs').value;
        document.getElementById("jmlgs").value = document.getElementById('brtgs').value;
        document.getElementById("hsl_gs").innerHTML = document.getElementById("jmlgs").value;
    }

    function savesp(){
        $('#mdlsp').modal('hide');
        document.getElementById('inputsp').value = document.getElementById('brtsp').value;
        document.getElementById("jmlsp").value = document.getElementById('brtsp').value;
        document.getElementById("hsl_sp").innerHTML = document.getElementById("jmlsp").value;
    }

    function savehc(){
        $('#mdlhc').modal('hide');
        document.getElementById('inputhc').value = document.getElementById('brthc').value;
        document.getElementById("jmlhc").value = document.getElementById('brthc').value;
        document.getElementById("hsl_hc").innerHTML = document.getElementById("jmlhc").value;
    }

    function savetelor(){
        $('#mdltelor').modal('hide');
        document.getElementById('inputtelor').value = document.getElementById('brttelor').value;
        document.getElementById("jmltelor").value = document.getElementById('brttelor').value;
        document.getElementById("hsl_telor").innerHTML = document.getElementById("jmltelor").value;
    }

    function alert(){
        $('#alert').modal('hide');
    }

// Proses Sortir
function gs(){
    var check = document.getElementById('inputgs').value;
    var x = document.getElementById('brtgs').value;
    if(check==""){
        $('#mdlgs').modal('show');
    }
    else{
        if(check == 0){
            check = x;
        }
        else{
            var a = check;
            check = a.concat("+",x);
        }
    }
    document.getElementById('inputgs').value = check;
    splitgs(check);
}

function splitgs(index){
    var jum=0;
    if(index=="" || index=="0"){
        document.getElementById("jmlgs").value = jum;
    }
    else{
        var arr = index.split('+');
    
    for(var i=0; i<arr.length; i++)
    {
        jum = jum + parseInt(arr[i]);
    }
    document.getElementById("jmlgs").value = jum;
    }
    document.getElementById("hsl_gs").innerHTML = document.getElementById("jmlgs").value;
}

function valgs(event){
    var x = document.getElementById('inputgs').value;
    splitgs(x);
}

function sp(){
    var check = document.getElementById('inputsp').value;
    var x = document.getElementById('brtsp').value;
    if(check==""){
        $('#mdlsp').modal('show');
    }
    else{
        if(check == 0){
            check = x;
        }
        else{
            var a = check;
            check = a.concat("+",x);
        }
    }
    document.getElementById('inputsp').value = check;
    splitsp(check);
}

function splitsp(index){
    var jum=0;
    if(index=="" || index=="0"){
        document.getElementById("jmlsp").value = jum;
    }
    else{
        var arr = index.split('+');
    
    for(var i=0; i<arr.length; i++)
    {
        jum = jum + parseInt(arr[i]);
    }
    document.getElementById("jmlsp").value = jum;
    }
    document.getElementById("hsl_sp").innerHTML = document.getElementById("jmlsp").value;
}

function valsp(event){
    var x = document.getElementById('inputsp').value;
    splitsp(x);
}

function hc(){
    var check = document.getElementById('inputhc').value;
    var x = document.getElementById('brthc').value;
    if(check==""){
        $('#mdlhc').modal('show');
    }
    else{
        if(check == 0){
            check = x;
        }
        else{
            var a = check;
            check = a.concat("+",x);
        }
    }
    document.getElementById('inputhc').value = check;
    splithc(check);
}

function splithc(index){
    var jum=0;
    if(index=="" || index=="0"){
        document.getElementById("jmlhc").value = jum;
    }
    else{
        var arr = index.split('+');
    
    for(var i=0; i<arr.length; i++)
    {
        jum = jum + parseInt(arr[i]);
    }
    document.getElementById("jmlhc").value = jum;
    }
    document.getElementById("hsl_hc").innerHTML = document.getElementById("jmlhc").value;
}

function valhc(event){
    var x = document.getElementById('inputhc').value;
    splithc(x);
}

function telor(){
    var check = document.getElementById('inputtelor').value;
    var x = document.getElementById('brttelor').value;
    if(check==""){
        $('#mdltelor').modal('show');
    }
    else{
        if(check == 0){
            check = x;
        }
        else{
            var a = check;
            check = a.concat("+",x);
        }
    }
    document.getElementById('inputtelor').value = check;
    splittelor(check);
}

function splittelor(index){
    var jum=0;
    if(index=="" || index=="0"){
        document.getElementById("jmltelor").value = jum;
    }
    else{
        var arr = index.split('+');
    
    for(var i=0; i<arr.length; i++)
    {
        jum = jum + parseInt(arr[i]);
    }
    document.getElementById("jmltelor").value = jum;
    }
    document.getElementById("hsl_telor").innerHTML = document.getElementById("jmltelor").value;
}

function valtelor(event){
    var x = document.getElementById('inputtelor').value;
    splittelor(x);
}

function mgs(){
    check = document.getElementById('inputgs').value;
    var x = document.getElementById('brtgs').value;
    if(check==""){
        $('#alert').modal('show');
    }
    else{
        var arr = check.split('+');
        var a;
        if(arr.length-1 == 0){
            a = 0;
        }else{
            for(var i=0; i<arr.length-1; i++)
            {
                if(i==0){
                    a = x;
                }
                else{
                    a = a.concat("+",arr[i]);
                }
            }
        }
        check = a;
    }
    document.getElementById('inputgs').value = check;
    splitgs(check);
}

function msp(){
    check = document.getElementById('inputsp').value;
    var x = document.getElementById('brtsp').value;
    if(check==""){
        $('#alert').modal('show');
    }
    else{
        var arr = check.split('+');
        var a;
        if(arr.length-1 == 0){
            a = 0;
        }else{
            for(var i=0; i<arr.length-1; i++)
            {
                if(i==0){
                    a = x;
                }
                else{
                    a = a.concat("+",arr[i]);
                }
            }
        }
        check = a;
    }
    document.getElementById('inputsp').value = check;
    splitsp(check);
}

function mhc(){
    check = document.getElementById('inputhc').value;
    var x = document.getElementById('brthc').value;
    if(check==""){
        $('#alert').modal('show');
    }
    else{
        var arr = check.split('+');
        var a;
        if(arr.length-1 == 0){
            a = 0;
        }else{
            for(var i=0; i<arr.length-1; i++)
            {
                if(i==0){
                    a = x;
                }
                else{
                    a = a.concat("+",arr[i]);
                }
            }
        }
        check = a;
    }
    document.getElementById('inputhc').value = check;
    splithc(check);
}

function mtelor(){
    check = document.getElementById('inputtelor').value;
    var x = document.getElementById('brttelor').value;
    if(check==""){
        $('#alert').modal('show');
    }
    else{
        var arr = check.split('+');
        var a;
        if(arr.length-1 == 0){
            a = 0;
        }else{
            for(var i=0; i<arr.length-1; i++)
            {
                if(i==0){
                    a = x;
                }
                else{
                    a = a.concat("+",arr[i]);
                }
            }
        }
        check = a;
    }
    document.getElementById('inputtelor').value = check;
    splittelor(check);
}

// Pengambilan Inter
function sgs(){
    var x = document.getElementById('sortirgs').value;
    if(x==0 || x==""){
        x = 1;
    }else{
        x = parseInt(x) + 1;
    }
    document.getElementById('sortirgs').value = x;
}

function msgs(){
    var x = document.getElementById('sortirgs').value;
    if(x==0){
        x = 0;
    }else{
        x = parseInt(x) - 1;
    }
    document.getElementById('sortirgs').value = x;
}

function ssp(){
    var x = document.getElementById('sortirsp').value;
    if(x==0 || x==""){
        x = 1;
    }else{
        x = parseInt(x) + 1;
    }
    document.getElementById('sortirsp').value = x;
}

function mssp(){
    var x = document.getElementById('sortirsp').value;
    if(x==0){
        x = 0;
    }else{
        x = parseInt(x) - 1;
    }
    document.getElementById('sortirsp').value = x;
}

function shc(){
    var x = document.getElementById('sortirhc').value;
    if(x==0 || x==""){
        x = 1;
    }else{
        x = parseInt(x) + 1;
    }
    document.getElementById('sortirhc').value = x;
}

function mshc(){
    var x = document.getElementById('sortirhc').value;
    if(x==0){
        x = 0;
    }else{
        x = parseInt(x) - 1;
    }
    document.getElementById('sortirhc').value = x;
}

function stelor(){
    var x = document.getElementById('sortirtelor').value;
    if(x==0 || x==""){
        x = 1;
    }else{
        x = parseInt(x) + 1;
    }
    document.getElementById('sortirtelor').value = x;
}

function mstelor(){
    var x = document.getElementById('sortirtelor').value;
    if(x==0){
        x = 0;
    }else{
        x = parseInt(x) - 1;
    }
    document.getElementById('sortirtelor').value = x;
}

</script>
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