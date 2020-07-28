@section('title') 
Input History Penerimaan Bahan
@endsection 
@extends('gudangkacang.layouts.main')
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
            <h4 class="page-title">Input History Penerimaan Bahan</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="/penerimaan_bahan_history">Penerimaan Bahan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Input Penerimaan Bahan
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
                    <h5 class="card-title">Input History Penerimaan Barang</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="tanggal">Tanggal</label>
                                <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="<?php echo date("d/m/Y"); ?>" disabled="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="no_surat_jalan">No. Surat Jalan</label>
                                <input type="text" class="form-control" id="no_surat_jalan" placeholder="No. Surat Jalan" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nomor_kontainer">Nomor Kontainer</label>
                                <input type="email" class="form-control" id="nomor_kontainer" placeholder="Nomor Kontainer" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nomor_polisi">Nomor Polisi</label>
                                <input type="email" class="form-control" id="nomor_polisi" placeholder="Nomor Polisi" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="gudang_simpan">Gudang Simpan</label>
                                <select id="gudang_simpan" class="form-control" required>
                                    <option selected="">Pilih Gudang Simpan</option>
                                    <option>Coolstorage 1</option>
                                    <option>Coolstorage 2</option>
                                    <option>Coolstorage 3</option>
                                    <option>Coolstorage 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nama_bahan_baku">Nama Bahan Baku</label>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" id="nama_bahan_baku" placeholder="ID Bahan Baku" required>
                            </div>
                            <div class="form-group col-md-6">   
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleStandardModal">
                                    Pilih Bahan Baku
                                </button>
                                <div class="modal fade" id="exampleStandardModal" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <!-- Start Modal Insert ID Bahan -->
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleStandardModalLabel">Pilih Bahan Baku</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <!-- End Modal Insert ID Bahan -->
                                            <!-- Start modal pop up insert id bahan -->
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Nama Bahan Baku</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>Bahan 1</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>Bahan 2</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>Bahan 3</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>          
                                                </div>
                                            </div>
                                            <!-- End modal pop up insert id bahan -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="inputDisabled" id="inputDisabled" placeholder="Ini Nanti Otomatis Dari Pilih Nomer Bahan Baku(ID)" disabled="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="berat_surat_jalan">Berat Surat Jalan (Kg)</label>
                                <input type="email" class="form-control" id="berat_surat_jalan" placeholder="Berat Surat Jalan (kg)" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="berat_netto">Berat Netto / Aktual (Kg)</label>
                                <input type="email" class="form-control" id="berat_netto" placeholder="Berat Netto / Aktual (kg)" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="penyusutan_kg">Penyusutan (Kg)</label>
                                <input type="email" class="form-control" id="penyusutan_kg" placeholder="Penyusutan (kg)" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="penyusutan_%">Penyusutan (%)</label>
                                <input type="email" class="form-control" id="penyusutan_%" placeholder="Penyusutan (%)" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn btn-primary" style="margin-right: 7px;">Simpan Sementara</button>
                            <button type="submit" class="btn btn-primary" style="margin-right: 7px;">Cetak Barcode</button>
                            <button type="submit" class="btn btn-primary" style="margin-right: 7px;">Selesai</button>
                            <button type="submit" class="btn btn-primary" style="margin-right: 7px;">Tutup</button>
                        </div>
                    </form>
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