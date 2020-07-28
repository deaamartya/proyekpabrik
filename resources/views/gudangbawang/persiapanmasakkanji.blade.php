@section('title') 
Persiapan Masak Kanji
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
        <div class="col">
            <h2 class="page-title text-left pl-5">Persiapan Masak Kanji</h2>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-8">
            <h2 class="page-title text-left pl-5">Order Masak</h2>
        </div>
        <div class="col-4">
            <h2 class="page-title text-right pr-5">@php echo date("d F Y"); @endphp</h2>
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
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ordermasak as $or)
                                    <tr>
                                        <td>{{date_format($or->tanggal_order_masak,'Y-m-d')}}</td>
                                        <td>{{$or->jumlah}}</td>
                                        <td>
                                        <button type="button" class="btn 
                                        @if($or->status) btn-success
                                        @else btn-danger
                                        @endif
                                        status" 
                                        id="status{{$or->id_order_masak}}">
                                            @php
                                                if($or->status){
                                                    echo "Ready";
                                                }
                                                else{
                                                    echo "Belum";
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
@endsection 
@section('script')
<!-- Datatable js -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script>
    var ordermasak = <?php echo json_encode($ordermasak)?>;
    "use strict";
    $(document).ready(function() {
        /* -- Table - Datatable -- */
        $('#datatable').DataTable( {
            "searching" : false,
            "paging" : false,
            "info" : false,
            "order": [[ 0, "asc" ]],
            responsive: true
        });
        $(".status").click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/gudang-bawang/statusordermasak') }}",
                method: 'POST',
                data: {
                    id: $(this).attr('id').substr(6),
                },
                success: function(result){
                    let id = result.ordermasak.id_order_masak;
                    if(result.ordermasak.status){
                        $("#status"+id).removeClass('btn-danger');
                        $("#status"+id).addClass('btn-success');
                        $("#status"+id).html("Ready");
                    }
                    else{
                        $("#status"+id).removeClass('btn-success');
                        $("#status"+id).addClass('btn-danger');
                        $("#status"+id).html("Belum");
                    }
                    swal({
                        title: 'Berhasil!',
                        text: 'Data Berhasil Disimpan',
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
    });
</script>
@endsection 