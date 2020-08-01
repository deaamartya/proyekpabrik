@section('title') 
Tenaga Kupas
@endsection 
@extends('gudangbawang.layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus-circle mr-2"></i>Tambah</button>
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
                                @foreach($tenagakupas as $t)
                                <tr>
                                    <td>{{$t->nama}}</td>
                                    <td>
                                        <button type="button" class="btn 
                                        @if($t->status) btn-success
                                        @else btn-danger
                                        @endif
                                        status" 
                                        id="status{{$t->id_pegawai}}">
                                            @php
                                                if($t->status){
                                                    echo "Aktif";
                                                }
                                                else{
                                                    echo "Tidak Aktif";
                                                }
                                            @endphp
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
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
<script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script>
    "use strict";
    $(document).ready(function() {
        /* -- Table - Datatable -- */
        $('#datatable').DataTable({
            "searching" : false,
            "paging" : false,
            "info" : false,
            "order": [[1, "desc"]],
            responsive: true
        });
        $("#tambahTenagaKupas").click(function(e){
            console.log("tambah di klik");
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/gudang-bawang/tambahtenagakupas') }}",
                method: 'POST',
                data: {
                    nama: $('#nama').val(),
                    status: 1
                },
                success: function(result){
                    console.log(result.pegawai);
                    var add ='<tr>\
                        <td>'+result.pegawai.nama+'</td>\
                        <td><button type="button" class="btn btn-success status" id="status'+result.pegawai.id_pegawai+'">Aktif</button></td>\
                        </tr>';
                    $("#datatable tbody").prepend(add);
                    $("#addModal").modal('toggle');
                    $("#addTenagaKupas").trigger('reset');
                    swal({
                        title: 'Berhasil!',
                        text: 'Pegawai berhasil ditambahkan',
                        timer: 2000,
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

        });
        $(document).on("click",".status", function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/gudang-bawang/statustenagakupas') }}",
                method: 'POST',
                data: {
                    id: $(this).attr('id').substr(6)
                },
                success: function(result){
                    if(result.pegawai.status != status){
                        if(result.pegawai.status){
                            $("#status"+result.pegawai.id_pegawai).removeClass('btn-danger');
                            $("#status"+result.pegawai.id_pegawai).addClass('btn-success');
                            $("#status"+result.pegawai.id_pegawai).html("Aktif");
                        }
                        else{
                            $("#status"+result.pegawai.id_pegawai).removeClass('btn-success');
                            $("#status"+result.pegawai.id_pegawai).addClass('btn-danger');
                            $("#status"+result.pegawai.id_pegawai).html("Tidak Aktif");
                        }
                        swal({
                            title: 'Berhasil!',
                            text: 'Data berhasil diubah',
                            timer: 2000,
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
                }
            });
        });
    });
</script>
@endsection 