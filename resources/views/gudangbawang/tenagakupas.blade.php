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
            <h2 class="page-title text-left pl-5">Tenaga Kupas</h2>
        </div>
        <div class="col-4">
            <div class="widgetbar">
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah</button>
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
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td><button type="button" class="btn btn-success status" id="status1">Aktif</button></td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td><button type="button" class="btn btn-danger">Tidak Aktif</button></td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td><button type="button" class="btn btn-success">Aktif</button></td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td><button type="button" class="btn btn-success">Aktif</button></td>
                                </tr>
                                <tr>
                                    <td>Airi Satou</td>
                                    <td><button type="button" class="btn btn-success">Aktif</button></td>
                                </tr>
                                <tr>
                                    <td>Brielle Williamson</td>
                                    <td><button type="button" class="btn btn-success">Aktif</button></td>
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="addTenagaKupas">
                <div class="modal-body">
                    <h2 class="page-title text-center">Tambah Tenaga Kupas</h2>
                    <div class="form-row">
                        <div class="col">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="tambahTenagaKupas" type="submit" class="btn btn-primary mx-auto">Simpan</button>
                </div>
            </form>
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
        $('#datatable').DataTable( {
            "searching" : false,
            "paging" : false,
            "info" : false,
            "order": [[ 1, "asc" ]],
            responsive: true
        });
        $("#tambahTenagaKupas").click(function(e){
            console.log("tambah di klik");
            e.preventDefault();
            $.ajax({
                url: "{{ url('/gudang-bawang/tambahtenagakupas') }}",
                method: 'POST',
                data: {
                    nama: $('#nama').val(),
                    status: 1
                },
                success: function(result){
                    var add ='<tr>\
                        <td>'+$('#nama').val()+'</td>\
                        <td><button type="button" class="btn btn-success">Aktif</button></td>\
                        </tr>';
                    $("#datatable tbody").append(add);
                }
            });
        });
        $(".status").click(function(e){
            e.preventDefault();
            console.log("status di klik");
            var status = 0;
            if($(this).html() == "Belum"){
               status = 1;
            }
            $.ajax({
                url: "{{ url('/gudang-bawang/statustenagakupas') }}",
                method: 'POST',
                data: {
                    id: $(this).attr('id').substr(6),
                    status: status
                },
                success: function(result){
                    if(status == 1){
                        $(this).removeClass('btn-danger');
                        $(this).addClass('btn-success');
                        $(this).html("Ready");
                    }
                    else{
                        $(this).removeClass('btn-success');
                        $(this).addClass('btn-danger');
                        $(this).html("Belum");
                    }
                }
            });
        });
    });
</script>
@endsection 