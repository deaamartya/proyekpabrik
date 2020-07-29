@section('title') 
Penerimaan Bawang
@endsection 
@extends('gudangbawang.layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<style type="text/css">
    .redclass{
        border-color: red !important;
    }
    .form-control[readonly] {
        background-color: white !important; 
    }
</style>
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-8">
            <h2 class="page-title text-left pl-5">Penerimaan Bawang</h2>
        </div>
        <div class="col-4">
            <div class="widgetbar">
                <h5 class="page-subtitle text-left pl-5">@php echo date("d F Y"); @endphp</h5>
            </div>                        
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-6 pl-5">
              <label for="validationCustom01">Berat Bawang Kupas Diterima (Kg)</label>
              <input type="text" class="form-control" name="berat" id="berat" required readonly>
        </div>
        <div class="col-6 pt-2">
            <button type="button" class="btn btn-success mt-4 mr-4" id="simpan">Simpan Data</button>
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
                                    <th>Terima Bawang (Kg)</th>
                                    <th>Bawang Kupas (Kg)</th>
                                    <th>Kulit (Kg)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tenagakupas as $t)
                                <tr>
                                    <td id="nama{{$t->id_pegawai}}">{{$t->nama}}</td>
                                    <td id="tb{{$t->id_pegawai}}" >{{$t->jumlah}}</td>
                                    <td data-toggle="modal" data-target="#hasilKupas{{$t->id_pegawai}}" id="bk{{$t->id_pegawai}}" class="jmbawangkulit">0</td>
                                    <td id="kulit{{$t->id_pegawai}}" class="jmkulit">0</td>
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
@foreach($tenagakupas as $t)
<!-- Modal -->
<div class="modal fade" id="hasilKupas{{$t->id_pegawai}}" tabindex="-1" role="dialog" aria-labelledby="hasilKupasTitle{{$t->id_pegawai}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hasilKupasTitle{{$t->id_pegawai}}">Hasil Kupas {{$t->nama}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group mb-0">
                      <label for="validationCustom01">Berat Bawang Kupas (Kg)</label>
                      <input type="number" min="0" step="0.01" class="form-control bb-class" name="beratbawang[{{$t->id_pegawai}}]" id="beratbawang{{$t->id_pegawai}}" required>
                    </div>
                    <div class="form-group mb-0">
                      <label for="validationCustom01">Berat Kulit Bawang (Kg)</label>
                      <input type="number" min="0" step="0.01" class="form-control bk-class" name="beratkulit[{{$t->id_pegawai}}]" id="beratkulit{{$t->id_pegawai}}" required>
                    </div>
                    <p class="badge badge-danger mt-1" id="warning{{$t->id_pegawai}}">Jumlah berat bawang kupas dan kulit bawang melebihi berat bawang kulit.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary save" id="save{{$t->id_pegawai}}">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endforeach
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
            "order": [[ 1, "asc" ]],
            responsive: true
        });

        var pegawai = <?php echo json_encode($tenagakupas)?>;

        $(".badge").hide();

        $(".save").click(function(){
            let id = $(this).attr('id').substr(4);
            $("#bk"+id).html($("#beratbawang"+id).val());
            $("#kulit"+id).html($("#beratkulit"+id).val());
            if($("#beratbawang"+id).val() == ""){
                $("#bk"+id).html(0);
            }
            if($("#beratkulit"+id).val() == ""){
                $("#kulit"+id).html(0);
            }
            let jumlah = Number($("#tb"+id).html());
            let bk = Number($("#bk"+id).html());
            let kulit = Number($("#kulit"+id).html());
            if(jumlah < (bk+kulit)){
                $("#bk"+id).html(0);
                $("#kulit"+id).html(0);
                $("#warning"+id).show();
            }
            else{
                $("#warning"+id).hide();
                if(jumlah > (bk+kulit)){
                    $("#nama"+id).addClass("redclass");
                    $("#tb"+id).addClass("redclass");
                    $("#bk"+id).addClass("redclass");
                    $("#kulit"+id).addClass("redclass");
                }
                else{
                    $("#nama"+id).removeClass("redclass");
                    $("#tb"+id).removeClass("redclass");
                    $("#bk"+id).removeClass("redclass");
                    $("#kulit"+id).removeClass("redclass");

                }
                $("#hasilKupas"+id).modal('toggle');
                hitungBawang();
            }
        });

        function hitungBawang(){
            let jumlah = 0;

            $(".jmbawangkulit").each(function(){
                jumlah = jumlah + Number($(this).html());
            });

            $("#berat").val(jumlah);
        }

        $("#simpan").click(function(){
            let jsonberat = [];
            var data;

            let output = 0;
            for(let i=0;i<pegawai.length;i++){
                data = {
                    beratbawang: $("#beratbawang"+pegawai[i]["id_pegawai"]).val(),
                    beratkulit: $("#beratkulit"+pegawai[i]["id_pegawai"]).val(),
                    idtr: pegawai[i]["idtr"],
                    id_pegawai : pegawai[i]["id_pegawai"]
                }
                jsonberat.push(data);
                output = output + Number($("#tb"+pegawai[i]["id_pegawai"]).html());
            }

            let jsondata = JSON.stringify(jsonberat);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/gudang-bawang/simpanterima') }}",
                method: 'POST',
                data: {
                    data : jsondata,
                    total_output : $("#berat").val(),
                    total_input : output,
                },
                success: function(result){
                    $("#simpan").hide();
                    swal({
                        title: 'Berhasil!',
                        text: 'Data Berhasil Disimpan',
                        timer: 3000,
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