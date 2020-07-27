@section('title') 
Edit Surat Penerimaan Barang
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
            <h4 class="page-title">Edit Surat Penerimaan Barang</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/penerimaan/history_penerimaan')}}">Penerimaan Barang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Surat Penerimaan Barang</li>
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
                            <?php
                                    function tgl_indo($tanggal){
                                        $bulan = array (
                                            1 =>   'Januari',
                                            'Februari',
                                            'Maret',
                                            'April',
                                            'Mei',
                                            'Juni',
                                            'Juli',
                                            'Agustus',
                                            'September',
                                            'Oktober',
                                            'November',
                                            'Desember'
                                        );
                                        $pecahkan = explode('-', $tanggal);
                                        
                                        // variabel pecahkan 0 = tanggal
                                        // variabel pecahkan 1 = bulan
                                        // variabel pecahkan 2 = tahun
                                     
                                        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                                    }
                                     
                                    
                            ?>
    
                            <div class="card-header">
                                   <div class="row">
                                        <h5 class="card-title ml-3">Penerimaan Pemindahan Bahan</h5>
                                        <h5 class="card-title ml-auto mr-3" >
                                            {{ tgl_indo(date('Y-m-d' , strtotime($penerimaan->timestamp))) }}
                                        </h5>
                                    </div>
                            </div>
    

                            <input type="hidden" id="kode_penerimaan" value="{{ $penerimaan->id_penerimaan }}">

                            <div class="card-body"> 
                                <form id="pemindahan_bahan" method="post" action="" >
                                    @csrf

                                    <!-- jenis penerimaan : dari pemindahanbahan -->
                                    <input type="hidden" id="jenis_penerimaan" name="id_jenis_penerimaan" value="{{ $penerimaan->id_jenis_penerimaan }}">

                                    <input type="hidden" id="kode_pemindahanbahan" name="id_pemindahan_bahan" value="{{ $penerimaan->id_transaksi }}">

                           

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-archive" aria-hidden="true"></i>
                                                <label for="gudang_asal">Gudang Asal</label>
                                                <select id="gudang_asal" name="id_gudang_asal" class="form-control @error('id_gudang_asal') is-invalid @enderror" value="{{ $penerimaan->id_gudang_asal }}">
                                                    <option disabled selected readonly>Pilih Salah Satu...</option>
                                                    @foreach($gudang as $g)
                                                    <option value="{{ $g->id_gudang }}"
                                                          @if($g->id_gudang == $penerimaan->id_gudang_asal)
                                                            selected
                                                        @endif >{{ $g->nama }}</option>
                                                    @endforeach
                                                </select>
                                                @error('id_gudang_asal') 
                                                    <div class="invalid-feedback form-error font-error"> 
                                                                {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-archive" aria-hidden="true"></i>
                                                <label for="gudang_tujuan">Gudang Tujuan</label>
                                                <select id="gudang_tujuan" name="id_gudang_tujuan" class="form-control @error('id_gudang_tujuan') is-invalid @enderror" value="{{ $penerimaan->id_gudang_tujuan }}">
                                                    <option disabled selected readonly>Pilih Salah Satu...</option>
                                                    @foreach($gudang_tujuan as $gt)
                                                    <option value="{{ $gt->id_gudang }}"
                                                          @if($gt->id_gudang == $penerimaan->id_gudang_tujuan)
                                                            selected
                                                        @endif >{{ $gt->nama }}</option>
                                                    @endforeach
                                                </select>
                                                @error('id_gudang_tujuan') 
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
                                                        <input type="text" id="kode-bahan" class="form-control @error('id_bahan_baku') is-invalid @enderror" placeholder="Masukkan ID Bahan Baku" aria-label="ID Bahan Baku" aria-describedby="button-addon-group" name="id_bahan_baku" value="{{ $penerimaan->id_bahan_baku }}">
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
                                                <input type="text" class="form-control @error('nama_bahan') is-invalid @enderror" name="nama_bahan" id="nama-bahan" placeholder="Masukkan Nama Bahan Baku" value="{{ $penerimaan->nama_bahan_baku }}">
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
                                                <label for="berat_pindah">Berat Pindah(Kg)</label>
                                                <input type="number" class="form-control  @error('berat_pindah') is-invalid @enderror" id="berat_pindah" name="berat_pindah" placeholder="Masukkan Berat Pindah" value="{{ $detail_transaksi->berat_pindah}}">
                                                 @error('berat_pindah') 
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
                                                <input type="number" class="form-control @error('berat_aktual') is-invalid @enderror" id="berat_netto" name="berat_aktual" placeholder="Masukkan Berat Netto" oninput="hitungSusut();" value="{{ $penerimaan->berat_aktual }}">
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
                                                <input type="number" class="form-control" id="penyusutan" name="berat_susut_kg"  value="{{ $detail_transaksi->berat_susut_kg }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-group col-md-8">
                                                <i class="fa fa-level-down" aria-hidden="true"></i>
                                                <label for="inputPersen">Penyusutan (%)</label>
                                                <input type="number" class="form-control" id="percent_penyusutan" name="berat_susut_persen"  value="{{ $detail_transaksi->berat_susut_persen }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    
                                    <div class="form-row">
                                        <div class="widgetbar" align="center">
                                            <a onclick="submitSementara();" class="btn btn-light simpan-sementara">Simpan Sementara</a>
                                        
                                            <a onclick="submitPenerimaan();" class="btn btn-primary" style="color: white;">Selesai</a>

                                            <a href="/penerimaan/cetak_barcode/{{ $penerimaan->id_penerimaan }}" class="btn btn-primary">Cetak Barcode</a>
                                      
                                            <a href="{{url('/penerimaan/history_penerimaan')}}" class="btn btn-primary">Tutup</a>
                                        </div>                        
                                    </div>
                                   
                                </form>

                                
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

@endsection 
@section('script')

<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>


function submitSementara(){
  var id_penerimaan = document.getElementById('kode_penerimaan').value;  
  $("#pemindahan_bahan").attr("action", "/penerimaan/update_sementara_penerimaan_pemindahanbahan/"+id_penerimaan);
  document.getElementById('pemindahan_bahan').submit();
}


function submitPenerimaan(){
  var id_penerimaan = document.getElementById('kode_penerimaan').value;  
  $("#pemindahan_bahan").attr("action", "/penerimaan/update_penerimaan_pemindahanbahan/"+id_penerimaan);
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




  function hitungSusut(){

    var berat_pindah = document.getElementById("berat_pindah").value;
    var berat_netto = document.getElementById("berat_netto").value;

    if (berat_pindah == "" || berat_netto == "") {

        document.getElementById('penyusutan').value = 0;
        document.getElementById('percent_penyusutan').value = 0;

    }
    else {
        var s = berat_pindah - berat_netto;
        var susut = s.toFixed(2);
        var ps = (susut / berat_pindah)* 100;
        var percent_susut = ps.toFixed(2);

        document.getElementById('penyusutan').value = susut;
        document.getElementById('percent_penyusutan').value = percent_susut;
    }
        
    

    $(document).on('keyup', '#berat_pindah', function (e) {
        hitungSusut();
    });


  }

</script>


@endsection 