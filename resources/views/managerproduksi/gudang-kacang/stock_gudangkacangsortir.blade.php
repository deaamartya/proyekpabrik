@section('title') 
Stock Gudang Kacang Sortir
@endsection 
@extends('managerproduksi.layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- Datepicker css -->
<link href="{{ asset('assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">

@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Data Stock Gudang Kacang Sortir</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Produksi</a></li>
                    <li class="breadcrumb-item"><a href="#">Gudang Kacang</a></li>
                    <li class="breadcrumb-item"><a href="#">Stock</a></li>
                    <li class="breadcrumb-item"><a href="#">Gudang Kacang Sortir</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Stock Gudang Kacang Sortir</li>
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
                            <a class="nav-link active" id="pills-home-tab-button" data-toggle="pill" href="#pills-home-button" role="tab" aria-controls="pills-home-button" aria-selected="true"><span class="tab-btn-icon"><i class="feather icon-tag"></i></span>GS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab-button" data-toggle="pill" href="#pills-profile-button" role="tab" aria-controls="pills-profile-button" aria-selected="false"><span class="tab-btn-icon"><i class="feather icon-tag"></i></span>SP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab-button" data-toggle="pill" href="#pills-contact-button" role="tab" aria-controls="pills-contact-button" aria-selected="false"><span class="tab-btn-icon"><i class="feather icon-tag"></i></span>HC</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-settings-tab-button" data-toggle="pill" href="#pills-settings-button" role="tab" aria-controls="pills-settings-button" aria-selected="false"><span class="tab-btn-icon"><i class="feather icon-tag"></i></span>Telor</a>
                        </li>
                    </ul>


                    <div class="tab-content" id="pills-tabContent-button">
                        <div class="tab-pane fade show active" id="pills-home-button" role="tabpanel" aria-labelledby="pills-home-tab-button">
                           <div class="card-header">
                                <h5 class="card-title" style="padding-left: 5px;">Kacang GS</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-row" style="margin-left: 4.5em;">
                                    <div class="form-group col-md-4">
                                            <label for="date1">Awal</label>
                                            <div class="input-group" style="width: 90%"> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon1"><i class="feather icon-calendar"></i></span>
                                                  </div>                             
                                                <input type="text" id="date1" class="datepicker-here form-control" placeholder="Pilih Tanggal Awal" aria-describedby="basic-addon1"/>   
                                            </div>
                                       
                                    </div>

                                    <div class="form-group col-md-4">
                                            <label for="date2">Akhir</label>
                                            <div class="input-group" style="width: 90%"> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
                                                  </div>                             
                                                <input type="text" id="date2" class="datepicker-here form-control" placeholder="Pilih Tanggal Akhir" aria-describedby="basic-addon2"/>  
                                            </div>
                                    </div>


                                    <div class="form-group col-md-4">
                                            <label for=""></label>
                                            <div class="input-group mt-2"> 
                                                <button id="terapkan_gs" class="btn btn-primary">Terapkan</button>
                                            </div>
                                    </div>
                                </div>

                                <br>
                                <div class="table-responsive">
                                    <table id="datatable1" class="display table table-bordered table-striped table-manpro-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Masuk</th>
                                                <th>Keluar</th>
                                                <th>Stock</th>
                                            </tr>
                                      
                                        </thead>
                                       
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="pills-profile-button" role="tabpanel" aria-labelledby="pills-profile-tab-button">
                           <div class="card-header">
                                <h5 class="card-title" style=" padding-left: 5px;">Kacang SP</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-row" style="margin-left: 4.5em;">
                                    <div class="form-group col-md-4">
                                            <label for="date3">Awal</label>
                                            <div class="input-group" style="width: 90%"> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon1"><i class="feather icon-calendar"></i></span>
                                                  </div>                             
                                                <input type="text" id="date3" class="datepicker-here form-control" placeholder="Pilih Tanggal Awal" aria-describedby="basic-addon1"/>   
                                            </div>
                                       
                                    </div>

                                    <div class="form-group col-md-4">
                                            <label for="date4">Akhir</label>
                                            <div class="input-group" style="width: 90%"> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
                                                  </div>                             
                                                <input type="text" id="date4" class="datepicker-here form-control" placeholder="Pilih Tanggal Akhir" aria-describedby="basic-addon2"/>  
                                            </div>
                                    </div>


                                    <div class="form-group col-md-4">
                                            <label for=""></label>
                                            <div class="input-group mt-2"> 
                                                <button id="terapkan_sp" class="btn btn-primary">Terapkan</button>
                                            </div>
                                    </div>
                                </div>

                                <br>
                                <div class="table-responsive">
                                    <table id="datatable2" class="display table table-bordered table-striped table-manpro-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Masuk</th>
                                                <th>Keluar</th>
                                                <th>Stock</th>
                                            </tr>
                                      
                                        </thead>
                                      
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-contact-button" role="tabpanel" aria-labelledby="pills-contact-tab-button">
                            <div class="card-header">
                                <h5 class="card-title" style="padding-left: 5px;">Kacang HC</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-row" style="margin-left: 4.5em;">
                                    <div class="form-group col-md-4">
                                            <label for="date5">Awal</label>
                                            <div class="input-group" style="width: 90%"> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon1"><i class="feather icon-calendar"></i></span>
                                                  </div>                             
                                                <input type="text" id="date5" class="datepicker-here form-control" placeholder="Pilih Tanggal Awal" aria-describedby="basic-addon1"/>   
                                            </div>
                                       
                                    </div>

                                    <div class="form-group col-md-4">
                                            <label for="date6">Akhir</label>
                                            <div class="input-group" style="width: 90%"> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
                                                  </div>                             
                                                <input type="text" id="date6" class="datepicker-here form-control" placeholder="Pilih Tanggal Akhir" aria-describedby="basic-addon2"/>  
                                            </div>
                                    </div>


                                    <div class="form-group col-md-4">
                                            <label for=""></label>
                                            <div class="input-group mt-2"> 
                                                <button id="terapkan_hc" class="btn btn-primary">Terapkan</button>
                                            </div>
                                    </div>
                                </div>

                                <br>
                                <div class="table-responsive">
                                    <table id="datatable3" class="display table table-bordered table-striped table-manpro-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Masuk</th>
                                                <th>Keluar</th>
                                                <th>Stock</th>
                                            </tr>
                                      
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-settings-button" role="tabpanel" aria-labelledby="pills-settings-tab-button">
                            <div class="card-header">
                                <h5 class="card-title" style="padding-left: 5px;">Kacang Telor</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-row" style="margin-left: 4.5em;">
                                    <div class="form-group col-md-4">
                                            <label for="date7">Awal</label>
                                            <div class="input-group" style="width: 90%"> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon1"><i class="feather icon-calendar"></i></span>
                                                  </div>                             
                                                <input type="text" id="date7" class="datepicker-here form-control" placeholder="Pilih Tanggal Awal" aria-describedby="basic-addon1"/>   
                                            </div>
                                       
                                    </div>

                                    <div class="form-group col-md-4">
                                            <label for="date8">Akhir</label>
                                            <div class="input-group" style="width: 90%"> 
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
                                                  </div>                             
                                                <input type="text" id="date8" class="datepicker-here form-control" placeholder="Pilih Tanggal Akhir" aria-describedby="basic-addon2"/>  
                                            </div>
                                    </div>


                                    <div class="form-group col-md-4">
                                            <label for=""></label>
                                            <div class="input-group mt-2"> 
                                                <button id="terapkan_telor" class="btn btn-primary">Terapkan</button>
                                            </div>
                                    </div>
                                </div>

                                <br>
                                <div class="table-responsive">
                                    <table id="datatable4" class="display table table-bordered table-striped table-manpro-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Masuk</th>
                                                <th>Keluar</th>
                                                <th>Stock</th>
                                            </tr>
                                      
                                        </thead>
                                      
                                    </table>
                                </div>
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
<!-- Datepicker JS -->
<script src="{{ asset('assets/plugins/datepicker/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datepicker/i18n/datepicker.en.js') }}"></script>


<!-- Datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
    $(document).ready(function() {
        var datatable1 = $('#datatable1').DataTable( {
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });

        var datatable2 = $('#datatable2').DataTable( {
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });

        var datatable3 = $('#datatable3').DataTable( {
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });

        var datatable4 = $('#datatable4').DataTable( {
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });



    $(document).on('click', '#terapkan_gs', function (e) {
    
    var awal_gs = document.getElementById('date1').value;
    var tgl_awal_gs = awal_gs.split("/").reverse().join("-");

    var akhir_gs = document.getElementById('date2').value;
    var tgl_akhir_gs = akhir_gs.split("/").reverse().join("-");


      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
            type:"POST",
            url:"/manpro-kacang/stock/gks/stock_kacang_gs",
            data:{
              "tgl_awal_gs":tgl_awal_gs,
              "tgl_akhir_gs":tgl_akhir_gs,

              "_token": "{{ csrf_token() }}",//harus ada ini jika menggunakan metode POST
            },
            success : function(results) {
            // console.log(JSON.stringify(results)); //print_r
                 
              
              for(var i=0; i<results.stock_gs.length; i++){
                    
                    datatable1.row.add([

                    results.stock_gs[i].tanggal,
                    results.stock_gs[i].keterangan,
                    results.stock_gs[i].masuk,
                    results.stock_gs[i].keluar,
                    results.stock_gs[i].stock
                       
                    ]).draw();
                 
                }
                 
  
    
             
            },
            error: function(data) {
                console.log(data);
            }
      });

    });



    $(document).on('click', '#terapkan_sp', function (e) {
    
    var awal_sp = document.getElementById('date3').value;
    var tgl_awal_sp = awal_sp.split("/").reverse().join("-");

    var akhir_sp = document.getElementById('date4').value;
    var tgl_akhir_sp = akhir_sp.split("/").reverse().join("-");


      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
            type:"POST",
            url:"/manpro-kacang/stock/gks/stock_kacang_sp",
            data:{
              "tgl_awal_sp":tgl_awal_sp,
              "tgl_akhir_sp":tgl_akhir_sp,

              "_token": "{{ csrf_token() }}",//harus ada ini jika menggunakan metode POST
            },
            success : function(results2) {
            // console.log(JSON.stringify(results)); //print_r
                 
              
              for(var i=0; i<results2.stock_sp.length; i++){
                    
                    datatable2.row.add([

                    results2.stock_sp[i].tanggal,
                    results2.stock_sp[i].keterangan,
                    results2.stock_sp[i].masuk,
                    results2.stock_sp[i].keluar,
                    results2.stock_sp[i].stock
                       
                    ]).draw();
                 
                }
                 
  
    
             
            },
            error: function(data) {
                console.log(data);
            }
      });

    });



    $(document).on('click', '#terapkan_hc', function (e) {
    
    var awal_hc = document.getElementById('date5').value;
    var tgl_awal_hc = awal_hc.split("/").reverse().join("-");

    var akhir_hc = document.getElementById('date6').value;
    var tgl_akhir_hc = akhir_hc.split("/").reverse().join("-");


      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
            type:"POST",
            url:"/manpro-kacang/stock/gks/stock_kacang_hc",
            data:{
              "tgl_awal_hc":tgl_awal_hc,
              "tgl_akhir_hc":tgl_akhir_hc,

              "_token": "{{ csrf_token() }}",//harus ada ini jika menggunakan metode POST
            },
            success : function(results3) {
            // console.log(JSON.stringify(results)); //print_r
                 
              
              for(var i=0; i<results3.stock_hc.length; i++){
                    
                    datatable3.row.add([

                    results3.stock_hc[i].tanggal,
                    results3.stock_hc[i].keterangan,
                    results3.stock_hc[i].masuk,
                    results3.stock_hc[i].keluar,
                    results3.stock_hc[i].stock
                       
                    ]).draw();
                 
                }
                 
  
    
             
            },
            error: function(data) {
                console.log(data);
            }
      });

    });



    $(document).on('click', '#terapkan_telor', function (e) {
    
    var awal_telor = document.getElementById('date7').value;
    var tgl_awal_telor = awal_telor.split("/").reverse().join("-");

    var akhir_telor = document.getElementById('date8').value;
    var tgl_akhir_telor = akhir_telor.split("/").reverse().join("-");


      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
            type:"POST",
            url:"/manpro-kacang/stock/gks/stock_kacang_telor",
            data:{
              "tgl_awal_telor":tgl_awal_telor,
              "tgl_akhir_telor":tgl_akhir_telor,

              "_token": "{{ csrf_token() }}",//harus ada ini jika menggunakan metode POST
            },
            success : function(results4) {
            // console.log(JSON.stringify(results)); //print_r
                 
              
              for(var i=0; i<results4.stock_telor.length; i++){
                    
                    datatable4.row.add([

                    results4.stock_telor[i].tanggal,
                    results4.stock_telor[i].keterangan,
                    results4.stock_telor[i].masuk,
                    results4.stock_telor[i].keluar,
                    results4.stock_telor[i].stock
                       
                    ]).draw();
                 
                }
                 
  
    
             
            },
            error: function(data) {
                console.log(data);
            }
      });

    });










});


    $(document).ready(function(){
        $('#date1').datepicker({
            language: 'en',
            autoClose: true,
            dateFormat: 'dd/mm/yyyy',
        });

        $('#date2').datepicker({
            language: 'en',
            autoClose: true,
            dateFormat: 'dd/mm/yyyy',
        });

        $('#date3').datepicker({
            language: 'en',
            autoClose: true,
            dateFormat: 'dd/mm/yyyy',
        });

        $('#date4').datepicker({
            language: 'en',
            autoClose: true,
            dateFormat: 'dd/mm/yyyy',
        });

        $('#date5').datepicker({
            language: 'en',
            autoClose: true,
            dateFormat: 'dd/mm/yyyy',
        });

        $('#date6').datepicker({
            language: 'en',
            autoClose: true,
            dateFormat: 'dd/mm/yyyy',
        });

        $('#date7').datepicker({
            language: 'en',
            autoClose: true,
            dateFormat: 'dd/mm/yyyy',
        });

        $('#date8').datepicker({
            language: 'en',
            autoClose: true,
            dateFormat: 'dd/mm/yyyy',
        });

    });


 

</script>

@endsection 