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
<style type="text/css">
    .redclass{
        border-color: red !important;
    }
    canvas.drawing, canvas.drawingBuffer {
        position: absolute;
        left: 0;
        top: 0;
    }
    .form-control[readonly] {
        background-color: #ffffff !important;
    }
</style>
@endsection 
@section('rightbar-content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div id="scanner-container"></div>  
    <div class="row align-items-center">
        <div class="col-8">
            <h2 class="page-title text-left pl-5">Penerimaan Bawang kulit</h2>
            
        </div>
        <div class="col-4">
            <div class="widgetbar">
                <h5 class="page-subtitle text-left pl-5">@php echo date("d F Y"); @endphp</h5>
            </div>                        
        </div>
    </div>
    <div class="row align-items-top">
        <div class="col-8 px-5">
                <form action="/gudang-bawang/penerimaan" method="post">
                    @csrf
                    <div class="form-group my-4">
                        <input type="text" class="form-control" name="id_pb" id="hdnBarcode" readonly placeholder="Scan Barcode">
                    </div>
                    <div class="form-group mb-4">
                      <label for="validationCustom01">Berat Bawang Kupas (Kg)</label>
                      <input type="text" class="form-control" name="barcode" id="barcode" placeholder="sbk001">
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                    </div>
                    <div class="form-group mb-4">
                      <label for="validationCustom01">Keterangan/Merek Bawang</label>
                      <input type="text" class="form-control" name="merek" id="merekbawang" required placeholder="Merek Bawang">
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="validationCustom01">Tanggal Penerimaan Bawang</label>
                        <input type="date" class="form-control" name="tgl" id="tgl" required placeholder="Tanggal Penerimaan Bawang">
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="validationCustom01">Jumlah Bawang Diterima</label>
                        <input type="text" class="form-control" name="jumlah" id="jumlah" required placeholder="Jumlah Bawang Diterima">
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                    </div>
                    
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
        </div>
        <div class="col-4 py-4">
            <button type="button" id="btnScan" class="btn btn-primary">Scan Barcode</button>
        </div>
    </div>      
</div>
<!-- End Breadcrumbbar -->
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
            $("#btnScan").text("Start");
            $("#scanner-container").hide();
        } else {
            startScanner();
            $("video").attr("width", "100%");
            $("#btnScan").text("Stop");
            $("#scanner-container").show();
        }
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