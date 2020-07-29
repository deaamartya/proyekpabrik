@section('title') 
Pembagian Bawang
@endsection 
@extends('gudangbawang.layouts.main')
@section('style')
<!-- DataTables css -->
<link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<style>
    .hide{
        display: none !important;
    }
    .form-control[readonly] {
        background-color: white !important; 
    }
</style>
<link href="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection 
@section('rightbar-content')
@if(session('kupasbawang'))
    <script>
      swal({
            title: 'Error!',
            text: "{{ @session('kupasbawang')}}",
            showConfirmButton: true,
            type: 'error',
        });
    </script>
@endif
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div class="row align-items-center mb-5">
        <div class="col-8">
            <h4 class="page-title text-left pl-5">Pembagian Bawang</h4>
        </div>
        <div class="col-4">
            <h4 class="page-title text-right pr-5">@php echo date("d F Y"); @endphp</h4>           
        </div>
    </div>
    <div class="row align-items-between">
        @if(!$cek)
        <div class="col">
            <div class="widgetbar">
                <button class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#addModal">Tambah</button>
            </div>                        
        </div>
        <div class="col">
            <div class="widgetbar">
                <button id="hapus" class="btn btn-danger btn-lg btn-block">Hapus</button>
            </div>                        
        </div>
        <div class="col">
            <div class="widgetbar">
                <button class="btn btn-success btn-lg btn-block" id="btn-simpan">Simpan Data</button>
            </div>                        
        </div>
        @endif
    </div>
    <div class="row align-items-center px-5 py-3">
        <div class="col">
            <div class="widgetbar">
                <form>
                    <div class="form-row align-items-center">
                        <div class="form-group col-sm-6">
                            <label for="orderbesok" class="text-left">Order Besok</label>
                            <input type="text" class="form-control" readonly name="orderbesok" id="orderbesok" placeholder="100" value="{{$orderbesok->jumlah}}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="stockbebas">Stock Bebas</label>
                            <input type="text" class="form-control" name="stockbebas" id="stockbebas" placeholder="10" value="{{$stockbebas}}" readonly>
                        </div>
                    </div>
                    <div class="form-row align-items-center">
                        <div class="form-group col-sm-4">
                            <label for="ratasusut">Rata2 Susut</label>
                            <input type="text" class="form-control disable" name="ratasusut" id="ratasusut" value="{{$ratasusut}}%" readonly>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="targetkupas">Target Kupas (Kg)</label>
                            <input type="text" class="form-control disable" name="targetkupas" id="targetkupas" value="{{$targetkupas->jumlah}}" readonly>
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
                                @foreach($tenagakupas as $t)
                                    @if($t->status)
                                    <tr id="row{{$t->id_pegawai}}">
                                        <td data-toggle="modal" data-target="#ubahTerimaModal{{$t->id_pegawai}}">{{$t->nama}}</td>
                                        <td class="terimakg" id="terima{{$t->id_pegawai}}">0</td>
                                        <td>
                                        <button type="button" class="delbtn btn btn-round btn-danger" id="del{{$t->id_pegawai}}"><i class="feather icon-trash-2"></i></button></td>
                                    </tr>
                                    @endif
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
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
                <div class="modal-body">
                    <h2 class="page-title text-center" id="addModalTitle">Tambah Penerima</h2>
                    <div class="custom-control custom-checkbox" id="pegawai">
                        @foreach($tenagakupas as $t)
                            <div class="row m-3 @if($t->status) hide @endif" id="check{{$t->id_pegawai}}">
                                <div class="col text-center">
                                    <input type="checkbox" class="custom-control-input" id="penerima{{$t->id_pegawai}}" value="{{$t->nama}}">
                                    <label class="custom-control-label" for="penerima{{$t->id_pegawai}}">{{$t->nama}}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="tambahPenerima" class="btn btn-primary mx-auto">Simpan</button>
                </div>
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
@foreach($tenagakupas as $t)
        <div class="modal fade" id="ubahTerimaModal{{$t->id_pegawai}}" tabindex="-1" role="dialog" aria-labelledby="modalUbahTerima" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h2 class="page-title text-center">Ubah Penerimaan {{$t->nama}}</h2>
                        <div class="form-group mb-0">
                          <label for="validationCustom01">Berat (Kg)</label>
                          <input type="text" class="form-control" id="berat{{$t->id_pegawai}}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="btnubahTerima{{$t->id_pegawai}}" type="button" class="btn btn-primary ubahTerima mx-auto">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
@endforeach
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
<script src="{{ asset('assets/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function() {
    "use strict";
    var table = $('#datatable').DataTable({
        "searching" : false,
        "paging" : false,
        "info" : false,
        "order": [[ 0, "asc" ]],
        responsive: true,
        "columnDefs": [
            { "visible": true, "targets": 2, "orderable":false , "width": "5%"},
            { "targets": 0 , "width": "50%" },
            { "targets": 1 , "width": "45%" }
        ]
    });
    
    var deleted = [];

    //ubah var tenaga kupas jadi json
    var pegawai = <?php echo json_encode($tenagakupas); ?>;

    //mencari indeks data di var pegawai dengan parameter id pegawai
    function cariPegawai(id){
        var i = 0;
        while(pegawai[i]["id_pegawai"] != id){
            i++;
        }
        return i;
    }

    //menghitung total terima dari tabel
    function hitungProsesHariIni(){
        var total = 0;
        $(".terimakg").each(function(){
            total+= Number($(this).html());
        });
        $(".terimacustom").each(function(){
            total+= Number($(this).html());
        });
        updateProsesHariIni(total);
    };

    function updateProsesHariIni(total){
        $("#proseshariini").val(total);
        $("#berat").val($("#proseshariini").val());
    };

    //membagi (total proses hari ini-terima custom) dibagi dengan jumlah tenaga kupas
    function hitungTotalProsesHariIni(){
        $("#proseshariini").val($("#berat").val());
        var jumlah = $(".terimakg").length;
        var minus = 0;
        $(".terimacustom").each(function(){
            minus+=Number($(this).html());
        });
        let kg = Number(($("#berat").val()-minus)/jumlah);
        $(".terimakg").each(function(){
            $(this).html(kg);
        });
    }
    //function inisiasi tombol delete
    $(document).on("click",".delbtn", function () {
        //remove dari table
        table
            .row($(this).parents('tr'))
            .remove()
            .draw();
        console.log("remove dari table");
            //menghitung ulang terima(kg) per orang
        hitungProsesHariIni();

        let id = $(this).attr('id').substr(3);
        let nama = pegawai[cariPegawai(id)]["nama"];

        deleted[deleted.length] = id;

        //cek pegawai ada atau enggak di modal tambah penerimaan
        if($("#check"+id).length){
            //show dari pilihan
            $("#check"+id).show();
        }
        //kalau tidak ada, bikin pilihan baru
        else{
            let addrow = '<div class="row m-3" id="check'+id+'">\
                <div class="col text-center">\
                    <input type="checkbox" class="custom-control-input" id="penerima'+id+'" value="'+nama+'">\
                    <label class="custom-control-label" for="penerima'+id+'">'+nama+'</label>\
                </div>\
            </div>';
            $("#pegawai").append(addrow);
        }
    });
    // delbtn(); //inisiasi delbtn
    var column = table.column(2);
    column.visible(false);
        //membagi target kupas ke tiap tenaga rata.

        var jumlah = $(".terimakg").length;

        var target = $("#targetkupas").val();

        var terima = Number(target/jumlah);

        $(".terimakg").each(function(){
            $(this).html(terima);
        });

        hitungProsesHariIni();

        //event button simpan di klik

        $("#btn-simpan").click(function(){

            let jsontenaga = [];
            var data;

            $("#datatable tbody tr").each(function(index){
                let id_pegawai = $(this).attr('id').substr(3);
                let jumlah = $("#terima"+id_pegawai).html();
                data = {
                    id_pegawai: id_pegawai,
                    jumlah: jumlah
                }
                jsontenaga.push(data);
            });

            jsontenaga = JSON.stringify(jsontenaga);
            let deletedjson = JSON.stringify(deleted);

            let total = $("#proseshariini").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/gudang-bawang/simpanberi') }}",
                method: 'POST',
                data: {
                    tenagakupas : jsontenaga,
                    jumlah : jumlah,
                    totalproses : total,
                    deleted : deletedjson,
                },
                success: function(result){
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
                    location.reload();
                }
            });

        });

        //ubah total terima di atas tabel
        $("#btnubahJumlah").click(function(e){
            $("#ubahModal").modal('toggle');
            hitungTotalProsesHariIni();
        });

        //ubah terima per orang
        $(".ubahTerima").each(function(){
            $(this).click(function(){
                let id = $(this).attr('id').substr(13);
                $("#ubahTerimaModal"+id).modal('toggle');
                let berat = $("#berat"+id).val();
                $("#terima"+id).html(berat);
                hitungProsesHariIni();
                $("#terima"+id).removeClass("terimakg");
                $("#terima"+id).addClass("terimacustom");
            });
        });

        //function ketika button "hapus" diatas halaman di klik. mengubah visible tombol hapus di tiap row dan berganti tulisan(html)
        $("#hapus").click(function(){
            var column = table.column(2);
            column.visible(! column.visible());
            
            if($(this).html() == "Hapus"){
                $(this).html("Tutup Proses");
            }
            else{
                $(this).html("Hapus");
            }
        });

        //tombol simpan di modal tambah tenaga kupas di klik
        $("#tambahPenerima").click(function(){
            $("#addModal").modal('toggle');
            $("#pegawai input:checked").each(function(){
                //mengambil id dan nama
                var id = $(this).attr('id').substr(8); 
                var name = $(this).val();
                //menambahkan row baru
                table.row.add([
                    name,
                    0,
                    '<button type="button" class="delbtn btn btn-round btn-danger" id="del'+id+'"><i class="feather icon-trash-2"></i></button>'
                ]).node().id = 'row'+id;
                table.draw(false);
                //menambahkan attribut
                var column = $("#datatable tbody tr#row"+id).find("td:eq(0)");
                column.attr({
                    "data-toggle":'modal',
                    "data-target":'#ubahTerimaModal'+id
                });
                column = $("#datatable tbody tr#row"+id).find("td:eq(1)");
                column.attr({
                    class:'terimakg',
                    id:'terima'+id
                });

                //hide dari pilihan
                $("#check"+id).hide();

                //uncheck
                $(this).prop('checked',false);

                
                for(let i=0;i<deleted.length;i++){
                    if(deleted[i] != id){
                        i++;
                    }
                    else{
                        deleted.splice(i, 1);
                        break;
                    }
                }

            });
            hitungTotalProsesHariIni(); //dibagi rata ulang terima(kg)
        });

    });
    

</script>
@endsection 