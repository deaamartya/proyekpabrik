@section('title') 
Kerja Hari Sebelumnya
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
            <h4 class="page-title">Data Kerja Hari Sebelumnya</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Kerja Harian</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/hari_sebelumnya')}}">Sebelumnya</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Kerja Hari Sebelumnya</li>
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

                <div class="card-body">
                    <!--
                    <div class="row" style="padding-left: 1em;">
                        <p for="date-picker">Pilih Tanggal : <input type="text" id="date-picker" data-format="d/m/Y" data-dd-theme="vanilla" data-large-mode="true"> </p>

                        <button class="btn btn-primary">Terapkan</button>
                    </div>
                    -->
                    <div class="form-row" style="margin-left: auto; margin-right: auto;">
                             <div class="form-group col-md-4">
                                    <label for="date1">Pilih Tanggal</label>
                                    <div class="input-group" style="width: 90%"> 
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon1"><i class="feather icon-calendar"></i></span>
                                          </div>                             
                                        <input type="text" id="date" class="datepicker-here form-control" placeholder="dd/mm/yyyy" aria-describedby="basic-addon1"/>   
                                    </div>
                               
                            </div>

                            <div class="form-group col-md-4">
                                    <label for=""></label>
                                    <div class="input-group mt-2"> 
                                        <button class="btn btn-primary" id="terapkan">Terapkan</button>
                                    </div>
                            </div>

                           
                    </div>
                    <br>

                     <div class="form-row" style="margin-left: auto; margin-right: auto;">
                             <div class="form-group col-md-4">
                                   <div class="input-group" style="width: 58%"> 
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2" style="background-color:  #8ca5e8 ; color: white; border: none; "><i class="feather icon-users" ></i></span>
                                          </div>                             
                                        <input type="text" id="jumlah_grup" value="Jumlah Grup : 2" class="form-control" aria-describedby="basic-addon2" readonly style="background-color:#a1b5ec; color: white; border:none; text-align: center;" />   
                                    </div>
                               
                            </div>

                            <div class="form-group col-md-4">
                                    <div class="input-group" style="width: 58%"> 
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2" style="background-color:  #8ca5e8 ; color: white; border: none; "><i class="feather icon-users" ></i></span>
                                          </div>                             
                                        <input type="text" id="jumlah_grup" value="Jumlah Pekerja : 12" class="form-control" aria-describedby="basic-addon2" readonly style="background-color:#a1b5ec; color: white; border:none; text-align: center;" />   
                                    </div>
                            </div>

                           
                    </div>

                    <br><br>

                    <h5 class="card-title" style="font-size: 16px; padding-left: 5px;">Proses Sortir</h5>
                    <div class="table-responsive">
                        <table id="datatable1" class="display table table-bordered table-striped table-manpro-hover datatable" width="80%" >
                            <thead>
                                    <tr>
                                        <th>Penerimaan</th>
                                        <th>OB</th>
                                        <th>HC</th>
                                        <th>8ML</th>
                                    </tr>
                          
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Karung</td>
                                    <td>10</td>
                                    <td>7</td>
                                    <td>0</td>
                                </tr>
                               

                            </tbody>
                        </table>
                    </div>

                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable2" class="display table table-bordered table-striped table-manpro-hover datatable" width="80%" >
                           <thead>
                                     <tr>
                                        <th>Hasil</th>
                                        <th>GS</th>
                                        <th>SP</th>
                                        <th>HC</th>
                                        <th>Telor</th>
                                    </tr>
                          
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Karung Full</td>
                                    <td>4</td>
                                    <td>6</td>
                                    <td>6</td>
                                    <td>-</td>
                                </tr>

                                <tr>
                                    <td>Tidak Full (Kg)</td>
                                    <td>15</td>
                                    <td>8</td>
                                    <td>13</td>
                                    <td>-</td>
                                </tr>

                                <tr>
                                    <td>Total (Kg)</td>
                                    <td>215</td>
                                    <td>308</td>
                                    <td>313</td>
                                    <td>-</td>
                                </tr>

                                <tr>
                                    <td>BS (Kg)</td>
                                    <td colspan="4" style="border: 2px solid #4682B4;">5</td>
                                    <td style="display: none"></td>
                                    <td style="display: none"></td>
                                    <td style="display: none"></td>
                                </tr>
                               

                            </tbody>
                        </table>
                    </div>

                    <br><br>

                    <h5 class="card-title" style="font-size: 16px; padding-left: 5px;">Pengambilan Inter</h5>
                    <div class="table-responsive">
                        <table id="datatable3" class="display table table-bordered table-striped table-manpro-hover datatable" width="80%" >
                           <thead>
                                     <tr>
                                        <th>Inter</th>
                                        <th>GS</th>
                                        <th>SP</th>
                                        <th>HC</th>
                                        <th>Telor</th>
                                    </tr>
                          
                            </thead>
                            <tbody>
                                <tr >
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
        </div>
        <!-- End col -->
        </div>
    <!-- End row -->
</div>
<!-- End Contentbar -->
@endsection 
@section('script')

<!-- Datadropper js 
<script src="{{ asset('managerproduksi/js/datedropper.js') }}"></script>
-->

<!-- Datepicker JS -->
<script src="{{ asset('assets/plugins/datepicker/datepicker.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datepicker/i18n/datepicker.en.js') }}"></script>
<script src="{{ asset('assets/js/custom/custom-form-datepicker.js') }}"></script>

<!-- Datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#datatable1').DataTable( {
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });

         $('#datatable2').DataTable( {
            "order": [[ 0, "desc" ]],
            "searching" : false,
            responsive: true
        });

         $('#datatable3').DataTable( {
            //"order": [[ 0, "asc" ]],
            "searching" : false,
            responsive: true
        });

    });

    $(document).on('click', '#terapkan', function (e) {
    
    var tanggal = document.getElementById('date').value;
    var tgl = tanggal.split("/").reverse().join("-");

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
            type:"POST",
            url:"/gudangKacang/KerjaHarianSebelumnya",
            data:{
              "tgl_kerja":tgl,

              "_token": "{{ csrf_token() }}",//harus ada ini jika menggunakan metode POST
            },
            success : function(results) {
            // console.log(JSON.stringify(results)); //print_r
                 
              
              for(var i=0; i<results.stock_.length; i++){
                    
                    datatable.row.add([

                    results.stock[i].tanggal,
                    results.stock[i].keterangan,
                    results.stock[i].masuk,
                    results.stock[i].keluar,
                    results.stock.stock
                       
                    ]).draw();
                 
                }
                 
  
    
             
            },
            error: function(data) {
                console.log(data);
            }
      });

    });


 
   


    


</script>

@endsection 