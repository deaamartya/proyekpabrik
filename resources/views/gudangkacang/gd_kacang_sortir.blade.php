@section('title') 
Stock
@endsection 
@extends('gudangkacang.layouts.main')
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
            <h4 class="page-title">Gudang Kacang Sortir</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Stock</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Gudang Kacang Sortir</li>
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
                                <div class="form-group col-md-12">
                                    <div class="button-list">
                                        <a href="{{url('/stock_gudang_kacang_sortir_penerimaan_gs')}}"><button type="button" class="btn btn-warning btn-lg btn-block">Penerimaan</button></a>
                                    </div>
                                </div>
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
                                                <button class="btn btn-primary" id="filterGS">Terapkan</button>
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
                                        <tbody>
                                            @foreach($gs as $stock)
                                                <tr>
                                                    <td>{{$stock->timestamp}}</td>
                                                    <td>{{$stock->keterangan}}</td>
                                                    <td>{{$stock->masuk}}</td>
                                                    <td>{{$stock->keluar}}</td>
                                                    <td>{{$stock->stock}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="pills-profile-button" role="tabpanel" aria-labelledby="pills-profile-tab-button">
                           <div class="card-header">
                                <h5 class="card-title" style=" padding-left: 5px;">Kacang SP</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group col-md-12">
                                    <div class="button-list">
                                        <a href="{{url('/stock_gudang_kacang_sortir_penerimaan_sp')}}"><button type="button" class="btn btn-warning btn-lg btn-block">Penerimaan</button></a>
                                    </div>
                                </div>
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
                                                <button class="btn btn-primary" id="filterSP">Terapkan</button>
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
                                        <tbody>
                                            @foreach($sp as $stock)
                                                <tr>
                                                    <td>{{$stock->timestamp}}</td>
                                                    <td>{{$stock->keterangan}}</td>
                                                    <td>{{$stock->masuk}}</td>
                                                    <td>{{$stock->keluar}}</td>
                                                    <td>{{$stock->stock}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-contact-button" role="tabpanel" aria-labelledby="pills-contact-tab-button">
                            <div class="card-header">
                                <h5 class="card-title" style="padding-left: 5px;">Kacang HC</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group col-md-12">
                                    <div class="button-list">
                                        <a href="{{url('/stock_gudang_kacang_sortir_penerimaan_hc')}}"><button type="button" class="btn btn-warning btn-lg btn-block">Penerimaan</button></a>
                                    </div>
                                </div>
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
                                                <button class="btn btn-primary" id="filterHC">Terapkan</button>
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
                                        <tbody>
                                            @foreach($hc as $stock)
                                                <tr>
                                                    <td>{{$stock->timestamp}}</td>
                                                    <td>{{$stock->keterangan}}</td>
                                                    <td>{{$stock->masuk}}</td>
                                                    <td>{{$stock->keluar}}</td>
                                                    <td>{{$stock->stock}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-settings-button" role="tabpanel" aria-labelledby="pills-settings-tab-button">
                            <div class="card-header">
                                <h5 class="card-title" style="padding-left: 5px;">Kacang Telor</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group col-md-12">
                                    <div class="button-list">
                                        <a href="{{url('/stock_gudang_kacang_sortir_penerimaan_telor')}}"><button type="button" class="btn btn-warning btn-lg btn-block">Penerimaan</button></a>
                                    </div>
                                </div>
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
                                                <button class="btn btn-primary" id="filterTelor">Terapkan</button>
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
                                        <tbody>
                                            @foreach($telor as $stock)
                                                <tr>
                                                    <td>{{$stock->timestamp}}</td>
                                                    <td>{{$stock->keterangan}}</td>
                                                    <td>{{$stock->masuk}}</td>
                                                    <td>{{$stock->keluar}}</td>
                                                    <td>{{$stock->stock}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
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
    $(document).ready(function(){
        var table1 = $('#datatable1').DataTable({
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });

        var table2 = $('#datatable2').DataTable({
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });

        var table3 = $('#datatable3').DataTable({
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });

        var table4 = $('#datatable4').DataTable({
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });

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

        $("#filterHC").click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/gudang-kacang/filterDate') }}",
                method: 'POST',
                data: {
                    jenis : "HC",
                    dateMin : $("#date1").val(),
                    dateMax : $("#date2").val(),
                },
                success: function(result){
                    table1.clear();
                    let stockHC = result.stock;
                    for(var i=0;i<stockHC.length;i++){
                        table1.row.add([
                            stockHC[i].timestamp,
                            stockHC[i].TIMESTAMP,
                            stockHC[i].keterangan,
                            stockHC[i].masuk,
                            stockHC[i].keluar,
                            stockHC[i].stock,
                        ]);
                        table1.draw(false);
                    }
                    console.log("button di klik");
                }
            });
        });

        $("#filterGS").click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/gudang-kacang/filterDate') }}",
                method: 'POST',
                data: {
                    jenis : "GS",
                    dateMin : $("#date3").val(),
                    dateMax : $("#date4").val(),
                },
                success: function(result){
                    table2.clear();
                    let stockGS = result.stock;
                    for(var i=0;i<stockGS.length;i++){
                        table2.row.add([
                            stockGS[i].timestamp,
                            stockGS[i].TIMESTAMP,
                            stockGS[i].keterangan,
                            stockGS[i].masuk,
                            stockGS[i].keluar,
                            stockGS[i].stock,
                        ]);
                        table2.draw(false);
                    }
                    console.log("button di klik");
                }
            });
        });

        $("#filterSP").click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/gudang-kacang/filterDate') }}",
                method: 'POST',
                data: {
                    jenis : "SP",
                    dateMin : $("#date5").val(),
                    dateMax : $("#date6").val(),
                },
                success: function(result){
                    table3.clear();
                    let stockSP = result.stock;
                    for(var i=0;i<stockSP.length;i++){
                        table3.row.add([
                            stockSP[i].timestamp,
                            stockSP[i].TIMESTAMP,
                            stockSP[i].keterangan,
                            stockSP[i].masuk,
                            stockSP[i].keluar,
                            stockSP[i].stock,
                        ]);
                        table3.draw(false);
                    }
                    console.log("button di klik");
                }
            });
        });

        $("#filterTelor").click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/gudang-kacang/filterDate') }}",
                method: 'POST',
                data: {
                    jenis : "Telor",
                    dateMin : $("#date7").val(),
                    dateMax : $("#date8").val(),
                },
                success: function(result){
                    table4.clear();
                    let stockTelor = result.stock;
                    for(var i=0;i<stockTelor.length;i++){
                        table4.row.add([
                            stockTelor[i].timestamp,
                            stockTelor[i].TIMESTAMP,
                            stockTelor[i].keterangan,
                            stockTelor[i].masuk,
                            stockTelor[i].keluar,
                            stockTelor[i].stock,
                        ]);
                        table4.draw(false);
                    }
                    console.log("button di klik");
                }
            });
        });

    });
</script>

@endsection 