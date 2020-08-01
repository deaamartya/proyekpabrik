@section('title') 
Kerja Hari Sebelumnya
@endsection 
@extends('managerproduksi.layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<!-- sweet alert  -->
<link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>

<!-- Datedropper css 
<link href="{{ asset('managerproduksi/css/datedropper.css') }}" rel="stylesheet" type="text/css" />
-->

<!-- Datepicker css -->
<link href="{{ asset('assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">

<style type="text/css">
    .border-blue{
        border: blue 1px solid !important;
    }
</style>
@endsection 
@section('rightbar-content')

<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Data Kerja Harian Gudang Kacang</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Data Produksi</a></li>
                    <li class="breadcrumb-item"><a href="#">Gudang Kacang</a></li>
                    <li class="breadcrumb-item"><a href="#">Kerja Harian</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data Kerja Harian Gudang Kacang</li>
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
                                                                    
                                        <input type="text" id="autoclose-date" class="datepicker-here form-control" placeholder="dd/mm/yyyy" aria-describedby="basic-addon1" value="" />  

                                    </div>
                               
                            </div>

                            <div class="form-group col-md-4">
                                    <label for=""></label>
                                    <div class="input-group mt-2"> 
                                        <button id="terapkan_date" class="btn btn-primary">Terapkan</button>
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
                                        <input type="text" id="jumlah_grup" value="Jumlah Grup : 1" class="form-control" aria-describedby="basic-addon2" readonly style="background-color:#a1b5ec; color: white; border:none; text-align: center;" />   
                                    </div>
                               
                            </div>

                            <div class="form-group col-md-4">
                                    <div class="input-group" style="width: 58%"> 
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2" style="background-color:  #8ca5e8 ; color: white; border: none; "><i class="feather icon-users" ></i></span>
                                          </div>                             
                                        <input type="text" id="jumlah_pekerja" value="Jumlah Pekerja : " class="form-control" aria-describedby="basic-addon2" readonly style="background-color:#a1b5ec; color: white; border:none; text-align: center;" />   
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
                                <!--
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
                            -->
                               

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
                                <!--
                                <tr >
                                    <td>Kg</td>
                                    <td>4</td>
                                    <td>6</td>
                                    <td>6</td>
                                    <td>-</td>
                                </tr>
                            -->
                               

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

        var datatable1 = $('#datatable1').DataTable( {
            //"order": [[ 0, "asc" ]],
            "paging" : false,
            "info" : false,
            "searching" : false,
            responsive: true
        });

        var datatable2 = $('#datatable2').DataTable( {
            "order": [[ 0, "desc" ]],
            "paging" : false,
            "info" : false,
            "searching" : false,
            responsive: true,
            createdRow: function(row, data, dataIndex){
                 if(data[0] === 'BS (Kg)'){
                    $('td:eq(1)', row).attr('colspan', 4);
                    $('td:eq(1)', row).attr('align', 'center');

                    $('td:eq(2)', row).css('display', 'none');
                    $('td:eq(3)', row).css('display', 'none');
                    $('td:eq(4)', row).css('display', 'none');

                    $('td', row).eq(1).addClass('border-blue');
                    

                   
                }

                
            }
        });

        var datatable3 = $('#datatable3').DataTable( {
            //"order": [[ 0, "asc" ]],
            "paging" : false,
            "info" : false,
            "searching" : false,
            responsive: true
        });




    $(document).on('click', '#terapkan_date', function (e) {
    
    var tgl = document.getElementById('autoclose-date').value;
    var date = tgl.split("/").reverse().join("-");

    if(tgl == ""){

        swal({
            title: 'Terjadi Kesalahan.',
            text: "Tanggal belum dipilih. Silahkan pilih tanggal terlebih dahulu.",
            showConfirmButton: true,
            type: 'error',
        });

    }else{

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
            type:"POST",
            url:"/manpro-kacang/kerjaharian/cari_tgl",
            data:{
              "date":date,
              "_token": "{{ csrf_token() }}",//harus ada ini jika menggunakan metode POST
            },
            success : function(results) {
             //console.log(JSON.stringify(results)); //print_r
             //console.log(results);

                if(results.error){

                    swal({
                        title: 'Terjadi Kesalahan.',
                        text: "Data kerja harian pada tanggal tersebut belum tersedia.",
                        showConfirmButton: true,
                        type: 'error',
                    });

                   

                
                 }else{
                    var jml_pekerja = results.grupkerja[0].jumlah_personil;
                    var a = "Jumlah Pekerja";
                    var pekerja = a.concat(" : ",jml_pekerja)
                    $('#jumlah_pekerja').value(pekerja);
                   

                    
                     
                    while(datatable1.data().count())
                    {
                        datatable1.row().remove().draw();
                    }

                    while(datatable2.data().count())
                    {
                        datatable2.row().remove().draw();
                    }

                    while(datatable3.data().count())
                    {
                        datatable3.row().remove().draw();
                    }
                  
                  

                         datatable1.row.add([

                    "Kg",
                    results.stockob[0].keluar,
                    results.stockhc[0].keluar,
                    results.stock8ml[0].keluar
                       
                    ]).draw();

                    datatable2.row.add([

                    "BS (Kg)",
                    results.kacangbs[0].berat_bs,
                    "",
                    "",
                    ""

                    ]).draw();
       
                    datatable2.row.add([

                    "Total (Kg)",
                    results.hasilgs[0].masuk,
                    results.hasilsp[0].masuk,
                    results.hasilhc[0].masuk,
                    results.hasiltelor[0].masuk
                    
                    ]).draw();

                    datatable3.row.add([

                    "Kg",
                    results.sortirgs[0].keluar,
                    results.sortirsp[0].keluar,
                    results.sortirhc[0].keluar,
                    results.sortirtelor[0].keluar
                    
                    ]).draw();

                 }    
                
                 
  
    
             
            },
            error: function(data) {
                console.log(data);

                 

            }
      });

    }  

    });

});

 
   


    


</script>

@endsection 