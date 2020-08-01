@section('title') 
Input Penerimaan Kacang OB
@endsection 
@extends('gudangkacang.layouts.main')
@section('style')
<style type="text/css">
canvas.drawing, canvas.drawingBuffer {
        position: absolute;
        left: 0;
        top: 0;
    }
</style>
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
    <div id="scanner-container"></div> 
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Input Penerimaan Kacang OB</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Stock</a></li>
                    <li class="breadcrumb-item"><a href="">Gudang Kacang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Input Penerimaan Kacang OB</li>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
            
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
                <div class="card-header">
                    <h5 class="card-title">Input Penerimaan Kacang OB</h5>
                </div>
                <div class="card-body">
                    <form action="/insert_stock_gudang_kacang_penerimaan_ob" method="post">
                    {{ csrf_field() }}
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="tanggal">Tanggal Sekarang</label>
                                <input type="text" class="form-control" name="tanggal" id="tanggal_sekarang" placeholder="<?php echo date("d/m/Y"); ?>" disabled="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="tanggal">Tanggal Penerimaan Kacang</label>
                            </div>
                            <div class="form-group col-md-5">
                                <input type="text" class="form-control" name="barcode" id="hdnBarcode" placeholder="Input Nomor Barcode" required>
                            </div>
                            <div class="form-group col-md-7">
                                <button type="button" class="btn btn-primary" id="btnScan">Scan Barcode</button>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="tanggal_penerimaan_kacang" id="tanggal_penerimaan_kacang" placeholder="Input Tanggal Penerimaan Kacang" readonly required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="tanggal">Jumlah Kilogram Diterima</label>
                                <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Kilogram Diterima"  readonly required>
                            </div>
                        </div>
                        <input type="text" name="id_gudang_asal" id="id_gudang_asal" hidden>
                        <div class="form-row">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
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
<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
<script>
var _scannerIsRunning = false;

$(document).ready(function () {
    
    $("#btnScan").click(function () {
        //alert("try to scan");
        if (_scannerIsRunning) {
            _scannerIsRunning = false;
            Quagga.stop();
            $("#btnScan").text("Scan Barcode");
            $("#scanner-container").hide();
        } else {
            startScanner();
            $("video").attr("width", "100%");
            $("#btnScan").text("Stop");
            $("#scanner-container").show();
        }
    });

    $(document).on("input","#hdnBarcode",function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ url('/gudang-kacang/ambilPenerimaan') }}",
            method: 'POST',
            data: {
                id_penerimaan : $("#hdnBarcode").val(),
            },
            success: function(result){
                let data_p = result.penerimaan; 
                $("#tanggal_penerimaan_kacang").val(data_p.tgl);
                $("#jumlah").val(data_p.jumlah);
                $("#id_gudang_asal").val(data_p.id_gudang_asal);
            }
        });
    });
});

function closeModal() {
    $('.modal').hide();
    // more cleanup here
}

function startScanner() {
    Quagga.init({
        inputStream: {
            name: "Live",
            type: "LiveStream",
            target: document.querySelector('#scanner-container'),
            constraints: {
                facingMode: "environment",
                //"width":{"min":1200,},
                //"height":{"min":300},
                "aspectRatio": { "min": 1, "max": 100 }
            },
        },
        "locator": { "patchSize": "medium", "halfSample": false },
        "numOfWorkers": 8,
        "frequency": 10,
        "decoder": { "readers": [{ "format": "code_39_reader", "config": {} }] },
        "locate": true
    }, function (err) {
        if (err) {
            console.log(err);
            return
        }

        console.log("Initialization finished. Ready to start");
        Quagga.start();

        // Set flag to is running
        _scannerIsRunning = true;
    });

    Quagga.onProcessed(function (result) {
        var drawingCtx = Quagga.canvas.ctx.overlay,
        drawingCanvas = Quagga.canvas.dom.overlay;

        if (result) {
            if (result.boxes) {
                drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
                result.boxes.filter(function (box) {
                    return box !== result.box;
                }).forEach(function (box) {
                    Quagga.ImageDebug.drawPath(box, { x: 0, y: 1 }, drawingCtx, { color: "green", lineWidth: 2 });
                });
            }

            if (result.box) {
                Quagga.ImageDebug.drawPath(result.box, { x: 0, y: 1 }, drawingCtx, { color: "#00F", lineWidth: 2 });
            }

            if (result.codeResult && result.codeResult.code) {
                Quagga.ImageDebug.drawPath(result.line, { x: 'x', y: 'y' }, drawingCtx, { color: 'red', lineWidth: 3 });
            }
        }
    });


    Quagga.onDetected(function (result) {
        // console.log("Barcode detected and processed : [" + result.codeResult.code + "]", result);
        $("#hdnBarcode").val(result.codeResult.code);
        $("#btnScan").click();
    });
}
</script>
@endsection 