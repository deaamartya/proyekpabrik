@section('title') 
Surat Penerimaan Barang
@endsection 
@extends('managerproduksi.layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />





<style type="text/css">
    tr {
        cursor: pointer;
    }
</style>

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Surat Penerimaan Barang</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/penerimaan/history_penerimaan')}}">Penerimaan Barang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Surat Penerimaan Barang</li>
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
    
                     <ul class="nav nav-pills justify-content-center custom-tab-button header-tab" id="pills-tab-button" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab-button" data-toggle="pill" href="#pills-home-button" role="tab" aria-controls="pills-home-button" aria-selected="true"><span class="tab-btn-icon"><i class="feather icon-tag"></i></span>Supplier</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab-button" data-toggle="pill" href="#pills-profile-button" role="tab" aria-controls="pills-profile-button" aria-selected="false"><span class="tab-btn-icon"><i class="feather icon-tag"></i></span>Pemindahan Bahan</a>
                        </li>
                    </ul>


                    <div class="tab-content" id="pills-tabContent-button">
                        <!-- tab halaman penerimaan supplier  start -->
                        <div class="tab-pane fade show active" id="pills-home-button" role="tabpanel" aria-labelledby="pills-home-tab-button">

                            <div class="card-header">
                                   <div class="row">
                                        <h5 class="card-title ml-3">Penerimaan Supplier</h5>
                                        <h5 class="card-title ml-auto mr-3" id="date"></h5>
                                    </div>
                            </div>

                            <div class="card-body"> 
                                <form id="penerimaan_supplier" method="post" action="" autocomplete="off">
                                    @csrf

                                    <!-- jenis penerimaan : dari supplier -->
                                    <input type="hidden" id="jenis_penerimaan" name="id_jenis_penerimaan" value="1">

                                    <input type="hidden" id="kode_penerimaan" name="id_penerimaan" value="{{ $id_penerimaan }}">

                                    <div class="form-row">
                                        <div class="form-group col-md-6" >
                                            <div class="form-group col-md-8" id="supplier" >
                                                <i class="fa fa-building" aria-hidden="true"></i>
                                                <label for="pilih_supplier">Supplier</label>
                                                <select id="pilih_supplier" name="id_supplier" value="{{old('id_supplier')}}"  class="form-control @error('id_supplier') is-invalid @enderror">
                                                    <option disabled selected readonly>- Pilih Supplier -</option>
                                                    @foreach($supplier as $s)
                                                    <option value="{{ $s->id_supplier }}"
                                                        @if($s->id_supplier == old('id_supplier'))
                                                            selected
                                                        @endif 
                                                     >{{ $s->nama }}</option>
                                                    @endforeach
                                                </select>


                                                @error('id_supplier') 
                                                    <div class="invalid-feedback form-error font-error">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <label for="inputSuratJalan">No. Surat Jalan</label>
                                                <input type="text" class="form-control @error('id_transaksi') is-invalid @enderror" id="inputSuratJalan" name="id_transaksi" placeholder="Masukkan Nomor Surat Jalan" value="{{old('id_transaksi')}}">
                                                 @error('id_transaksi') 
                                                    <div class="invalid-feedback form-error font-error">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <label for="inputKontainer">Nomor Kontainer</label>
                                                <input type="text" class="form-control @error('nomor_kontainer') is-invalid @enderror" id="inputKontainer" name="nomor_kontainer" placeholder="Masukkan Nomor Kontainer" value="{{old('nomor_kontainer')}}">
                                                 @error('nomor_kontainer') 
                                                    <div class="invalid-feedback form-error font-error">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <label for="inputPolisi">Nomor Polisi</label>
                                                <input type="text" class="form-control @error('nomor_polisi') is-invalid @enderror" id="inputPolisi" name="nomor_polisi" placeholder="Masukkan Nomor Polisi" value="{{old('nomor_polisi')}}">
                                                @error('nomor_polisi') 
                                                    <div class="invalid-feedback form-error font-error">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-archive" aria-hidden="true"></i>
                                                <label for="inputGudangSimpan">Gudang Simpan</label>
                                                <select id="inputGudangSimpan" name="id_gudang" class="form-control  @error('id_gudang') is-invalid @enderror" value="{{old('id_gudang')}}">  
                                                    <option disabled selected readonly>Pilih Salah Satu...</option>
                                                    @foreach($gudang as $g)
                                                    <option value="{{ $g->id_gudang }}"
                                                         @if($g->id_gudang == old('id_gudang'))
                                                            selected
                                                        @endif >{{ $g->nama }}</option>
                                                    @endforeach
                                                </select>
                                                @error('id_gudang') 
                                                    <div class="invalid-feedback form-error font-error">
                                                        {{ $message }}
                                                    </div>
                                                @enderror  
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <div class="form-group col-md-8">
                                                    <i class="fa fa-industry" aria-hidden="true"></i>
                                                    <label for="kode-bahan">ID Bahan Baku</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="kode-bahan" class="form-control @error('id_bahan_baku') is-invalid @enderror" placeholder="Masukkan ID Bahan Baku" aria-label="ID Bahan Baku" aria-describedby="button-addon-group" name="id_bahan_baku" value="{{ old('id_bahan_baku') }}">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="button" id="button-addon-group" data-toggle="modal" data-target="#modal">Pilih Bahan Baku</button>
                                                        </div>
                                                        @error('id_bahan_baku') 
                                                            <div class="invalid-feedback form-error font-error"> 
                                                                {{ $message }}
                                                            </div>
                                                        @enderror 
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-industry" aria-hidden="true"></i>
                                                <label for="nama-bahan">Nama Bahan Baku</label>
                                                <input type="text" class="form-control @error('nama_bahan') is-invalid @enderror" name="nama_bahan" id="nama-bahan" placeholder="Masukkan Nama Bahan Baku" value="{{ old('nama_bahan') }}">
                                                @error('nama_bahan') 
                                                            <div class="invalid-feedback form-error font-error"> 
                                                                {{ $message }}
                                                            </div>
                                                @enderror 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-balance-scale" aria-hidden="true"></i>
                                                <label for="inputBSJ">Berat Surat Jalan (Kg)</label>
                                                <input type="number" class="form-control @error('berat_surat_jalan') is-invalid @enderror" id="berat_suratjalan" name="berat_surat_jalan" placeholder="Masukkan Berat Surat Jalan" value="{{ old('berat_surat_jalan') }}">
                                                 @error('berat_surat_jalan') 
                                                            <div class="invalid-feedback form-error font-error"> 
                                                                {{ $message }}
                                                            </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-balance-scale" aria-hidden="true"></i>
                                                <label for="inputNetto">Berat Netto/Aktual (Kg)</label>
                                                <input type="number" class="form-control @error('berat_aktual') is-invalid @enderror" id="berat_netto" name="berat_aktual" placeholder="Masukkan Berat Netto" onkeyup="hitungSusut();" value="{{ old('berat_aktual') }}">
                                                 @error('berat_aktual') 
                                                            <div class="invalid-feedback form-error font-error"> 
                                                                {{ $message }}
                                                            </div>
                                                @enderror
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-level-down" aria-hidden="true"></i>
                                                <label for="inputPKG">Penyusutan (Kg)</label>
                                                <input type="number" class="form-control" id="penyusutan" name="berat_susut_kg"  value="" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-level-down" aria-hidden="true"></i>
                                                <label for="inputPersen">Penyusutan (%)</label>
                                                <input type="number" class="form-control" id="percent_penyusutan" name="berat_susut_persen"  value="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    
                                    <div class="form-row">
                                        <div class="widgetbar" align="center">
                                            <a onclick="submitSementara();" class="btn btn-light simpan-sementara">Simpan Sementara</a>
                                        
                                            <a onclick="submitPenerimaan();" class="btn btn-primary" style="color: white;">Selesai</a>
                                            

                                            <a href="/penerimaan/cetak_barcode/{{ $id_penerimaan }}" class="btn btn-primary">Cetak Barcode</a>
                                       
                                      
                                            <a href="{{url('/penerimaan/history_penerimaan')}}" class="btn btn-primary">Tutup</a>
                                        </div>                        
                                    </div>
                                   
                                </form>

                                
                            </div>

                        </div>

                        <!-- tab halaman penerimaan supplier end -->


                        <!-- tab halaman pemindahan bahan start -->

                        <div class="tab-pane fade" id="pills-profile-button" role="tabpanel" aria-labelledby="pills-profile-tab-button">

                            <div class="card-header">
                                   <div class="row">
                                    <h5 class="card-title ml-3">Penerimaan Pemindahan Bahan</h5>
                                    <h5 class="card-title ml-auto mr-3" id="date2"></h5>
                                </div>
                            </div>
                          
                            <div class="card-body">
                                <form id="pemindahan_bahan" method="post" action="" autocomplete="off">
                                    @csrf

                                    <!-- jenis penerimaan : pemindahan bahan-->
                                    <input type="hidden" id="jenis_penerimaan2" name="id_jenis_penerimaan2" value="2">

                                    <input type="hidden" id="kode_penerimaan2" name="id_penerimaan" value="{{ $id_penerimaan }}">

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <label for="inputSuratJalan2">No. Surat Jalan</label>
                                                <input type="text" class="form-control @error('id_transaksi2') is-invalid @enderror" id="inputSuratJalan2" name="id_transaksi2" placeholder="Masukkan Nomor Surat Jalan" value="{{ old('id_transaksi2') }}">
                                                @error('id_transaksi2') 
                                                    <div class="invalid-feedback form-error font-error"> 
                                                                {{ $message }}
                                                    </div>
                                                @enderror 
                                            </div>
                                        </div>
                                         <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-archive" aria-hidden="true"></i>
                                                <label for="inputGudangSimpan2">Gudang Simpan</label>
                                                <select id="inputGudangSimpan2" name="id_gudang2" class="form-control @error('id_gudang2') is-invalid @enderror" value="{{ old('id_gudang2') }}">
                                                    <option disabled selected readonly>Pilih Salah Satu...</option>
                                                    @foreach($gudang as $g)
                                                    <option value="{{ $g->id_gudang }}"
                                                          @if($g->id_gudang == old('id_gudang2'))
                                                            selected
                                                        @endif >{{ $g->nama }}</option>
                                                    @endforeach
                                                </select>
                                                @error('id_gudang2') 
                                                    <div class="invalid-feedback form-error font-error"> 
                                                                {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <div class="form-group col-md-8">
                                                    <i class="fa fa-industry" aria-hidden="true"></i>
                                                    <label for="kode-bahan2">ID Bahan Baku</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="kode-bahan2" class="form-control @error('id_bahan_baku2') is-invalid @enderror" placeholder="Masukkan ID Bahan Baku" aria-label="ID Bahan Baku" aria-describedby="button-addon-group" name="id_bahan_baku2" value="{{ old('id_bahan_baku2') }}">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="button" id="button-addon-group2" data-toggle="modal" data-target="#modal2">Pilih Bahan Baku</button>
                                                        </div>
                                                         @error('id_bahan_baku2') 
                                                            <div class="invalid-feedback form-error font-error"> 
                                                                        {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-industry" aria-hidden="true"></i>
                                                <label for="nama-bahan2">Nama Bahan Baku</label>
                                                <input type="text" class="form-control @error('nama_bahan2') is-invalid @enderror" id="nama-bahan2" name="nama_bahan2" placeholder="Masukkan Nama Bahan Baku" value="{{ old('nama_bahan2') }}">
                                                 @error('nama_bahan2') 
                                                            <div class="invalid-feedback form-error font-error"> 
                                                                        {{ $message }}
                                                            </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-balance-scale" aria-hidden="true"></i>
                                                <label for="inputBSJ">Berat Surat Jalan (Kg)</label>
                                                <input type="number" class="form-control  @error('berat_surat_jalan2') is-invalid @enderror" id="berat_suratjalan2" name="berat_surat_jalan2" placeholder="Masukkan Berat Surat Jalan" value="{{ old('berat_surat_jalan2') }}">
                                                 @error('berat_surat_jalan2') 
                                                            <div class="invalid-feedback form-error font-error"> 
                                                                        {{ $message }}
                                                            </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-balance-scale" aria-hidden="true"></i>
                                                <label for="berat_netto2">Berat Netto/Aktual (Kg)</label>
                                                <input type="number" class="form-control @error('berat_aktual2') is-invalid @enderror" id="berat_netto2" name="berat_aktual2" placeholder="Masukkan Berat Netto" onkeyup="hitungSusut2();" value="{{ old('berat_aktual2') }}">
                                                 @error('berat_aktual2') 
                                                            <div class="invalid-feedback form-error font-error"> 
                                                                        {{ $message }}
                                                            </div>
                                                @enderror
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-level-down" aria-hidden="true"></i>
                                                <label for="penyusutan2">Penyusutan (Kg)</label>
                                                <input type="number" class="form-control" id="penyusutan2" name="berat_susut_kg2" value="" readonly="">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-level-down" aria-hidden="true"></i>
                                                <label for="percent_penyusutan2">Penyusutan (%)</label>
                                                <input type="number" class="form-control" id="percent_penyusutan2" name="berat_susut_persen2" value="" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    
                                    <div class="form-row">
                                        <div class="widgetbar" align="center">
                                            <a onclick="submitSementara2();" class="btn btn-light simpan-sementara">Simpan Sementara</a>
                                        
                                            <a onclick="submitPenerimaan2();" class="btn btn-primary" style="color: white;">Selesai</a>

                                            

                                            <a href="/penerimaan/cetak_barcode/{{ $id_penerimaan }}" onclick="cetak_barcode();" class="btn btn-primary">Cetak Barcode</a>

                                           
                                      
                                            <a href="{{url('/penerimaan/history_penerimaan')}}" class="btn btn-primary">Tutup</a>
                                        </div>                        
                                    </div>
                                   
                                </form>

                            </div>
                        </div>

                        <!-- tab halaman pemindahan bahan start -->

                    </div>



                
            </div>
        </div>
        <!-- End col -->
    </div> <!-- End row -->
</div>
<!-- End Contentbar -->

 <div id="modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <center>
                    <h3 class="modal-title">Pilih Bahan Baku</h3>
                    </center>
                </div>
                    <div class="modal-body" >
                            <table width="100%" class="table table-hover" id="table-modal" >
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Bahan Baku</th>
                                        <th>Nama Bahan Baku</th>
                                        <th>Tipe Bahan Baku</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $nomor = 0;
                                    ?>
                                    @foreach($bahanbaku as $bb)
                                    <?php
                                        $nomor = $nomor+1;
                                    ?>
                                    
                                    <tr id="bhn-baku" data-kode="{{$bb->id_bahan_baku}}" data-nama="{{$bb->nama_bahan_baku}}" class="center" >
                                        <td><?php echo $nomor."."; ?></td>
                                        <td>{{$bb->id_bahan_baku}}</td>
                                        <td>{{$bb->nama_bahan_baku}}</td>
                                        <td >{{$bb->nama_tipe_bahan_baku}}</td>
                                    </tr>

                                    @endforeach

                                   

                                </tbody>
                            </table>

                    </div> 
                   
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
            </div>
        </div>
    </div>

<!-- modal pemindahan bahan start  -->

    <div id="modal2" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <center>
                    <h3 class="modal-title">Pilih Bahan Baku</h3>
                    </center>
                </div>
                    <div class="modal-body" >

                            <table width="100%" class="table table-hover" id="table-modal2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Bahan Baku</th>
                                        <th>Nama Bahan Baku</th>
                                        <th>Tipe Bahan Baku</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $nomor = 0;
                                    ?>
                                    @foreach($bahanbaku as $bb)
                                    <?php
                                        $nomor = $nomor+1;
                                    ?>
                                    
                                    <tr id="bhn-baku2" data-kode2="{{$bb->id_bahan_baku}}" data-nama2="{{$bb->nama_bahan_baku}}" class="center" >
                                        <td><?php echo $nomor."."; ?></td>
                                        <td>{{$bb->id_bahan_baku}}</td>
                                        <td>{{$bb->nama_bahan_baku}}</td>
                                        <td >{{$bb->nama_tipe_bahan_baku}}</td>
                                    </tr>

                                    @endforeach

                                   

                                </tbody>
                            </table>
                       
                    </div> 
                   
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </div>
            </div>
        </div>
    </div>
@endsection 
@section('script')

<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>



<script>

function submitSementara(){
  $("#penerimaan_supplier").attr("action", "/penerimaan/store_sementara_penerimaan_supplier");
  document.getElementById('penerimaan_supplier').submit();
}

function submitSementara2(){
  $("#pemindahan_bahan").attr("action", "/penerimaan/store_sementara_penerimaan_pemindahanbahan");
  document.getElementById('pemindahan_bahan').submit();
}


function submitPenerimaan(){
  $("#penerimaan_supplier").attr("action", "/penerimaan/store_penerimaan_supplier");
  document.getElementById('penerimaan_supplier').submit();
}

function submitPenerimaan2(){
  $("#pemindahan_bahan").attr("action", "/penerimaan/store_penerimaan_pemindahanbahan");
  document.getElementById('pemindahan_bahan').submit();
}





$(document).ready(function(){
    $('#table-modal').DataTable();
   
    $(document).on('click', '#bhn-baku', function (e) {
        document.getElementById("kode-bahan").value = $(this).attr('data-kode');
        document.getElementById("nama-bahan").value = $(this).attr('data-nama');
        $('#modal').modal('hide');
    });
   
});

$(document).ready(function(){
    $('#table-modal2').DataTable();
   
    $(document).on('click', '#bhn-baku2', function (e) {
        document.getElementById("kode-bahan2").value = $(this).attr('data-kode2');
        document.getElementById("nama-bahan2").value = $(this).attr('data-nama2');
        $('#modal2').modal('hide');
    });
   
});

  $(document).ready( function() {
    var now = new Date();
    //var month = now.toLocaleString('default', { month: 'long' }); 
    var month_name = function(dt){
                    mlist = [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ];
                    return mlist[dt.getMonth()];
                    };
    var month = month_name(now);              
    var day = now.getDate();
    if (day < 10) 
        day = "0" + day;
    var today = day + ' ' + month + ' ' + now.getFullYear() ;
    document.getElementById('date').innerHTML = today;
    document.getElementById('date2').innerHTML = today;

});


  function hitungSusut(){

    var berat_suratjalan = document.getElementById("berat_suratjalan").value;
    var berat_netto = document.getElementById("berat_netto").value;

    if (berat_suratjalan == "" || berat_netto == "") {

        document.getElementById('penyusutan').value = 0;
        document.getElementById('percent_penyusutan').value = 0;

    }
    else {
        var s = berat_suratjalan - berat_netto;
        var susut = s.toFixed(2);
        var ps = (susut / berat_suratjalan)* 100;
        var percent_susut = ps.toFixed(2);

        document.getElementById('penyusutan').value = susut;
        document.getElementById('percent_penyusutan').value = percent_susut;
    }
        
    

    $(document).on('keyup', '#berat_suratjalan', function (e) {
        hitungSusut();
    });


  }

  function hitungSusut2(){


    var berat_suratjalan2 = document.getElementById("berat_suratjalan2").value;
    var berat_netto2 = document.getElementById("berat_netto2").value;

    if (berat_suratjalan2 == "" || berat_netto2 == ""  ) {

        document.getElementById('penyusutan2').value = 0;
        document.getElementById('percent_penyusutan2').value = 0;

    }else{
        var s2 = berat_suratjalan2 - berat_netto2;
        var susut2 = s2.toFixed(2);
        var ps2 = (susut2 / berat_suratjalan2)* 100;
        var percent_susut2 = ps2.toFixed(2);

        document.getElementById('penyusutan2').value = susut2;
        document.getElementById('percent_penyusutan2').value = percent_susut2;
    }

    $(document).on('keyup', '#berat_suratjalan2', function (e) {
        hitungSusut2();
    });

  }


  
</script>


@endsection 