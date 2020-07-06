@section('title') 
Soyuz - Datatable
@endsection 
@extends('gudangbawang.layouts.main')
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
        <div class="col-8">
            <h4 class="page-title text-left pl-5">Pembagian Bawang</h4>
        </div>
        <div class="col-4">
            <h4 class="page-title text-right pr-5">10 Juni 2020</h4>           
        </div>
    </div>
    <div class="row align-items-between">
        <div class="col">
            <div class="widgetbar">
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal">Tambah</button>
            </div>                        
        </div>
        <div class="col">
            <div class="widgetbar">
                <button id="hapus" class="btn btn-danger btn-lg">Hapus</button>
            </div>                        
        </div>
        <div class="col">
            <div class="widgetbar">
                <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#saveModal">Simpan Data</button>
            </div>                        
        </div>  
    </div>
    <div class="row align-items-center px-5 py-3">
        <div class="col">
            <div class="widgetbar">
                <form>
                    <div class="form-row align-items-center">
                        <div class="form-group col-sm-6">
                            <label for="orderbesok" class="text-left">Order Besok</label>
                            <input type="text" class="form-control" name="orderbesok" id="orderbesok" placeholder="100">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="stockbebas">Stock Bebas</label>
                            <input type="text" class="form-control" name="stockbebas" id="stockbebas" placeholder="10">
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="form-group col-sm-4">
                            <label for="ratasusut">Rata2 Susut</label>
                            <input type="text" class="form-control" name="ratasusut" id="ratasusut" placeholder="5.3%">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="targetkupas">Target Kupas (Kg)</label>
                            <input type="text" class="form-control" name="targetkupas" id="targetkupas" placeholder="74">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="proseshariini">Proses Hari Ini</label>
                            <input type="text" class="form-control" name="proseshariini" id="proseshariini" placeholder="77" data-toggle="modal" data-target="#ubahModal">
                        </div>
                    </div>
                </form>
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
                    <div class="table-responsive">
                        <table id="datatable" class="display table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Terima (Kg)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="row1">
                                    <td data-toggle="modal" data-target="#ubahTerimaModal1">Tiger Nixon</td>
                                    <td class="terimakg" id="terima1">12</td>
                                    <td>
                                    <button type="button" class="delbtn btn btn-round btn-danger" id="del1"><i class="feather icon-trash-2"></i></button></td>
                                </tr>
                                <tr id="row2">
                                    <td>Garrett Winters</td>
                                    <td class="terimakg" id="terima2">12</td>
                                    <td>
                                    <button type="button" class="delbtn btn btn-round btn-danger" id="del2"><i class="feather icon-trash-2"></i></button></td>
                                </tr>
                                <tr id="row3">
                                    <td>Ashton Cox</td>
                                    <td class="terimakg" id="terima3">12</td>
                                    <td>
                                    <button type="button" class="delbtn btn btn-round btn-danger" id="del3"><i class="feather icon-trash-2"></i></button></td>
                                </tr>
                                <tr id="row4">
                                    <td>Cedric Kelly</td>
                                    <td class="terimakg" id="terima4">12</td>
                                    <td>
                                    <button type="button" class="delbtn btn  btn-round btn-danger" id="del4"><i class="feather icon-trash-2"></i></button></td>
                                </tr>
                                <tr id="row5">
                                    <td>Airi Satou</td>
                                    <td class="terimakg" id="terima5">12</td>
                                    <td>
                                    <button type="button" class="delbtn btn  btn-round btn-danger" id="del5"><i class="feather icon-trash-2"></i></button></td>
                                </tr>
                                <tr id="row6">
                                    <td>Brielle Williamson</td>
                                    <td class="terimakg" id="terima6">12</td>
                                    <td>
                                    <button type="button" class="delbtn btn  btn-round btn-danger" id="del6"><i class="feather icon-trash-2"></i></button></td>
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
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalTitle">Tambah Penerima</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('/gudang-bawang/pembagian-bawang')}}">
                <div class="modal-body">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="penerima1">
                        <label class="custom-control-label" for="penerima1">Suyati</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="modalUbahJumlah" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
                <div class="modal-body">
                    <h2 class="page-title text-center" id="modalUbahJumlah">Ubah Jumlah Proses</h2>
                    <div class="form-group mb-0">
                      <label for="berat">Berat (Kg)</label>
                      <input type="text" class="form-control" name="berat" id="berat" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btnubahJumlah" type="button" class="btn btn-primary mx-auto">Simpan</button>
                </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ubahTerimaModal1" tabindex="-1" role="dialog" aria-labelledby="modalUbahTerima" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h2 class="page-title text-center" id="modalUbahTerima">Ubah Penerimaan Tiger</h2>
                <div class="form-group mb-0">
                  <label for="validationCustom01">Berat (Kg)</label>
                  <input type="text" class="form-control" id="berat1" required>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btnubahTerima1" type="button" class="btn btn-primary ubahTerima mx-auto">Simpan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="saveModal" tabindex="-1" role="dialog" aria-labelledby="saveModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title text-black text-center my-5" id="saveModalTitle">Data Berhasil Disimpan</h5>
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                <!-- kurang button ditengah -->
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@endsection 
@section('script')
<!-- Datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    "use strict";
    $(document).ready(function() {
        /* -- Table - Datatable -- */
        var table = $('#datatable').DataTable( {
            "searching" : false,
            "paging" : false,
            "info" : false,
            "order": [[ 0, "asc" ]],
            responsive: true,
            "columnDefs": [
                { "visible": false, "targets": 2, "orderable":false , "width": "5%"},
                { "targets": 0 , "width": "50%" },
                { "targets": 1 , "width": "45%" }
            ]
        });
        
        function hitungProsesHariIni(){
            var total = 0;
            $(".terimakg").each(function(){
                total+= Number($(this).html());
            });
            updateProsesHariIni(total);
        }

        function updateProsesHariIni(total){
            $("#proseshariini").val(total);
            $("#berat").val($("#proseshariini").val());
        }
        
        $("#btnubahJumlah").click(function(e){
            $("#ubahModal").modal('toggle');
            $("#proseshariini").val($("#berat").val());
            var jumlah = $(".terimakg").length;
            let kg = Number($("#berat").val()/jumlah);
            $(".terimakg").each(function(){
                $(this).html(kg);
            });
        });

        $(".ubahTerima").each(function(){
            $(this).click(function(){
                let id = $(this).attr('id').substr(13);
                console.log(id);
                $("#ubahTerimaModal"+id).modal('toggle');
                let berat = $("#berat"+id).val();
                $("#terima"+id).html(berat);
                hitungProsesHariIni();
            });
        });

        $("#hapus").click(function(){
            var column = table.column(2);
            column.visible( ! column.visible() );
            $(this).html("Tutup Proses");
        });

        console.log("hellowww");

        $(".delbtn").each(function(){
            console.log("hellow");
            $(this).click(function(){
                let id = $(this).attr('id').substr(3);
                console.log(id);
                $("#row"+id).hide();
            });
        });
        $("#del1").click(function(){
            console.log("heeeeeee")
        })
    });
</script>
@endsection 